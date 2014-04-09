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
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Ativo</th>
                        <th colspan="2"></th>
                    </tr>
                    <?php foreach ($query->result() as $promocao): ?>
                        <tr>
                            <td><?php echo $promocao->nome; ?></td>
                            <td><?php echo $promocao->link; ?></td>
                            <td><?php echo $promocao->ativo; ?></td>
                            <td><a href='<?php echo base_url(); ?>index.php/promocao/mostrarEditar/<?php echo $promocao->promocao_id; ?>'>Editar</a></td>
                            <td><a href='<?php echo base_url(); ?>index.php/promocao/deletar/<?php echo $promocao->promocao_id; ?>'>Deletar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </article>
        </main>
<?php include_once(dirname(__FILE__).'/v_footer.php'); ?>
