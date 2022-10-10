<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Usuario{

    public $id;
    public $nome;
    public $email;
    public $senha;

    //metodo responsavel para cadastrar novo usuario no banco
    public function cadastrar(){
    //database
    $obDatabase = new Database('login');
    //insere um novo usuario
    $this->id = $obDatabase -> insert([
        'nome' => $this-> nome,
        'email' => $this-> email,
        'senha' => $this-> senha
    ]);

    //sucesso
    return true;

    }
    //metodo responsavel por retornar ums instancia de usuario com base no seu usuario
    public static function getUsuarioPorEmail($email){
        return(new Database('login'))->select('email = "'.$email.'"')->fetchObject(self::class);
    }
}
