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
        // Veículos que não têm viagens associadas
        //$veiculos = Veiculos::doesntHave('viagens')->paginate(10);
        $veiculos = Veiculos::paginate(10);
        // Motoristas que não têm viagens associadas
        //$motoristas = Motoristas::doesntHave('viagens')->paginate(10);
        $motoristas = Motoristas::paginate(10);
        // Viagens com os motoristas associados
        $viagens = Viagens::with('motorista')->paginate(10);

        return view('homepage', compact('veiculos', 'motoristas', 'viagens'));
    }

    // Métodos para Veículos
    public function cadastrarVeiculos()
    {
        return view('cadastros.veiculos');
    }

    public function storeVeiculos(VeiculosRequest $request)
    {
        Veiculos::create(request()->all());
        return  redirect()->route('home');
    }

    public function editVeiculos(string $id)
    {
        // Verifica se o veículo existe
        if (!$veiculo = Veiculos::find($id)) {
            return redirect()->route('user.index')->with('message', 'Veículo não encontrado');
        }
        // Retorna a view de edição com os dados do veículo
        return view('edit.veiculos', compact('veiculo'));
    }


    public function updateVeiculos(Request $request, string $id)
    {
        if(!$veiculo = Veiculos::find($id)){
            return redirect()->route('home')->with('message', 'Veículo não encontrado');
        }

        $veiculo->update($request->all());
        return  redirect()->route('home')->with('success', 'Veículo Editado com sucesso');
    }

    public function showVeiculos(string $id)
    {
        // Verifica se o veículo existe
        if (!$veiculo = Veiculos::find($id)) {
            return redirect()->route('user.index')->with('message', 'Veículo não encontrado');
        }
        // Retorna a view de edição com os dados do veículo
        return view('show.veiculos', compact('veiculo'));
    }

    public function deleteVeiculos(string $id)
    {
        // Verifica se o veículo existe
        if (!$veiculo = Veiculos::find($id)) {
            return redirect()->route('user.index')->with('message', 'Veículo não encontrado');
        }

        $veiculo->delete();
        // Retorna a view de edição com os dados do veículo
        return redirect()->route('home')->with('Success', 'Veículo Deletado com sucesso');
    }

    // Métodos para Motorista
    public function cadastrarMotoristas()
    {
        return view('cadastros.motorista');
    }

    public function storeMotoristas(MotoristaRequest $request)
    {
        Motoristas::create(request()->all());
        return  redirect()->route('home');
    }

    public function editMotoristas(string $id)
    {
        // Verifica se o veículo existe
        if (!$motorista = Motoristas::find($id)) {
            return redirect()->route('user.index')->with('message', 'Motorista não encontrado');
        }

        // Retorna a view de edição com os dados do veículo
        return view('edit.motoristas', compact('motorista'));
    }


    public function updateMotoristas(Request $request, string $id)
    {
        if(!$motorista = Motoristas::find($id)){
            return redirect()->route('home')->with('message', 'Motorista não encontrado');
        }

        $motorista->update($request->all());
        return  redirect()->route('home')->with('success', 'Motorista Editado com sucesso');
    }


    public function showMotoristas(string $id)
    {
        // Verifica se o veículo existe
        if (!$motorista = Motoristas::find($id)) {
            return redirect()->route('user.index')->with('message', 'Motorista não encontrado');
        }
        // Retorna a view de edição com os dados do veículo
        return view('show.motorista', compact('motorista'));
    }

    public function deleteMotoristas(string $id)
    {
        // Verifica se o veículo existe
        if (!$motorista = Motoristas::find($id)) {
            return redirect()->route('user.index')->with('message', 'Motorista não encontrado');
        }

        $motorista->delete();
        // Retorna a view de edição com os dados do veículo
        return redirect()->route('home')->with('Success', 'Motorista Deletado com sucesso');
    }


    // Métodos para Viagens
    public function cadastrarViagens(){
        return view('cadastros.viagens');
    }

    public function storeViagens(ViagensRequest $request){
        Viagens::create(request()->all());
        return  redirect()->route('home');
    }


    public function editViagens(string $id)
    {
        // Verifica se a viagem existe
        if (!$viagem = Viagens::find($id)) {
            return redirect()->route('user.index')->with('message', 'Viagem não encontrada');
        }

        $motorista = $viagem->motorista;
        $veiculo = $viagem->veiculo;

        // Retorna a view de edição com os dados da viagem, motorista e veículo
        return view('edit.viagens', compact('viagem', 'motorista', 'veiculo'));
    }



    public function updateViagens(Request $request, string $id)
    {

        if (!$viagens = Viagens::find($id)) {
            return redirect()->route('home')->with('message', 'Viagem não encontrada');
        }

        $motorista = Motoristas::where('cnh', $request->cnh)->first();
        $veiculo = Veiculos::where('renavam', $request->renavam)->first();

        // Debug para verificar se o motorista e o veículo foram encontrados
        if (!$motorista) {
            dd('Motorista não encontrado');
        }
        if (!$veiculo) {
            dd('Veículo não encontrado');
        }

        $veiculo->update($request->all());
        $viagens->update($request->all());
        $motorista->update($request->all());
        return  redirect()->route('home')->with('success', 'Motorista Editado com sucesso');
    }


    public function showViagens(string $id)
    {
        // Verifica se o veículo existe
        if (!$viagem = Viagens::find($id)) {
            return redirect()->route('user.index')->with('message', 'Motorista não encontrado');
        }

        $motorista = $viagem->motorista;
        $veiculo = $viagem->veiculo;

        // Retorna a view de edição com os dados do veículo
        return view('show.viagens', compact('viagem', 'motorista', 'veiculo'));
    }

    public function deleteViagens(string $id)
    {
        // Verifica se o veículo existe
        if (!$viagens = Viagens::find($id)) {
            return redirect()->route('user.index')->with('message', 'Viagens não encontrado');
        }

        $viagens->delete();
        // Retorna a view de edição com os dados do veículo
        return redirect()->route('home')->with('Success', 'Viagens Deletado com sucesso');
    }

}
