<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Pessoa;
use App\Exceptions\Handler;

class PessoasController extends Controller
{
    public function index() 
    {        
        $pessoas = Pessoa::paginate(10);

        return view('pessoas.index', [
            'pessoas' => $pessoas
        ]);

    }

    public function getPessoas() 
    {
        $list = Pessoa::all();

        foreach($list as $pessoa) {

            $pessoas[] = array(
                'id' => $pessoa->id,
                'nome' => $pessoa->nome
            );
        }

        return $pessoas;
    }

    public function get($id)
    {
        $pessoa = Pessoa::find($id);

        if(!$pessoa) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($pessoa);        
    }

    public function add(Request $request)
    {
        $pessoa = new Pessoa;

        $data = $request->only([
            'nome',
            'email'
        ]);

        $validator = Validator::make($data, [
            'nome' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:200', 'unique:pessoas']
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'Failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $pessoa->nome = $request->nome;
        $pessoa->email = $request->email;
        $pessoa->save(); 

        return response()->json($pessoa, 201);

    }

    public function update(Request $request, $id)
    {
        $pessoa = Pessoa::find($id);
        $pessoa->nome = $request->nome;
        $pessoa->email = $request->email;
        $pessoa->save();

        return $request;        
    }

    public function delete($id)
    {
        $pessoa = Pessoa::find($id);
        $pessoa->delete();

        return $id;
    }
}