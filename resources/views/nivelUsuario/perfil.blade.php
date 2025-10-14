<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link rel="stylesheet" href="{{('css/header.css')}}">

</head>
<body>
        <header>
    @include('nivelUsuario.header')        
    <!-- Seu cabeçalho aqui -->
        
    </header>
    

    <input type="text" name="name" value="{{ $user->name }}" />
    <input type="text" name="email" value="{{ $user->email }}" />
    <input type="text" name="password" value="{{ $user->password }}" />


    
</body>
</html>