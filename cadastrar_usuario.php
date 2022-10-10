<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar');

use \App\Entity\Usuarios;
use \App\Session\Login;

//Obriga o usuario a estar logado
Login::requireLogin();
$obGeral = new Usuarios;

if(isset($_POST['usuario'], $_POST['anydesk'])){


    $obGeral->usuario =$_POST['usuario'];
    $obGeral->anydesk =$_POST['anydesk'];
    $obGeral->cadastrar();

    header('location: index_usuarios.php?status=success');
    exit;
}


include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario_usuarios.php';
include __DIR__.'/includes/footer.php';
