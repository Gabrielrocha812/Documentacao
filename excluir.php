<?php

require __DIR__.'/vendor/autoload.php';

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

if(isset($_POST['excluir'])){

  $obGeral->excluir();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar_exclusao.php';
include __DIR__.'/includes/footer.php';
