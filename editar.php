<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar');

use \App\Entity\Geral;
use \App\Session\Login;

//Obriga o usuario a estar logado
Login::requireLogin();

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

$obGeral = Geral::getGera($_GET['id']);

if(!$obGeral instanceof Geral){
  header('location: index.php?status=error');
  exit;
}

if(isset($_POST['nome'],$_POST['email'],$_POST['senha'])){

  $obGeral->nome    = $_POST['nome'];
  $obGeral->usuario = $_POST['usuario'];
  $obGeral->senha     = $_POST['senha'];
  $obGeral->servidor     = $_POST['servidor'];
  $obGeral->tipo     = $_POST['tipo'];
  $obGeral->atualizar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';
