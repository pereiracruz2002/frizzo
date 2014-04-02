    <script src="<?php echo base_url()?>js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">var base_url = "<?php echo site_url(); ?>";</script>
    <script src="<?php echo base_url();?>js/ion.sound.min.js" type="text/javascript"></script>
    
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
      $(document).ready(function(){

        $("input[name=senha]").focus();

        $.ionSound({
              sounds: [
                  "bell_ring",
              ],
              path: "http://localhost/frizzo/sons/",
              multiPlay: true,
              volume: "1.0"
        });
      $("form").on("submit", function(e){
        e.preventDefault();
        senha =  $("input[name=senha]").val();
        total_senhas = $('#senha li').length;
        if(total_senhas == 1){
          $('#senha').empty();
          $('#senha').append( "<li>"+senha+"</li>" );
          $('#senha').append( "<li></li>" );
        }else if(total_senhas > 5){
          $('#senha li').eq(4).empty();
          $('#senha li').eq(0).append( "<li>"+senha+"</li>" );
        }else{
           $( "<li>"+senha+"</li>" ).insertBefore($('#senha li').eq(0));
        }
        $("input[name=senha]").val("");
        $("input[name=senha]").focus();

        $.ionSound.play("bell_ring")
       });
    });
    </script>
  </body>
</html>
