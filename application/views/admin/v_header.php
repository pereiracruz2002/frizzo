<!DOCTYPE html>
<html>
    <head>
        <title>Mega Senha</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name='robots' content='noindex,nofollow' />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" type="text/css" media="Screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/dashboard.css" type="text/css" media="Screen" />
        <?php if (isset($css)): ?>
            <link rel="stylesheet" href="<?php echo base_url(); ?>css/<?php echo $css ?>" type="text/css" media="Screen" />
        <?php endif; ?> 

        <script type="text/javascript">var base_url = "<?php echo site_url(); ?>";</script>
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <?php if (isset($js)): ?>
            <script src="<?= base_url() ?>js/<?php echo $js; ?>" type="text/javascript"></script> 
        <?php endif; ?> 
    </head>
    <body>
        <?php if ($this->session->userdata('admin')) include_once(dirname(__FILE__) . '/v_nav.php'); ?>
        <div class="container-fluid">
