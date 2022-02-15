<?php if(!class_exists('Rain\Tpl')){exit;}?>

		
		<video autoplay muted loop id="myVideo">
			<source src="/ecommerce/res/site/img/twvid.mp4" type="video/mp4"> 
		</video> 
		<div class="content">
			<h1>Truck & Wheel</h1>
				<P>Uma referência no setor da logística, somos um grupo multinacional que conta com uma magnífica equipa de profissionais com ampla experiência no mundo da logística. A nossa aposta por valores como o ID, a integração no âmbito social e a qualidade competitiva, tem-nos permitido crescer até chegar a ser uma das principais referências no sector. </P>
			<!-- Use a button to pause/play the video with JavaScript -->
			<button id="myBtn" onclick="myFunction()">Pause</button>
		</div>	

<div id="main" style="margin-top: -200px;">
	<div class="container" >
		<div class="row">
			<div class="col-md-5 col-xs-12">
				<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-indicators">
					  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
					  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
					  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
					</div>
					<div class="carousel-inner">
					  <div class="carousel-item active">
						<img src="/ecommerce/res/site/img/f1.jpeg" class="d-block w-100" alt="...">
					  </div>
					  <div class="carousel-item">
						<img src="/ecommerce/res/site/img/f2.jpeg" class="d-block w-100" alt="...">
					  </div>
					  <div class="carousel-item">
						<img src="/ecommerce/res/site/img/f3.jpeg" class="d-block w-100" alt="...">
					  </div>
					  <div class="carousel-item">
						<img src="/ecommerce/res/site/img/f4.jpeg" class="d-block w-100" alt="...">
					  </div>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
					  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					  <span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
					  <span class="carousel-control-next-icon" aria-hidden="true"></span>
					  <span class="visually-hidden">Next</span>
					</button>
				  </div>
			</div>
			<div class="col-md-7 col-xs-12" style="background-color:#363636; color: white; ">
				<h1>Bem-Vindos!</h1>
				<p>A Truck and Wheel foi criada em 1998 por um conjunto de profissionais com anos de experiência neste setor da logística, propondo um serviço mais personalizado do que a concorrência e de igual nível de qualidade em termos de transporte, armazenagem e distribuição de mercadoria. Desde esse ponto, a empresa tem tido um crescimento grande onde nos primeiros anos foi consolidada uma rede ampla de logística e distribuição nos principais pontos de Espanha e que mais tarde foi se expandir para outros países, abrindo diversas unidades em Portugal, França e Alemanha.</p>
				<p><a class="btn btn-danger " href="/ecommerce/index.php/historia" role="button">Ler mais</a></p>
			</div>
		</div>
	</div>
</div>
	<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
		
	</div>

<div class="maincontent-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="latest-product">
					<h2 class="section-title">Serviços</h2>
					<div class="product-carousel">
						<?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>

						<div class="single-product">
							<div class="product-f-image">
								<img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
								<div class="product-hover">
									<a href="/ecommerce/index.php/cart/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" class="add-to-cart-link text-decoration-none"><i class="fa fa-shopping-cart"></i> Pre-Reserva</a>
									<a href="/ecommerce/index.php/products/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="view-details-link text-decoration-none"><i class="fa fa-link"></i> Detalhes</a>
								</div>
							</div>
							
							<h2><a class="text-decoration-none" href="/ecommerce/index.php/products/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h2>
							
							<div class="product-carousel-price">
								<ins><?php echo formatPrice($value1["vlprice"]); ?>€</ins>
							</div> 
						</div>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End main content area -->

<script>
	// Get the video
	var video = document.getElementById("myVideo");
	
	// Get the button
	var btn = document.getElementById("myBtn");
	
	// Pause and play the video, and change the button text
	function myFunction() {
	  if (video.paused) {
		video.play();
		btn.innerHTML = "Pause";
	  } else {
		video.pause();
		btn.innerHTML = "Play";
	  }
	}
	</script>

