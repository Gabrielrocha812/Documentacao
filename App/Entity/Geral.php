<?php
namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Geral{

    public $id;
    public $nome;
    public $usuario;
    public $senha;
    public $servidor;
    public $tipo;


   public function cadastrar(){

    $obDatabase = new Database('geral');
    $this->id = $obDatabase->insert([

        'nome'    => $this->nome,
        'usuario' => $this->usuario,
        'senha'     => $this->senha,
        'servidor'      => $this->servidor,
        'tipo'=> $this->tipo
    ]);

    return true;
   }

   public function atualizar(){
    return (new Database('geral'))->update('id = '.$this->id,[
                                                                'nome'    => $this->nome,
                                                                'usuario' => $this->usuario,
                                                                'senha'     => $this->senha,
                                                                'servidor'      => $this->servidor,
                                                                'tipo'      => $this->tipo
                                                              ]);
  }
  
  public function excluir(){
    return (new Database('geral'))->delete('id = '.$this->id);
  }

   public static function getGeral($where=null, $order=null, $limit=null){
       return (new Database('geral'))->select($where,$order,$limit)
       ->fetchAll(PDO::FETCH_CLASS, self::class);
   }

   public static function getQuant($where=null){
    return (new Database('geral'))->select($where, null, null, 'COUNT(*) as qtd')
    ->fetchObject()
    ->qtd;
}

   public static function getGera($id){
    return (new Database('geral'))->select('id = '.$id)
    ->fetchObject(self::class);
   }
}
