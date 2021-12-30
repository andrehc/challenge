<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Carbon\Carbon;

use function GuzzleHttp\Promise\all;

class UsuariosController extends Controller
{
    public function listarUsuario()
    {
        try 
        {
            $inAtivo = 1;
            $users = Usuario::where('in_ativo', $inAtivo)->get();
            
            return $users;
        } catch (\Throwable $th) {
            return "Erro interno" . $th->getMessage();
        }
    }

    public function cadastrarUsuario(Request $request) 
    {
        try 
        {
            $usuario = new Usuario;
            $usuario->nm_pessoa = $request->nm_pessoa;
            $usuario->ds_cpf = $request->ds_cpf;
            $usuario->ds_telefone = $request->ds_telefone;
            $usuario->ds_email = $request->ds_email;
            $usuario->ds_senha = $request->ds_senha;
            $usuario->dh_criacao = Carbon::now()->format('Y-m-d h:i:s');
            $usuario->save();

            return $usuario;
        } catch (\Throwable $th) {
            return "Erro interno.". $th->getMessage();
        }
    }

    public function buscarUsuarioPorId($codigoPessoa)
    {
        try {
            $inAtivo = 1;
            $usuario = Usuario::where('cd_pessoa', $codigoPessoa)
                ->where('in_ativo', $inAtivo)->get();
            
            return $usuario;
        } catch (\Throwable $th) {
            return "Erro interno.". $th->getMessage();
        }
    }

    public function editarUsuario(Request $request, $codigoPessoa)
    {
        try {
            
            $usuario = $this->buscarUsuarioPorId($codigoPessoa);

            $usuario->nm_pessoa = $request->nm_pessoa;
            $usuario->ds_cpf = $request->ds_cpf;
            $usuario->ds_telefone = $request->ds_telefone;
            $usuario->ds_email = $request->ds_email;
            $usuario->ds_senha = $request->ds_senha;
            $usuario->dh_atualizacao = Carbon::now()->format('Y-m-d h:i:s');
            $usuario->save();
            
            return $usuario;
        } catch (\Throwable $th) {
            return "Erro interno" . $th->getMessage();
        }
    }

    public function apagarUsuario($codigoPessoa)
    {
        try {
            $usuario = $this->buscarUsuarioPorId($codigoPessoa);
            
            $usuario->in_ativo = 0;
            $usuario->save();

            return "Dados apagados.";
        } catch (\Throwable $th) {
            return 500 . "Erro interno" . $th->getMessage();
        }
    }
}
