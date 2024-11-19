<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Veiculos;

use App\Models\Motoristas;

use App\Models\Viagens;
use App\Http\Requests\ViagensRequest;

class ViagensController extends Controller
{
    public function index()
    {
        $viagens = Viagens::paginate(10);
        return view('viagens.index', compact('viagens'));
    }

    public function create(){
        return view('viagens.create');
    }

    public function store(ViagensRequest $request)
    {
        $controle = 0;
        // Encontra o motorista pelo CNH
        foreach ($request->input('cnh') as $cnh) {
            $motorista = Motoristas::where('cnh', $cnh)->first();
            if ($motorista) {
                $controle = 1;
                break;
            }else{
                $controle = 0;
            }
        }

        // Verifica se o motorista foi encontrado antes de atualizar
        if ($controle) {
            $viagem = Viagens::create($request->all());
            foreach ($request->input('cnh') as $cnh) {
                $motorista = Motoristas::where('cnh', $cnh)->first();
                $motorista->update(['viagem_id' => $viagem->id]);
            }
        } else {
            return back()->with('error', 'Motorista não encontrado');
        }

        return redirect()->route('viagem.index')->with('success', 'Viagem cadastrada com sucesso');
    }



    public function edit(string $id)
    {
        // Verifica se a viagem existe
        if (!$viagem = Viagens::find($id)) {
            return redirect()->route('viagem.index')->with('error', 'Viagem não encontrada');
        }

        $motoristas = Motoristas::where('viagem_id', $viagem->id)->get();
        $veiculo = $viagem->veiculo;
        // Retorna a view de edição com os dados da viagem, motorista e veículo
        return view('viagens.edit', compact('viagem', 'motoristas', 'veiculo'));
    }



    public function update(Request $request, string $id)
    {
        // Verifica se a viagem existe
        if (!$viagem = Viagens::find($id)) {
            return redirect()->route('viagem.index')->with('message', 'Viagem não encontrada');
        }

        // Atualiza os dados do veículo
        $veiculo = Veiculos::where('renavam', $viagem->veiculo->renavam)->first();
        if ($veiculo) {
            $veiculo->update($request->only([
                'modelo',
                'ano',
                'data_aquisicao',
                'kms_rodados_aquisicao',
            ]));
        }

        // Atualiza os dados da viagem
        $viagem->update($request->only([
            'KmInicial',
            'KmFinal'
        ]));
        $motoristas = Motoristas::where('viagem_id', $viagem->id)->get();
        // Itera sobre os motoristas e atualiza cada um
        if ($request->has('motoristas')) {
            foreach ($request->motoristas as $index => $motorista) {
                if($motoristas[$index]['cnh'] == $motorista['cnh']){
                    $motoristas[$index]->update([
                        'nome' => $motorista['nome'],
                        'data_nascimento' => $motorista['data_nascimento'],
                        'viagem_id' => $viagem->id
                    ]);
                }else{
                    $motoristas[$index]->update([
                        'nome' => $motorista['nome'],
                        'viagem_id' => $viagem->id,
                        'data_nascimento' => $motorista['data_nascimento'],
                        'cnh' => $motorista['cnh']
                    ]);
                }

            }
        }
        return redirect()->route('viagem.index')->with('success', 'Viagem e motoristas atualizados com sucesso');
    }



    public function show(string $id)
    {
        if (!$viagem = Viagens::find($id)) {
            return redirect()->route('viagem.index')->with('error', 'Motorista não encontrado');
        }

        $motoristas = Motoristas::where('viagem_id', $viagem->id)->get();
        $veiculo = $viagem->veiculo;

        return view('viagens.show', compact('viagem', 'motoristas', 'veiculo'));
    }

    public function delete(string $id)
    {
        if (!$viagem = Viagens::find($id)) {
            return redirect()->route('viagem.index')->with('error', 'Viagens não encontrado');
        }
        $motoristas = Motoristas::where('viagem_id', $viagem->id)->get();
        foreach ($motoristas as $motorista) {
            $motorista->update(['viagem_id' => null]);
        }
        $viagem->delete();
        return redirect()->route('viagem.index')->with('success', 'Viagens Deletado com sucesso');
    }

}
