<?php
header("Content-type: text/html; charset=utf8_decode()");
  $mensagem = '';
  if(isset($_GET['status'])){
    switch ($_GET['status']) {
      case 'success':
        $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
        break;

      case 'error':
        $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
        break;
    }
  }

  $resultados = '';
  foreach($geral as $gera){
    $resultados .= '<tr>
                      <td>'.$gera->id.'</td>
                      <td>'.$gera->nome.'</td>
                      <td>'.$gera->usuario.'</td>
                      <td>'.$gera->senha.'</td>
                      <td>'.$gera->servidor.'</td>
                      <td>
                        <a href="editar.php?id='.$gera->id.'">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        </td><td>
                        <a href="excluir.php?id='.$gera->id.'">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhuma documentação encontrada
                                                       </td>
                                                    </tr>';
//gets
unset($_GET['status']);
unset($_GET['pagina']);

$gets = http_build_query($_GET);




//paginação
$paginacao = '';
$paginas = $obPagination->getPages();
foreach ($paginas as $key => $pagina) {
      $class = $pagina['atual'] ? 'btn-primary' : 'btn-light';
      $paginacao .= '<a href="?pagina='.$pagina['pagina'].'&'.$gets.'">
      <button type="button" class="btn '.$class.'">'.$pagina['pagina'].'</button>
      </a>';
}




?>
<main>
<meta charset="utf-8">
  <?=$mensagem?>

  <section>

    <a href="cadastrar.php">
      <button class="btn btn-success">Cadastrar</button>
    </a>
  </section>

  <section>
    <form method="get">

    <div class="row my-4">

    <div class="col">
      <label>Buscar por nome</label>
      <input type="text"name="busca" class="form-control" value="<?=$busca?>">
    </div>

<div class="col">
<label>Filtro</label>
  <select name="tipo" class="form-control">
  <option value=""></option>
  <option value="usuario_acesso_microsoft" <?=$filtroTipo == 'usuario_acesso_microsoft' ? 'selected' : ''?>>Usuário Microsoft</option>
  <option value="usuario_acesso_bd" <?=$filtroTipo == 'usuario_acesso_bd' ? 'selected' : ''?>>Usuário Banco de Dados</option>
  <option value="alfresco"<?=$filtroTipo == 'alfresco' ? 'selected' : ''?>>Alfresco</option>
</select>
</div>

<div class="col d-flex align-items-end">
<button type="submit" class="btn btn-info">Filtrar</button>
</div>

</div>

</form>
</section>

  <section>

    <table class="table bg-light mt-3 my-4">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Usuário</th>
            <th>Senha</th>
            <th>Servidor</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
            <?=$resultados?> 
        </tbody>
    </table>

  </section>

<section>
  <?=$paginacao?>
</section>


<br>
</main>
