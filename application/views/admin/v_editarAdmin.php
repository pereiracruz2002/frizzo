<?php include_once(dirname(__FILE__).'/v_header.php'); ?>

        <p><a href="<?php echo base_url(); ?>admin/listar" class="btn btn-default">Voltar</a></p>
        <main class="well">  
            <article>
                <form method="post" action="<?php echo base_url(); ?>admin/editar/<?php echo $this->uri->segment(3); ?>" class="form-horizontal">
                    <?php foreach($query->result() as $admin): ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Usuario:</label>
                            <div class="col-sm-10">
                                <input type="text" name="usuario" class="form-control" value="<?php echo $admin->usuario; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Senha:</label>
                            <div class="col-sm-10">
                                <input type="text" name="senha" class="form-control" value="<?php echo $admin->senha; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Permitir adicionar novos administradores?</label>
                            <div class="col-sm-10">
                                <select name="permissao" class="form-control">
                                    <option value="1" <?php echo $admin->permissao ? 'selected' : '' ?> >Sim</option>
                                    <option value="0" <?php echo !$admin->permissao ? 'selected' : '' ?>>Não</option>
                                </select>
                            </div>
                        </div>
                    <?php endforeach; ?>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                  </div>

                </form>
            </article>
        </main>
<?php include_once(dirname(__FILE__).'/v_footer.php'); ?>
