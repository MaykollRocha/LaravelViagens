<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViagensController;
use App\Http\Controllers\MotoristasController;
use App\Http\Controllers\VeiculosController;
use App\Models\Veiculos;
use App\Models\Motoristas;
use App\Models\Viagens;
/*
As Rotas estao organizadas da seguinte forma:
    1. referente a Criar
    2. referente a Armazenar
    3. referente a Mostrar
    4. referente ao pagina de entreda
    5. referente a atulizar
    6. referente a exclusao

Os name estao organizado em <Tabela>.<Funcão>
e o nome das classe no controler <nome da tabela com a primeira letra maiuscula>.<função que ele executa>
Tambem e de se perceber que as rotas tem o padrao dela como se ela vai fazer qual coisa na tabela ela ja
comeca com o nome da tabela depois varia em ter ou nao o id as que controes e envia para o banco nao tem id
mas a de show, delete, edit e update tem id.
Ultima rota rota da home page.
*/

// Rotas para Motoristas
Route::get('/Motorista/create', [MotoristasController::class, 'create'])->name('motorista.create');
Route::post('/Motorista', [MotoristasController::class, 'store'])->name('motorista.store');
Route::get('/Motorista/{id}', [MotoristasController::class, 'show'])->name('motorista.show');
Route::get('/Motorista', [MotoristasController::class, 'index'])->name('motorista.index');
Route::get('/Motorista/{id}/edit', [MotoristasController::class, 'edit'])->name('motorista.edit');
Route::put('/Motorista/{id}', [MotoristasController::class, 'update'])->name('motorista.update');
Route::delete('/Motorista/{id}/delete', [MotoristasController::class, 'delete'])->name('motorista.delete');

// Viagens
Route::get('/Viagens/create', [ViagensController::class, 'create'])->name('viagem.create');
Route::post('/Viagens', [ViagensController::class, 'store'])->name('viagem.store');
Route::get('/Viagens/{id}', [ViagensController::class, 'show'])->name('viagem.show');
Route::get('/Viagens', [ViagensController::class, 'index'])->name('viagem.index');
Route::get('/Viagens/{id}/edit', [ViagensController::class, 'edit'])->name('viagem.edit');
Route::put('/Viagens/{id}', [ViagensController::class, 'update'])->name('viagem.update');
Route::delete('/Viagens/{id}/delete', [ViagensController::class, 'delete'])->name('viagem.delete');

// Rotas para Veiculos
Route::get('/Veiculos/create', [VeiculosController::class, 'create'])->name('veiculo.create');
Route::post('/Veiculos', [VeiculosController::class, 'store'])->name('veiculo.store');
Route::get('/Veiculos/{id}', [VeiculosController::class, 'show'])->name('veiculo.show');
Route::get('/Veiculos', [VeiculosController::class, 'index'])->name('veiculo.index');
Route::get('/Veiculos/{id}/edit', [VeiculosController::class, 'edit'])->name('veiculo.edit');
Route::put('/Veiculos/{id}', [VeiculosController::class, 'update'])->name('veiculo.update');
Route::delete('/Veiculos/{id}/delete', [VeiculosController::class, 'delete'])->name('veiculo.delete');




//Caminho principal
Route::get('/',function () {
    $veiculos = Veiculos::all();
    $motoristas = Motoristas::all();
    $viagens = Viagens::all();
    return view('homepage', compact('veiculos', 'motoristas', 'viagens'));
})->name('home');

