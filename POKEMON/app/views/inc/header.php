<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/styles.css">
    <title>List Pokemons</title>
</head>
<body>

    <div class="container_navbar">
        <div class="navbar">
            <a href="./<?php if(isset($server) && $server != 'db') {echo '?server='.$server;} ?>">
                <img src="./public/img/pokemon_logo.png" class="logo" alt="Pokémon">
            </a>
            <div class="dropdown" style="float:right;">
                <img src="./public/img/pokeball.png" class="dropbtn" alt="Menu">
                <div class="dropdown-content">
                    <a href="./<?php if(isset($server) && $server != 'db') {echo '?server='.$server;} ?>">Home</a>
                    <a href="./<?php if(isset($server) && $server == 'db') {echo '?server=api';} ?>"><?php if(isset($server) && $server == 'db') {echo 'API';} else {echo 'DB';} ?></a>
                    <a href="./?controller=RestApi&method=showDocumentation">API v1.0</a>
                </div>
            </div>
        </div>
    </div>