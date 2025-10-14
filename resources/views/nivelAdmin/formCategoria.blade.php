<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{('css/header.css')}}">
     <link rel="stylesheet" href="{{('css/formCategoria.css')}}">
</head>
<body>
<header>
    @include('nivelUsuario.header')        
    <!-- Seu cabeçalho aqui -->
        
    </header>    

    <div class="container">
        <form action="{{ route('categoria.inserir') }}" method="POST" enctype="multipart/form-data">
           <p>Inserir Categoria</p>
            @csrf
            <div class="form-group">
                <label for="nomeManga">Nome da Categoria</label>
                <input type="text" name="nomeCategoria" id="nomeCategoria" class="form-control" required >
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar Categoria</button>
        </form>
    </div>

</body>
</html>
