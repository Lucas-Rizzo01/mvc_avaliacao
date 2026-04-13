<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Livros na Biblioteca</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>AUTOR</th>
                <th>DESCRIÇÃO</th>
                <th>EDITORA</th>
                <th>PREÇO</th>
                <th>IMPOSTO</th>
                <th>ATUALIZAR</th>
                <th>DELETAR</th>
            </tr>
        </thead>
        <tbody>
            @forelse($livros as $livro)
                <tr>
                       <td>{{ $livro->id }}</td>
                    <td>{{ $livro->nome }}</td>
                    <td>{{ $livro->autor }}</td>
                    <td>{{ $livro->descricao }}</td>
                    <td>{{ $livro->editora->nome ?? '' }}</td>
                    <td>{{ $livro->detalhe?->custo ?? '' }}</td>
                    <td>{{ $livro->detalhe?->preco_venda ?? '' }}</td>
                    <td>{{ $livro->detalhe?->imposto }}</td>
                    <td>
                        <a href="{{route('livro.atualizar', $livro->id)}}">Atualizar</a>
                    </td>
                    <td>
                        <form action="{{ route('livro.deletar', $livro->id)}}" method="POST" onsubmit="return confirm('Deseja realmente excluir')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>

                </tr>
            @empty
                <tr>
                    <td colspan="12"> Nenhum livro encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>