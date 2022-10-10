<?php

namespace App\Session;



class Login {
//metodo responsavel por iniciar a sessão
private static function init(){
  //verifica status da sessão
if(session_status() !== PHP_SESSION_ACTIVE){
  //inicia a sessao
  session_start();
}
}

//metodo responsavel por retornar dados do usuario logado
public static function getUsuarioLogado(){
    //inicia a sessao
    self::init();

    //retorna dados do usuario
    return self::isLogged() ? $_SESSION['usuario'] : null;
}

//metodo responsavel por logar o usuario
  public static function Login($obUsuario){
    //inicia a sessao
    self::init();

    $_SESSION['usuario'] = [
      'id' => $obUsuario->id,
      'nome'=>$obUsuario->nome,
      'email'=>$obUsuario->email
    ];

    //redireciona usuario para index
    header('location: index.php');
    exit;

  }
//metodo responsavel por deslogar o usuario
  public static function logout(){
  //inicia a sessao
  self::init();
  
  //remove a sessão do usuario
  unset($_SESSION['usuario']);
  
  //redireciona usuario para login
  header('location: login.php');
    exit;
  }

  //metodo responsavel para verificar se o usuario está logado
  public static function isLogged(){
    //inicia a sessao
    self::init();

    return isset($_SESSION['usuario']['id']);
  }
  //metodo responsavel por obrigar o usuário a estar logado para acessar
  public static function requireLogin(){
    if(!self::isLogged()){
      header('location: login.php');
      exit;
    }
  }
  //metodo responsavel por obrigar o usuário a estar deslogado para acessar

  public static function requireLogout(){
    if(self::isLogged()){
      header('location: index.php');
      exit;

      }
    }
}
