<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{('css/header.css')}}">

    <link rel="stylesheet" href="{{('css/style.css')}}">
</head>
<body>
@php
        $imagem = 'imginsert/';
@endphp 

    <header>
    @include('nivelUsuario.header')        
    <!-- Seu cabeçalho aqui -->
        
    </header>
    
 <br>
 <br>
    <center>
       
        <h1>Mangas em destaque</h1>
    </center>
    <div class="mestre">
    @foreach ($mangas as $manga)
    <div class="card-titulo">
       
        <div class="card-body">
            <img src="{{ $imagem . $manga->caminhoImagemManga }}" alt="Imagem de {{ $manga->nomeManga }}" width="90%" height="150px">
            <p class="card-sinopse">{{ $manga->sinopseManga }}</p>
            
            @foreach ($manga->categorias as $categoria)
                <p class="card-categorias ">Categoria:  {{ $categoria->nomeCategoria }}</p>
            @endforeach
            <p class="card-text">Autor: {{ $manga->autorManga }}</p>
            <p class="card-text">R${{ $manga->valorManga }}</p>
            <p class="card-text">{{ $manga->dataDeLancamentoManga }}</p>
        </div>


  
<div class="card-img">
            <label class="card-title">{{ $manga->nomeManga }}</label>
        </div>
  </div>


    @endforeach

</div>


    <footer>
        <div class="footer-content">
            <p>&copy; 2025 Sua Empresa. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
