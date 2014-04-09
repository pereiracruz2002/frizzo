<?php include_once(dirname(__FILE__).'/v_header.php'); ?>
<div class="panel panel-default">
  <div class="panel-heading">Novo Voucher</div>
  <div class="panel-body">
    <form method="post" action="upload.php" enctype="multipart/form-data" class="form-horizontal">
      <div class="form-group">
        <label class="col-md-2 control-label">Titulo</label>
        <div class="col-md-6">
          <input type="text" name="titulo" class="form-control" required />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">Descrição</label>
        <div class="col-md-6">
          <textarea name="descricao" class="form-control" required></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2 control-label">Regulamento</label>
        <div class="col-md-6">
          <textarea name="regulamento" class="form-control" required></textarea>
        </div>
      </div>

        
      <div class="form-group">
        <label class="col-md-2 control-label">Imagens</label>
        <div class="col-md-6">
          <input type="file" name="imagem" required /><br />
          <input type="file" name="imagem2" /><br />
          <input type="file" name="imagem3" />
        </div>
      </div>
      <div class="col-md-offset-2">
        <button class="btn btn-primary">Cadastrar</button>
      </div>  
        
        <?php
            if(isset($_GET['erro'])){
               echo $_GET['erro'];
            }
        ?>
    </form>
  </div>
</div>
<?php include_once(dirname(__FILE__).'/v_footer.php'); ?>
