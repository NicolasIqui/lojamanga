<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
</head>
<body>
<header>
    @include('nivelUsuario.header')        
</header>

<div class="perfil-container">
    <h1>Editar Perfil</h1>

    <form action="{{ route('usuario.update') }}" method="POST" enctype="multipart/form-data" class="perfil-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="name" value="{{ $user->name }}" required />
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required />
        </div>

        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password" placeholder="Nova senha" />
            <small>Deixe em branco se não quiser alterar</small>
        </div>

        <div class="form-group">
            <label>Imagem de perfil:</label>
            <input type="file" name="imagem" accept="image/*" />
            @if($user->imagem)
                <div class="imagem-atual">
                    <img src="{{ asset('imgusuarios/' . $user->imagem) }}" alt="Imagem atual" width="100" height="100">
                </div>
            @endif
        </div>

        <button type="submit" class="btn-atualizar">Atualizar Perfil</button>
    </form>
</div>

</body>
</html>
