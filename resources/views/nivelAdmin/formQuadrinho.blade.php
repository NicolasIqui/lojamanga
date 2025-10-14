<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
    <title>Formulario Quadrinho</title>
</head>
<body>
<link rel="stylesheet" href="{{ asset('css/header.css') }}">

<header>
    @include('nivelUsuario.header')        
</header>

<center> 
    <div class="container2">
       <div class="cabecalho">
           <h2>Inserir Quadrinho</h2>
       </div>
       <form action="{{ route('quadrinho.inserir') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nomeQuadrinho">Nome do Quadrinho</label>
                <input type="text" name="nomeQuadrinho" id="nomeQuadrinho" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="caminhoImagemQuadrinho">Imagem do Quadrinho</label>
                <input type="file" name="caminhoImagemQuadrinho" id="caminhoImagemQuadrinho" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="sinopseQuadrinho">Sinopse</label>
                <textarea name="sinopseQuadrinho" id="sinopseQuadrinho" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="autorQuadrinho">Autor</label>
                <input type="text" name="autorQuadrinho" id="autorQuadrinho" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="valorQuadrinho">Valor</label>
                <input type="number" name="valorQuadrinho" id="valorQuadrinho" class="form-control" step="0.01" required>
            </div> 

            <div class="form-group">
                <label for="dataPublicacao">Data de Lançamento</label>
                <input type="date" name="dataPublicacao" id="dataPublicacao" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="categoriaQuadrinho">Categoria</label>
                <select name="categoriaQuadrinho" id="categoriaQuadrinho" class="form-control" required>
                    <option value="">Selecione</option>
                    @foreach($categorias as $item)
                        <option value="{{ $item->id }}">{{ $item->nomeCategoria }}</option>
                    @endforeach
                </select>
            </div>

            <button class="botao" type="submit">Cadastrar Quadrinho</button>
       </form>
    </div>
</center>
</body>
</html>
