<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar');

use \App\Entity\Usuarios;
use \App\Session\Login;

//Obriga o usuario a estar logado
Login::requireLogin();

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index_usuarios.php?status=error');
  exit;
}

$obGeral = Usuarios::getGera($_GET['id']);

if(!$obGeral instanceof Usuarios){
  header('location: index_usuarios.php?status=error');
  exit;
}

if(isset($_POST['usuario'],$_POST['anydesk'])){

  $obGeral->usuario = $_POST['usuario'];
  $obGeral->anydesk = $_POST['anydesk'];
  $obGeral->atualizar();

  header('location: index_usuarios.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario_usuarios.php';
include __DIR__.'/includes/footer.php';
