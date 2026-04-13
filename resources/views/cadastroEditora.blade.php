<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Editora</title>
</head>
<body>
    <h1>Cadastrar Editora</h1>
    <a href="{{route('livro.cadastro')}}">Cadastrar Livro</a>

     @if(session('success'))
        <p style="color:green">{{session('success')}}</p>
    @endif

    <form action="{{route('editora.salvar')}}" method="POST">
        @csrf
        <label for="nome">Nome da Editora: </label>
        <br>
        <input type="text" name="nome" id="nome" placeholder="Nome da Editora..." required value="{{old('nome')}}">

        <br><br>
        <label for="cnpj">CNPJ: </label>
        <br>
        <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ..." required value="{{old('cnpj')}}">

        <br><br>
        <label for="pais">País: </label>
        <br>
        <input type="text" name="pais" id="pais" placeholder="País..." required value="{{old('pais')}}">

        <br><br>
        <label for="cidade">Cidade: </label>
        <br>
        <input type="text" name="cidade" id="cidade" placeholder="Cidade..." required value="{{old('cidade')}}">

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