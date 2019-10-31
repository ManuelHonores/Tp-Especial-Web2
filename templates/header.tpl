<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {if (($titulo == "Info") || ($titulo == "MoviePlus_Modificar") || ($titulo == "MoviePlus_Modificar_Genero") || ($titulo == EasterEgg))}
        <link rel="stylesheet" href="../css/estilo.css">
        {else}
            <link rel="stylesheet" href="./css/estilo.css">
    {/if}
    <title>{$titulo}</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{BASE_URL}">MoviePlus</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{BASE_URL}peliculas_admin">Home</span></a>
            </li>
            <li class="nav-item active" >
                <a class="nav-link" href="{BASE_URL}login">LogIn</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{BASE_URL}logout">LogOut</a>
            </li>
            <li class="nav-item active" class="generos">
                <a class="nav-link" href="{BASE_URL}generos">Generos</a>
            </li>
            </ul>
        </div>
    </nav>  
    <h1>{$titulo}</h1>
    