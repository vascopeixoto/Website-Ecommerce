<?php if(!class_exists('Rain\Tpl')){exit;}?><div id="main" >
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-xs-12">
				<div id="meu_carrossel" class="carousel slide" data-ride="carousel">

					<!-- PONTOS REPRESENTATIVOS DE IMAGENS -->
					<ol class="carousel-indicators">
    					<li data-target="#meu_carrossel" data-slide-to="0" class="active"></li>
    					<li data-target="#meu_carrossel" data-slide-to="1"></li>
    					<li data-target="#meu_carrossel" data-slide-to="2"></li>
    					<li data-target="#meu_carrossel" data-slide-to="3"></li>
  					</ol>

					<!-- IMAGENS -->
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img src="/ecommerce/res/site/img/me1.jpg" class="img-thumbnail center" alt="sou eu">
							<div class="carousel-caption">
								Eu sou o <strong>Vasco Peixoto</strong>.
							</div>
						</div>
					
						<div class="item">
							<img src="/ecommerce/res/site/img/me2.jpg" class="img-thumbnail"  alt="mais uma foto minha">
							<div class="carousel-caption">
								Estou a aprender programação web.
							</div>
						</div>

						<div class="item">
							<img src="/ecommerce/res/site/img/me3.jpeg" class="img-thumbnail"  alt="futsal">
							<div class="carousel-caption">
								Mas também adoro futsal.
							</div>
						</div>

						<div class="item">
							<img src="/ecommerce/res/site/img/me4.jpeg" class="img-thumbnail"  alt="...">
							<div class="carousel-caption">
								<strong>Adoro a vida!</strong>
							</div>
						</div>

					</div>

					<!-- CONTROLES -->
					<a class="left carousel-control" href="#meu_carrossel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Anterior</span>
					</a>
					<a class="right carousel-control" href="#meu_carrossel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Próximo</span>
					</a>
				</div>
			</div>

			<div class="col-md-7 col-xs-12" style="background-color:#363636; color: white; ">
				<h1>Olá Amigos!</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet risus ligula. Mauris pretium magna nec porttitor vulputate. Maecenas nisi massa, imperdiet at viverra sed, gravida id quam. Vestibulum diam est, efficitur in libero ut, maximus dictum tellus. In a leo dolor. Nam nec dictum magna. Donec interdum dolor vel nulla placerat, at tincidunt orci viverra. Curabitur vel lacus enim. Morbi iaculis ipsum et mi pretium ultricies. Duis ut metus quis sapien dictum euismod. Vestibulum leo odio, porttitor eget ultricies eu, dignissim id tortor.

</p>
				<p><a class="btn btn-danger " href="?i=ola" role="button">Ler mais</a></p>
			</div>
		</div>
	</div>
</div>
<div id="middle"  >
	<div class="container">

		<div class="row"> 
			<div class="col-sm-6 col-md-4"> 
				<div class="thumbnail"> 
					<img id="imagens" src="/ecommerce/res/site/img/f1.jpeg" class="img-thumbnail"> 

					<div class="caption"> 
						<h3>Sobre</h3> 
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet risus ligula. Mauris pretium magna nec porttitor vulputate.</p> 
						<p><a href="?i=sobre" class="btn btn-danger" role="button">Ler mais</a> 
					</div> 
				</div> 
			</div> 

			<div class="col-sm-6 col-md-4"> 
				<div class="thumbnail"> 
					<img id="imagens" src="/ecommerce/res/site/img/f2.webp" class="img-thumbnail"> 
					<div class="caption"> 
						<h3>Quem Somos</h3> 
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet risus ligula. Mauris pretium magna nec porttitor vulputate.</p> <p><a href="?i=quemsomos" class="btn btn-danger" role="button">Ler mais</a>
					</div> 
				</div> 
			</div> 
			
			<div class="col-sm-6 col-md-4"> 
				<div class="thumbnail"> 
					<img id="imagens" src="/ecommerce/res/site/img/f3.jpeg" class="img-thumbnail"> 
					<div class="caption"> 
						<h3>Contactos</h3> 
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet risus ligula. Mauris pretium magna nec porttitor vulputate.</p> <p><a href="?i=contacto" class="btn btn-danger" role="button">Ler mais</a>
					</div> 
				</div> 
			</div> 
		</div>
	</div>
</div>
