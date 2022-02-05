<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="product-big-title-area" id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2><?php echo htmlspecialchars( $category["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="container">
        <div class="row">
            <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>

            <div class="col-md-3 col-sm-6">
                <div class="single-shop-product text-center thumbnail tt">
                    <div class="product-upper ">
                        <a href="/ecommerce/index.php/products/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="text-decoration: none" >
                            <img class="image"src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="" height="2000px" width="auto">
                                <h3><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                        </a>
                    </div>
                    
                    <div class="product-carousel-price">
                        <ins><?php echo formatPrice($value1["vlprice"]); ?>€</ins>
                    </div>  
                    
                    <div class="product-option-shop">
                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Comprar</a>
                    </div>                       
                </div>
            </div>
            <?php } ?>

            
          
        </div>
    </div>
</div>