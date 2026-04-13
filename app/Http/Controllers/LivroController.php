<?php

namespace App\Http\Controllers;
use App\Models\Livro;
use App\Models\Editora;
use App\Models\Detalhe;

use Illuminate\Http\Request;

class LivroController extends Controller{

    public function cadastro(){
        $editoras = Editora::get();
        return view('cadastroLivro', compact('editoras'));
    }

    public function listar(){
        $livros = Livro::with(['editora','detalhe'])->get();
        return view('listarLivro', compact('livros'));
    }

    
    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'editora_id' => 'nullable|exists:editoras,id',
            'custo'  => 'required|string|max:255',
            'preco_venda'  => 'required|string|max:255',
            'imposto'  => 'required|string|max:255'
        ]);

        Livro::create([
            'nome' => $request->nome,
            'autor' => $request->autor,
            'descricao' => $request->descricao,
            'editora_id' => $request->editora_id,
        ]);

        return redirect()->back()->with('success','Livro Cadastrado com sucesso!');

    }

    public function atualizar($id){
        $livro = Livro::with('detalhe')->findOrFail($id);
        $editoras = Editora::all();
        return view('atualizar', compact('produto','setores'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nome' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'editora_id' => 'nullable|exists:editoras,id',
            'custo'  => 'required|string|max:255',
            'preco_venda'  => 'required|string|max:255',
            'imposto'  => 'required|string|max:255'
        ]);

        $livro = Livro::findOrFail($id);

        // atualiza livro
        $livro->update([
             'nome' => $request->nome,
            'autor' => $request->autor,
            'descricao' => $request->descricao,
            'editora_id' => $request->editora_id,
        ]);

        // atualiza detalhe
        $livro->detalhe->update([
           'custo'  => $request->custo,
            'preco_venda'  => $request->preco_venda,
            'imposto'  => $request->imposto
        ]);

        return redirect()->back()->with('success','Livro atualizado com sucesso!');
    }

    public function deletar($id){
        $livro = Livro::findOrFail($id);
        $livro->delete();

        return redirect()->route('livro.listar')->with('success','Livro excluído com sucesso!');
    }
}
