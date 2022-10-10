<?php
namespace App\Db;

class Pagination{
    //número maximo de registros por páginas
    private $limit;

    //quantidade total de resultados do banco
    private $results;

    //quantidade de páginas
    private $pages;

    //página atual
    private $currentPage;

    //construtor da classe
    public function __construct($results,$currentPage = 1, $limit=15){
        $this->results = $results;
        $this->limit = $limit;
        $this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
        $this->calculate();
    }

    private function calculate(){
        //calcula o total de páginas
        $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;

        //verifica se a pagina atual não excede o numero de paginas
        $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
    }
    //metodo responsável por retornar a cláusula limit do sql
    public function getLimit(){
      $offset = ($this->limit * ($this->currentPage - 1));
      return $offset.','.$this->limit;
    }

    //metodo responsável por retornar as opções de pagina disponíveis
    public function getPages(){
      //nao retorna páginas
      if($this->pages == 1) return[];

      //paginas
      $paginas = [];
      for($i = 1; $i <= $this->pages; $i++){
        $paginas[] = [
          'pagina' => $i,
          'atual' => $i == $this->currentPage
        ];
      }
      return $paginas;
    }
}
