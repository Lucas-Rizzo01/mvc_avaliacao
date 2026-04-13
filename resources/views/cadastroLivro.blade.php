<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de livros</title>
</head>
<body>
    <h1>Cadastro de Livros</h1>
    <a href="{{route('livro.listar')}}">Listar Livros</a>
    <a href="{{route('editora.cadastro')}}">Cadastrar Editora</a>

    @if(session('success'))
        <p style="color:green">{{session('success')}}</p>
    @endif

    <form action="{{route('livro.salvar')}}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <br>
        <input type="text" name="nome" id="nome" placeholder="Nome..." required value="{{old('nome')}}">

        <br><br>
        <label for="nome">Autor: </label>
        <br>
        <input type="text" name="autor" id="autor" placeholder="Autor..." required value="{{old('autor')}}">

        
        <br><br>
        <label for="editora_id">Editora: </label>
        <br>
        <select name="editora_id" id="editora_id">
            @foreach ($editoras as $editora)
                <option value="{{$editora->id}}">{{$editora->nome}}</option>
            @endforeach
        </select>

        <br><br>
        <label for="nome">Descrição: </label>
        <br>
        <input type="textarea" name="descricao" id="descricao" placeholder="Descrição..." required value="{{old('descricao')}}">

        <br><br>
        <label for="custo">Custo:</label>
         <br>
        <input type="text" name="custo" id="custo" placeholder="Custo..." require value="{{old('custo')}}">
        
        <br><br>
        <label for="preco_venda">Preço de venda:</label>
         <br>
        <input type="text" name="preco_venda" id="preco_venda" placeholder="Preço de venda..." require value="{{old('preco_venda')}}">
        
        <br><br>
        <label for="imposto">Imposto:</label>
        <br>
        <input type="text" name="imposto" id="imposto" placeholder="Imposto..." require value="{{old('imposto')}}">
        <br><br>

         <br><br>
        <input type="submit" value="Cadastrar">
    </form>

     @if($errors->any())
    <div style="color: red">
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{$erro}}</li>
            @endforeach
        </ul>
    </div>
    @endif
</body>
</html>