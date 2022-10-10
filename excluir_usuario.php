<?php

require __DIR__.'/vendor/autoload.php';

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

if(isset($_POST['excluir'])){

  $obGeral->excluir();

  header('location: index_usuarios.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar_exclusao_usuario.php';
include __DIR__.'/includes/footer.php';
