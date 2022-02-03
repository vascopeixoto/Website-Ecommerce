<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>Truck and Wheel</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/hcodebr" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/hcodebr" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.youtube.com/channel/UCjWENuSH2gX55-y7QSZiWxA" target="_blank"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Navegação </h2>
                    <ul>
                        <li><a href="?i=sobre">Sobre</a></li>
                        <li><a href="?i=quemsomos">Quem Somos</a></li>
                        <li><a href="?i=contacto">Contactos</a></li>
                    </ul>                        
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Categorias</h2>
                    <ul>
                        <?php require $this->checkTemplate("categories-menu");?>                            
                    </ul>                        
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-newsletter">
                    <h2 class="footer-wid-title">Newsletter</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus!</p>
                    <div class="newsletter-form">
                        <form action="#">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 center">
                    <p>Construido por Vasco Peixoto</p>
                    <p>Podes encontrar-me nestas redes sociais:
                    <a href="https://www.facebook.com/Loudy20/" target="_blank"><i class="fa fa-facebook-official fa-lg "></i></a>
                    <a href="https://www.instagram.com/vasco_peixoto85/" target="_blank"><i class="fa fa-instagram fa-lg "></i></a>
                    <a href="https://www.linkedin.com/in/vascompeixoto/" target="_blank"><i class="fa fa-linkedin fa-lg w3-hover-opacity"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer top area -->


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="/ecommerce/res/site/js/bootstrap.min.js"></script>
<!-- Latest jQuery form server -->
<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->

<!-- jQuery sticky menu -->
<script src="/ecommerce/res/site/js/owl.carousel.min.js"></script>
<script src="/ecommerce/res/site/js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="/ecommerce/res/site/js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="/ecommerce/res/site/js/main.js"></script>

<!-- Slider -->
<script type="text/javascript" src="/ecommerce/res/site/js/bxslider.min.js"></script>
<script type="text/javascript" src="/ecommerce/res/site/js/script.slider.js"></script>
</body>
</html>