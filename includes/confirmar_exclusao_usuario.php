<?php
header("Content-type: text/html; charset=utf-8");
?>
<main>

<h2 class="mt-3">Excluir</h2>

<form method="post">

<div class="form-group">
      <p>Você realmente deseja excluir a <strong><?=$obGeral->usuario?></strong>?</p>
    </div>

    <div class="form-group">
        <a href="index_usuarios.php" ><button type="button" class="btn btn-success">Cancelar</button></a>

    
      <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
    </div>

  </form>   
</main>