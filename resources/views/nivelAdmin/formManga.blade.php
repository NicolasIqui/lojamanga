<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{('css/formulario.css')}}">
    <title>Formulario</title>
</head>
<body>
<link rel="stylesheet" href="{{('css/header.css')}}">

<header>
    @include('nivelUsuario.header')        
    <!-- Seu cabeçalho aqui -->
        
    </header>

<center> 
    <div class="container2">
       <div class="cabecalho">
    <h2>Inserir Manga</h2>
</div>
        <form action="{{ route('manga.inserir') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nomeManga">Nome da Manga</label>
                <input type="text" name="nomeManga" id="nomeManga" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="caminhoImagemManga">Imagem da Manga</label>
                <input type="file" name="caminhoImagemManga" id="caminhoImagemManga" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="sinopseManga">Sinopse</label>
                <textarea name="sinopseManga" id="sinopseManga" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="autorManga">Autor da Manga</label>
                <input type="text" name="autorManga" id="autorManga" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="valorManga">Valor da Manga</label>
                <input type="number" name="valorManga" id="valorManga" class="form-control" step="0.01" required>
            </div> 

            <!-- Campo de data -->
            <div class="form-group">
                <label for="dataPublicacao">Data de Publicação</label>
                <input type="date" name="dataPublicacao" id="dataPublicacao" class="form-control" required>
            </div>
<div class="form-group">
    <label for="categoriaManga">Categoria</label>
    <select name="categoriaManga" id="categoriaManga" class="form-control" required>
        <option value="">Selecione</option>
        @foreach($categorias as $item)
            <option value="{{ $item->id }}">{{ $item->nomeCategoria }}</option>
        @endforeach
    </select>
</div>
            <button class="botao"type="submit" class="btn btn-primary">Cadastrar Manga</button>
            
        </form>
    </div>
</center>
</body>
</html>
