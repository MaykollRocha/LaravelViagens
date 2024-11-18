<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViagensController;


/*
As Rotas estao organizadas da seguinte forma:
    1. referente a edicao
    2. referente a atualizacao
    3. referente a cadastro
    4. referente ao armazenamento
    5. referente a exibicao
    6. referente a exclusao

Os name estao organizado em <função que ele executa>.<nome da tabela>
e o nome das classe no controler <função que ele executa><nome da tabela com a primeira letra maiuscula>
Tambem e de se perceber que as rotas tem o padrao dela como se ela vai fazer qual coisa na tabela ela ja
comeca com o nome da tabela depois varia em ter ou nao o id as que controes e envia para o banco nao tem id
mas a de show, delete, edit e update tem id.
Ultima rota rota da home page.
*/



// Rotas para Viagens
Route::get('/Viagens/{id}/edit', [ViagensController::class, 'editViagens'])->name('edit.viagens');
Route::put('/Viagens/{id}', [ViagensController::class, 'updateViagens'])->name('update.viagens');
Route::get('/Viagens', [ViagensController::class, 'cadastrarViagens'])->name('cadastros.viagens');
Route::post('/Viagens', [ViagensController::class, 'storeViagens'])->name('store.viagens');
Route::get('/Viagens/{id}', [ViagensController::class, 'showViagens'])->name('show.viagens');
Route::delete('/Viagens/{id}/delete', [ViagensController::class, 'deleteViagens'])->name('delete.viagens');


// Rotas para Motoristas
Route::get('/Motorista/{id}/edit', [ViagensController::class, 'editMotoristas'])->name('edit.motorista');
Route::put('/Motorista/{id}', [ViagensController::class, 'updateMotoristas'])->name('update.motorista');
Route::get('/Motorista', [ViagensController::class, 'cadastrarMotoristas'])->name('cadastros.motorista');
Route::post('/Motorista', [ViagensController::class, 'storeMotoristas'])->name('store.motorista');
Route::get('/Motorista/{id}', [ViagensController::class, 'showMotoristas'])->name('show.motorista');
Route::delete('/Motorista/{id}/delete', [ViagensController::class, 'deleteMotoristas'])->name('delete.motorista');


// Rotas para Veiculos
Route::get('/Veiculos/{id}/edit', [ViagensController::class, 'editVeiculos'])->name('edit.veiculos');
Route::put('/Veiculos/{id}', [ViagensController::class, 'updateVeiculos'])->name('update.veiculos');
Route::get('/Veiculos', [ViagensController::class, 'cadastrarVeiculos'])->name('cadastros.veiculos');
Route::post('/Veiculos', [ViagensController::class, 'storeVeiculos'])->name('store.veiculos');
Route::get('/Veiculos/{id}', [ViagensController::class, 'showVeiculos'])->name('show.veiculos');
Route::delete('/Veiculos/{id}/delete', [ViagensController::class, 'deleteVeiculos'])->name('delete.veiculos');


//Caminho principal
Route::get('/', [ViagensController::class, 'index'])->name('home');

