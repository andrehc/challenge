<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Método antigo de rotas
Route::prefix('usuarios')->group (function () 
{
    Route::get('/listar', 'UsuariosController@listarUsuario');
    Route::get('/{codigoPessoa}', 'UsuariosController@buscarUsuarioPorId');
    Route::post('/novoUsuario', 'UsuariosController@cadastrarUsuario');
    Route::put('/editar/{codigoPessoa}', 'UsuariosController@editarUsuario');
    Route::delete('/apagar/{codigoPessoa}', 'UsuariosController@apagarUsuario');
});

Route::prefix('conta')->group (function () {
    // TODO - Crud da conta bancaria
});
