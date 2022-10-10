<?php
header("Content-type: text/html; charset=utf-8");
?>
<main>

    <section>
        <a href="index_usuarios.php"><button class="btn btn-success">Voltar</button></a>
</section>    

<h2 class="mt-3"><?=TITLE?></h2>

<form method="post">

    <div class="form-group">
      <label>Usuário</label>
      <input type="text" class="form-control" name="usuario" value="<?=$obGeral->usuario?>">
    </div>

    <div class="form-group">
      <label>Anydesk</label>
      <input type="text" class="form-control" name="anydesk" value="<?=$obGeral->anydesk?>">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>

  </form>   
</main>