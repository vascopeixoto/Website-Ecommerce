<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div class="product-big-title-area" id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-bit-title text-center">
					<h2>Confirmação do pedido</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="single-product-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-content-right">
					<form action="/ecommerce/index.php/checkout" class="checkout" method="post" name="checkout">
						<div id="customer_details" class="col2-set">
							<div class="row">
								<div class="col-md-12">

									<div class="woocommerce-billing-fields">
										<div class="clear"></div>
										<h3 id="order_review_heading" style="margin-top:30px;">Detalhes do Pedido</h3>
										<div id="order_review" style="position: relative;">
											<table class="shop_table">
												<thead>
													<tr>
														<th class="product-name">Produto/ Serviço</th>
														<th class="product-total">Total</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>

													<tr class="cart_item">
														<td class="product-name">
															<?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <strong class="product-quantity">X <?php echo htmlspecialchars( $value1["nrqtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> 
														</td>
														<td class="product-total">
															<span class="amount"><?php echo formatPrice($value1["vltotal"]); ?>€</span>
														</td>
                                                    </tr>
                                                    <?php } ?>

												</tbody>
												<tfoot>
													
													<tr class="order-total">
														<th>Total do Pedido</th>
														<td><strong><span class="amount"><?php echo formatPrice($cart["vltotal"]); ?>€</span></strong> </td>
													</tr>
													<tr>
														<th>Será contactado via email para ser marcada uma reunião, a fim de fazer a personalização, negociação e pagamento do seu pedido.</th>
														<td>Preço pode sofrer alterações mediante a personalização do pedido.</td>
													</tr>
												</tfoot>
											</table>
											<div id="payment">
												<div class="form-row place-order">
													<input type="submit" data-value="Place order" value="Continuar" id="place_order" name="woocommerce_checkout_place_order" class="button alt">
												</div>
												<div class="clear"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>