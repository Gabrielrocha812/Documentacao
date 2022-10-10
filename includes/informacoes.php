<?php
header("Content-type: text/html; charset=utf-8", true);

//dados do usuario logado
use \App\Session\Login;

//detalhes do usuario
$usuarioLogado = Login::getUsuarioLogado();

            $usuario = $usuarioLogado ? $usuarioLogado['nome'].'<a href="logout.php" class="text-light font-weight-bold ml-2">Sair</a>' :
            'Visitante <a href="login.php" class="text-light font-weight-bold ml-2">Entrar</a>'; 
?>
<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Brandt</title>
  </head>
  
  <body class="bg-dark text-light">
  <div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-success rounded">
        
          <a class="navbar-brand text-light" href="index.php">Home</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="index.php">Documentação Geral</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="listagem_usuarios_brandt.php">Usuários Brandt</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<br>
    <div class="container">

      <div class="jumbotron bg-success">

        <h1>Sistema Brandt</h1>
        <p>Documentação e <a href="includes/listagem_usuarios_brandt.php" class="text-light">informações dos usuários</a> da <strong>Brandt</strong></p>

        <hr class="border-light">

        <div class="d-flex justify-content-start">
          <?=$usuario?>
        </div>  
        <hr class="border-light">
        <h2>Desenvolvido para facilitação de cadastro dos usuários da Brandt e também para melhor organização da documentação.</h2>
      </div>


