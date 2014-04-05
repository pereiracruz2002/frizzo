<?php include_once(dirname(__FILE__).'/html_header.php'); ?>
<div class="container">
	<div class="row" style="margin-top: 20px;">
		
		<div class="col-md-12">
			<div class="panel panel-default">
				 <div class="panel-body">
					<h1 class="text-center text_maisculo yellow">Peixaria Frizzo</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
	  			<div class="panel-heading">
	  				<h3 class="text-center text_maisculo yellow">Senha</h3></div>
		  			<div class="panel-body">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-2 col-md-offset-5">
									<form action="" method="post" accept-charset="utf-8" class="form" name="myform">
										<input class="col-md-2 form-control senha" type="text" name="senha" placeholder="">
									</form>
								</div>
								</div>
								<div class="col-md-offset-5"></div>
							</div>
						</div>
		  			</div>
		  		</div>
		</div>
	</div>

	
	<div class="row">
		<div class="col-md-12" style="margin-top: 10px;">
			<div class="col-md-6">
				<div class="panel panel-default">
	  			       <div class="panel-heading"><h4 class="text-center text_maisculo yellow">Últimas Senhas</h4></div>
				         <div class="panel-body">
				    	     <ul class="list-unstyled" id="senha">
				    	     	<li>*****</li>
				    	     </ul>
				         </div>
	            </div>
			</div>
			<div class="col-md-6">
			<div class="panel panel-default">
	  			<div class="panel-heading"><h4 class="text-center text_maisculo yellow">Ofertas do dia</h4></div>
					<div class="panel-body">
						<div id="myCarousel" class="carousel slide">
							<ol class="carousel-indicators">
								<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								<li data-target="#myCarousel" data-slide-to="1"></li>
								<li data-target="#myCarousel" data-slide-to="2"></li>
							</ol>
						<!-- Carousel items -->
							<div class="carousel-inner">
								<div class="active item"><img class="media-object img-rounded" src="<?php echo base_url()?>uploads/sardinha.jpg" width="430" height="295"></div>
								<div class="item"><img class="media-object img-rounded" src="<?php echo base_url()?>uploads/Pacu.jpg" width="430" height="295"></div>
								<div class="item"><img class="media-object img-rounded" src="<?php echo base_url()?>uploads/Tilapia.jpg" width="430" height="295"></div>
							</div>
							<!-- Carousel navegação -->
							<a class="left carousel-control" href="#myCarousel" data-slide="prev">
								<span class="icon-prev"></span>
							</a>
							<a class="right carousel-control" href="#myCarousel" data-slide="next">
								<span class="icon-next"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!--container-->
<?php include_once(dirname(__FILE__).'/html_footer.php'); ?>