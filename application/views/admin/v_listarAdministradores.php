<?php include_once(dirname(__FILE__).'/v_header.php'); ?>
        <p><a href="<?php echo base_url(); ?>painel" class="btn btn-default">Voltar</a></p>
        <main>    
            <!-- Mensagem de sucesso -->
            <?php if(isset($mensagem)): ?>
                <p class="alert alert-success"><?php echo($mensagem); ?></p>
            <?php endif; ?>
                
            <!--Verificação de erros na busca-->
            <?php if(isset($erro)): ?>
                <p class="alert alert-danger"><?php echo($erro); ?></p>
            <?php endif; ?>    
                
            <article class="row-fluid">
                <table class="table table-stripped">
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Senha</th>
                        <th colspan="2"></th>
                    </tr>
                    <?php foreach ($query->result() as $admin): ?>
                        <tr>
                            <td><?php echo $admin->id; ?></td>
                            <td><?php echo $admin->usuario; ?></td>
                            <td><?php echo $admin->senha; ?></td>
                            <td><a href='<?php echo base_url(); ?>index.php/admin/mostrarEditar/<?php echo $admin->id; ?>'>Editar</a></td>
                            <td><a href='<?php echo base_url(); ?>index.php/admin/deletar/<?php echo $admin->id; ?>'>Deletar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </article>
        </main>
<?php include_once(dirname(__FILE__).'/v_footer.php'); ?>
