<!DOCTYPE html>
<html lang="pt=br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <!--CSS-->
    <link rel="stylesheet" href="{{('css/header.css')}}">

    <link rel="stylesheet" href="{{('css/main.css')}}">
    <link rel="stylesheet" href="{{('css/media.css')}}">


</head>
<body>
    <center>
    <div id="container">
       
        <div class="box-login">
          
         <p class="p2"> Olá! Seja bem vindo de volta.</p>

            <div class="box">
        <form action="{{ route('cadastro.inserir') }}" method="POST" enctype="multipart/form-data">
            @csrf
      <fieldset>
        <legend>faça o seu login agora</legend>
                <input type="text" name="username" id="username" placeholder="nome">
                <input type="email" name="email" id="email" placeholder="email">
                <input type="password" name="password" id="password" placeholder="password">
                <button type="submit" class="btn btn-primary">criar conta</button>
</fieldset>
            </form>          
            
          
            </div>
        </div>
    </div>
</center>
</body>
</html>