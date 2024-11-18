<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Veiculos;
use App\Http\Requests\VeiculosRequest;
use App\Http\Requests\UpdateVeiculoRequest;

use App\Models\Motoristas;
use App\Http\Requests\MotoristaRequest;

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
            return back()->with('message', 'Motorista não encontrado');
        }

        return redirect()->route('viagem.index')->with('success', 'Viagem cadastrada com sucesso');
    }



    public function edit(string $id)
    {
        // Verifica se a viagem existe
        if (!$viagem = Viagens::find($id)) {
            return redirect()->route('viagem.index')->with('message', 'Viagem não encontrada');
        }

        $motoristas = Motoristas::where('viagem_id', $viagem->id)->get();
        $veiculo = $viagem->veiculo;
        // Retorna a view de edição com os dados da viagem, motorista e veículo
        return view('viagens.edit', compact('viagem', 'motoristas', 'veiculo'));
    }



    public function update(Request $request, string $id)
    {

        if (!$viagens = Viagens::find($id)) {
            return redirect()->route('viagem.index')->with('message', 'Viagem não encontrada');
        }

        $motorista = Motoristas::where('cnh', $request->cnh)->first();
        $veiculo = Veiculos::where('renavam', $request->renavam)->first();

        $veiculo->update($request->all());
        $viagens->update($request->all());
        $motorista->update($request->all());
        return  redirect()->route('viagem.index')->with('success', 'Motorista Editado com sucesso');
    }


    public function show(string $id)
    {
        // Verifica se o veículo existe
        if (!$viagem = Viagens::find($id)) {
            return redirect()->route('viagem.index')->with('message', 'Motorista não encontrado');
        }

        $motoristas = Motoristas::where('viagem_id', $id)->get();;
        $veiculo = $viagem->veiculo;

        // Retorna a view de edição com os dados do veículo
        return view('viagens.show', compact('viagem', 'motoristas', 'veiculo'));
    }

    public function delete(string $id)
    {
        //$motoristas = Motoristas::where('viagem_id', $id)->get();
        //dd($motoristas);
        // Verifica se o veículo existe
        if (!$viagens = Viagens::find($id)) {
            return redirect()->route('viagem.index')->with('message', 'Viagens não encontrado');
        }

        $viagens->delete();
        // Retorna a view de edição com os dados do veículo
        return redirect()->route('viagem.index')->with('Success', 'Viagens Deletado com sucesso');
    }

}
