<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motoristas;
use App\Http\Requests\MotoristaRequest;

class MotoristasController extends Controller
{
    public function index()
    {
        //Motoristas que não têm viagens associadas
        $motoristas = Motoristas::whereNull('viagem_id')->paginate(10);

        return view('motoristas.index', compact('motoristas'));
    }

    // Métodos para Motorista
    public function create()
    {
        return view('motoristas.create');
    }

    public function store(MotoristaRequest $request)
    {
        Motoristas::create(request()->all());
        return  redirect()->route('motorista.index')->with('success', 'Motorista Criado com sucesso');;
    }

    public function edit(string $id)
    {
        // Verifica se o veículo existe
        if (!$motorista = Motoristas::find($id)) {
            return redirect()->route('motorista.index')->with('error', 'Motorista não encontrado');
        }

        // Retorna a view de edição com os dados do veículo
        return view('motoristas.edit', compact('motorista'));
    }


    public function update(Request $request, string $id)
    {
        if(!$motorista = Motoristas::find($id)){
            return redirect()->route('motorista.index')->with('error', 'Motorista não encontrado');
        }

        $motorista->update($request->all());
        return  redirect()->route('motorista.index')->with('success', 'Motorista Editado com sucesso');
    }


    public function show(string $id)
    {
        // Verifica se o veículo existe
        if (!$motorista = Motoristas::find($id)) {
            return redirect()->route('motorista.index')->with('message', 'Motorista não encontrado');
        }
        // Retorna a view de edição com os dados do veículo
        return view('motoristas.show', compact('motorista'));
    }

    public function delete(string $id)
    {
        // Verifica se o veículo existe
        if (!$motorista = Motoristas::find($id)) {
            return redirect()->route('motorista.index')->with('message', 'Motorista não encontrado');
        }

        $motorista->delete();
        // Retorna a view de edição com os dados do veículo
        return redirect()->route('motorista.index')->with('success', 'Motorista Deletado com sucesso');
    }
}
