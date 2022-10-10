<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar');

use \App\Entity\Geral;
use \App\Session\Login;

//Obriga o usuario a estar logado
Login::requireLogin();
$obGeral = new Geral;

if(isset($_POST['nome'],$_POST['usuario'], $_POST['senha'], $_POST['servidor'])){


    $obGeral->nome =$_POST['nome'];
    $obGeral->usuario =$_POST['usuario'];
    $obGeral->senha =$_POST['senha'];
    $obGeral->servidor =$_POST['servidor'];
    $obGeral->tipo     = $_POST['tipo'];
    $obGeral->cadastrar();

    header('location: index.php?status=success');
    exit;
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';
