<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>painel">Frizzo</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url(); ?>palavras/cadastrar">Cadastrar palavras</a></li>
                <li><a href="<?php echo base_url(); ?>palavras/listarPalavras">Listar Palavras</a></li>
                <li><a href="<?php echo base_url(); ?>jogadores/listarJogadores">Listar Jogadores</a></li>
                <?php 
                    $dados = $this->session->userdata('admin');
                    if($dados['permissao'] == 1):
                ?>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/cadastrar">Cadastrar Administrador</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/listar">Listar Administradores</a></li>
                <?php endif; ?>
                <li><a href="<?php echo base_url(); ?>index.php/admin/sair">Sair</a></li>

            </ul>
        </div>
    </div>
</div>
