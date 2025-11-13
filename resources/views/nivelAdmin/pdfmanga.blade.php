<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lista de Usuários</title>
<style>
    body { font-family: Arial, sans-serif; }
    h1 { text-align: center; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; table-layout: fixed; }
    th, td { 
        border: 1px solid #000; 
        padding: 8px; 
        text-align: left; 
        word-wrap: break-word;   /* força a quebra de linha dentro da célula */
        overflow-wrap: break-word; /* compatibilidade extra */
    }
    th { background-color: #f2f2f2; }
    img { max-width: 100px; max-height: 100px; display: block; margin: 0 auto; }
</style>
</head>
<body>
    <h1>testesteqerq</h1>
    <table>
             <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sinopse</th>
                <th>Autor</th>
                <th>Valor</th>
                <th>Data de Lançamento</th>
            </tr>
        </thead>
        <tbody> 
            @foreach($mangas as $manga)
                <tr>
                    <td>{{ $manga->id }}</td>
                    <td>{{ $manga->nomeManga }}</td>
                    <td>{{ $manga->sinopseManga }}</td>
                    <td>{{ $manga->autorManga }}</td>
                    <td>{{ number_format($manga->valorManga, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($manga->dataDeLancamentoManga)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </body>
    </html>
