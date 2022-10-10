<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Geral;
use \App\Db\Pagination;
use \App\Session\Login;

//Obriga o usuario a estar logado
Login::requireLogin();

//busca
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

//filtro de status
$filtroTipo = filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_STRING);
$filtroTipo = in_array($filtroTipo,['usuario_acesso_microsoft', 'usuario_acesso_bd','alfresco']) ? $filtroTipo : '';

//condição sql
$condicoes = [
    strlen($busca) ? 'nome LIKE "%'.str_replace(' ','%',$busca).'%"' : null,

    strlen($filtroTipo) ? 'tipo = "'.$filtroTipo.'"' : null
];

//remova posições vazias
$condicoes = array_filter($condicoes);

//cláusula where
$where = implode(' AND ',$condicoes);

//quantidade total de vagas
$quantidade = Geral::getQuant($where);

//paginação
$obPagination = new Pagination($quantidade, $_GET['pagina'] ?? 1, 15);

//obtem a documentação
$geral = Geral::getGeral($where, null, $obPagination->getLimit());



include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';
