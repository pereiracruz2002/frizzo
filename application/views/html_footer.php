    <script src="<?php echo base_url()?>js/jquery-1.10.2.min.js"></script>
    
    <!-- jQuery direto do CDN (somente online) -->
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
        <script type="text/javascript">
      $(function () {
          $("[rel='tooltip']").tooltip();
      });
      $(function () {
        $("[rel='popouver']").popover();
      });
      $('.carousel').carousel()
    </script>
  </body>
</html>
