<?php
namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Usuarios{

    public $id;
    public $usuario;
    public $anydesk;

   public function cadastrar(){

    $obDatabase = new Database('usuarios');
    $this->id = $obDatabase->insert([

        'usuario' => $this->usuario,
        'anydesk'     => $this->anydesk
    ]);

    return true;
   }

   public function atualizar(){
    return (new Database('usuarios'))->update('id = '.$this->id,[
                                                                'usuario' => $this->usuario,
                                                                'anydesk'     => $this->anydesk
                                                              ]);
  }
  
  public function excluir(){
    return (new Database('usuarios'))->delete('id = '.$this->id);
  }

   public static function getGeral($where=null, $order=null, $limit=null){
       return (new Database('usuarios'))->select($where,$order,$limit)
       ->fetchAll(PDO::FETCH_CLASS, self::class);
   }

   public static function getQuant($where=null){
    return (new Database('usuarios'))->select($where, null, null, 'COUNT(*) as qtd')
    ->fetchObject()
    ->qtd;
}

   public static function getGera($id){
    return (new Database('usuarios'))->select('id = '.$id)
    ->fetchObject(self::class);
   }
}