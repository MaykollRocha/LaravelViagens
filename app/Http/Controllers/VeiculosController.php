<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculos;
use App\Http\Requests\VeiculosRequest;

class VeiculosController extends Controller
{
    public function index()
    {
        // Veículos que não têm viagens associadas
        $veiculos = Veiculos::doesntHave('viagens')->paginate(10);
        return view('veiculos.index', compact('veiculos'));
    }
     // Métodos para Veículos
     public function create()
     {
         return view('veiculos.create');
     }

     public function store(VeiculosRequest $request)
     {
         Veiculos::create(request()->all());
         return  redirect()->route('veiculo.index')->with('success', 'Veículo Cadastrado com sucesso');
     }

     public function edit(string $id)
     {
         // Verifica se o veículo existe
         if (!$veiculo = Veiculos::find($id)) {
             return redirect()->route('veiculo.index')->with('message', 'Veículo não encontrado');
         }
         // Retorna a view de edição com os dados do veículo
         return view('veiculos.edit', compact('veiculo'));
     }


     public function update(Request $request, string $id)
     {
         if(!$veiculo = Veiculos::find($id)){
             return redirect()->route('veiculo.index')->with('message', 'Veículo não encontrado');
         }

         $veiculo->update($request->all());
         return  redirect()->route('veiculo.index')->with('success', 'Veículo Editado com sucesso');
     }

     public function show(string $id)
     {
         // Verifica se o veículo existe
         if (!$veiculo = Veiculos::find($id)) {
             return redirect()->route('veiculo.index')->with('message', 'Veículo não encontrado');
         }
         // Retorna a view de edição com os dados do veículo
         return view('veiculos.show', compact('veiculo'));
     }

     public function delete(string $id)
     {
         // Verifica se o veículo existe
         if (!$veiculo = Veiculos::find($id)) {
             return redirect()->route('veiculo.index')->with('message', 'Veículo não encontrado');
         }

         $veiculo->delete();
         // Retorna a view de edição com os dados do veículo
         return redirect()->route('veiculo.index')->with('Success', 'Veículo Deletado com sucesso');
     }
}
