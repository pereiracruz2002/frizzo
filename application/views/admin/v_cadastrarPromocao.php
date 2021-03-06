<?php include_once(dirname(__FILE__) . '/v_header.php'); ?>

<p><a href="<?php echo base_url(); ?>painel" class="btn btn-default">Voltar</a></p>

<main class="well">
    <!--Verificação de Admin cadastrado-->
    <?php if (isset($erro)): ?>
        <p class="alert alert-danger"><?php echo($erro); ?></p>
    <?php endif; ?>

    <!-- Mensagem de sucesso -->
    <?php if (isset($mensagem)): ?>
        <p class="alert alert-success"><?php echo($mensagem); ?></p>
    <?php endif; ?>

    <article>

        <!--<form method="post" action="<?php echo base_url(); ?>index.php/promocao/cadastrar" class="form-horizontal" role="form">-->
        <?php
        $attributes = array('class' => 'form-horizontal', 'id' => 'myform');
        echo form_open_multipart('promocao/cadastrar', $attributes);?>
            <div class="form-group">
                <label class="col-sm-2 control-label">Nome:</label>
                <div class="col-sm-10">
                    <input type="text" name="nome" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Preço:</label>
                <div class="col-sm-10">
                    <input type="text" name="link" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Ativo</label>
                <div class="col-sm-10">
                    <select name="ativo" class="form-control">
                        <option value="1" name="sim" >Sim</option>
                        <option value="0" name="nao" >Não</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="exampleInputFile">Imagem</label>
                <input type="file" name="imagem" id="exampleInputFile">
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </form>
    </article>
</main>

<?php include_once(dirname(__FILE__) . '/v_footer.php'); ?>
