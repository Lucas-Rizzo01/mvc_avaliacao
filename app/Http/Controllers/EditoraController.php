<?php

namespace App\Http\Controllers;
use App\Models\Editora;

use Illuminate\Http\Request;

class EditoraController extends Controller{
 public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255|unique:editoras,nome',
            'cnpj' => 'required|string|max:255|unique:editoras,cnpj',
            'pais' => 'required|string|max:255',
            
        ]);

        Editora::create([
            'nome' => $request->nome,
            'cnpj' => $request->cnpj,
            'pais' => $request->pais,
            'cidade' => $request->cidade
        ]);

        return redirect()->back()->with('success','Editora Cadastrada com sucesso!');

    }

     public function listarEditora(){
        $editoras = Editora::all();
        return view('listarEditora', compact('editoras'));
    }
}