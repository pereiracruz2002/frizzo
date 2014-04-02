<?php include_once(dirname(__FILE__).'/v_header.php'); ?>
        <main class="container-fluid">  
            <article>
                <h1>Olá 
                    <?php
                    $nome = $this->session->userdata('admin');
                    echo $nome['usuario'];
                    ?>
                </h1>
             </article>
        </main>
<?php include_once(dirname(__FILE__).'/v_footer.php'); ?>
