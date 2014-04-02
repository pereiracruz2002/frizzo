<?php include_once(dirname(__FILE__).'/v_header.php'); ?>
<div class="container">

        <!--Verificação de erros do login-->
        <?php if(isset($erro)): ?>
            <div class="alert alert-danger"><?php echo($erro); ?></div>
        <?php endif; ?>
        
        <form method="post" action="<?php echo current_url() ?>" class="form-signin">
          <h2 class="form-signin-heading">Identifique-se</h2>
            <input type="text" placeholder="Usuário" name="usuario" class="form-control" required autofocus>
            <input type="password" placeholder="Senha" name="senha" class="form-control" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </form>
</div>
<?php include_once(dirname(__FILE__).'/v_footer.php'); ?>
