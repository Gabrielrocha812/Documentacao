<?php
header("Content-type: text/html; charset=utf-8");
?>
<main>

    <section>
        <a href="index.php"><button class="btn btn-success">Voltar</button></a>
</section>    

<h2 class="mt-3"><?=TITLE?></h2>

<form method="post">

    <div class="form-group">
      <label>Nome</label>
      <input type="text" class="form-control" name="nome" value="<?=$obGeral->nome?>">
    </div>

    <div class="form-group">
      <label>Usuário</label>
      <input type="text" class="form-control" name="usuario" value="<?=$obGeral->usuario?>">
    </div>

    <div class="form-group">
      <label>Senha</label>
      <input type="text" class="form-control" name="senha" value="<?=$obGeral->senha?>">
    </div>

    <div class="form-group">
      <label>Servidor</label>
      <input type="text" class="form-control" name="servidor" value="<?=$obGeral->servidor?>">
    </div>

    <div class="form-group">
    <label>Tipo</label>
    <select name="tipo" class="form-control">
    <option value=""></option>
    <option value="usuario_acesso_microsoft" <?=$obGeral->tipo == 'usuario_acesso_microsoft' ? 'selected' : ''?>>Usuário Microsoft</option>
    <option value="usuario_acesso_bd" <?=$obGeral->tipo == 'usuario_acesso_bd' ? 'selected' : ''?>>Usuário Banco de Dados</option>
    <option value="alfresco"<?=$obGeral->tipo == 'alfresco' ? 'selected' : ''?>>Alfresco</option>
    </select>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>

  </form>   
</main>