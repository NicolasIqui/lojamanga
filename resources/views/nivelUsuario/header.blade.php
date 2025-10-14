<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
  
    <header class="container">
        
        <a  href="formcategoria">manga</a>
        <a  href="https://www.youtube.com/watch?v=yZrL5QMxeOY&list=PLqdxJj_z7crBiLUDHE7AMxgU9a7Gib21Y">Categoria</a>
        <a  href="quadrinho.blade.php">quadrinho </a>
   
        <div class="links" style="margin-left: auto";>
        <a class="link" href="login">login</a> 
        <form action="{{ route('logout') }}" method="POST" >
        @csrf
    <button type="submit" class="botao-logout">Sair</button>
            </form>
            </div>
    </header>
  
</body>
</html>
