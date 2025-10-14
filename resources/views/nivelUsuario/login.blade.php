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
    


</head>
<body>
   
    <center>
               <p> Seja bem vindo, novamente a nossa loja de mangas e hqs </p>
       </center>
        
        <!--<div class="box-login">
            <h1>
                Olá!<br>
                Seja bem vindo de volta.
            </h1>
              
            <div class="box">-->
              
                <center>
                      
            <form action="{{ route('login.enviar') }}"  method="post">
    @csrf  <fieldset> 
        <legend>faça o seu login agora</legend>
                <input type="text" name="email" id="email" placeholder="email">
                
                <input type="password" name="password" id="password" placeholder="password">
                
                <button type="submit">Entrar</button>
             
                  <a href="/cadastro"> crie sua conta</a>   
</fieldset>
                </center>
            
            </form> 

</body>
</html>