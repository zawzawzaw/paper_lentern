<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
		

		<article id="cart-section">
          	<div class="container">            
            	<div class="row">
					<div class="col-md-4 address-container">
		                <?php do_action( 'woocommerce_checkout_billing' ); ?>
	              	</div>
	              	<div class="col-md-8 cart-container">
						<h2>Shopping Cart</h2>

						<?php do_action( 'woocommerce_checkout_shipping' );

						do_action( 'woocommerce_before_cart' ); ?>

						<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

						<?php do_action( 'woocommerce_before_cart_table' ); ?>						


							<div class="cart-header">
			                  <ul>
			                    <li><h6><?php _e( 'Product', 'woocommerce' ); ?></h6></li>
			                    <li><h6><?php _e( 'Unit Price', 'woocommerce' ); ?></h6></li>
			                    <li><h6><?php _e( 'Quantity', 'woocommerce' ); ?></h6></li>
			                    <li><h6><?php _e( 'Total', 'woocommerce' ); ?></h6></li>
			                  </ul>
			                </div>
			                <div class="cart-content">			                 
								<?php do_action( 'woocommerce_before_cart_contents' ); ?>

								<?php
								foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
									$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
									$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

									if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
										$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
										?>
										<ul class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

											<li>
												<?php
													$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

													if ( ! $product_permalink ) {
														echo $thumbnail;
													} else {
														printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
													}
												?>
												<span class="product-name">
													<?php
														if ( ! $product_permalink ) {
															echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
														} else {
															echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key );
														}

														// Meta data
														echo WC()->cart->get_item_data( $cart_item );

														// Backorder notification
														if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
															echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
														}
													?>
												</span>
											</li>											

											<li>
												<span class="product-price">
													<?php
													echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
													?>
												</span>
											</li>

											<li>
												<span class="product-qty">
													<?php
														if ( $_product->is_sold_individually() ) {
															$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
														} else {
															$product_quantity = woocommerce_quantity_input( array(
																'input_name'  => "cart[{$cart_item_key}][qty]",
																'input_value' => $cart_item['quantity'],
																'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
																'min_value'   => '0'
															), $_product, false );
														}

														// echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
														echo $cart_item['quantity'];
													?>
												</span>
											</li>

											<li>
												<span class="product-total">
													<?php
														echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
													?>
												</span>
											</li>
										</ul>
										<?php
									}
								}

								do_action( 'woocommerce_cart_contents' );
								?>
								<!-- <tr>
									<td colspan="6" class="actions">

										<?php if ( wc_coupons_enabled() ) { ?>
											<div class="coupon">

												<label for="coupon_code"><?php _e( 'Coupon', 'woocommerce' ); ?>:</label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply Coupon', 'woocommerce' ); ?>" />

												<?php do_action( 'woocommerce_cart_coupon' ); ?>
											</div>
										<?php } ?>

										<input type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'woocommerce' ); ?>" />

										<?php //do_action( 'woocommerce_cart_actions' ); ?>

										<?php wp_nonce_field( 'woocommerce-cart' ); ?>
									</td>
								</tr> -->

								<?php do_action( 'woocommerce_after_cart_contents' ); ?>
							</div>
						

						<?php do_action( 'woocommerce_after_cart_table' ); ?>

						</form>

						<!-- <div class="cart-collaterals"> -->

							<?php //do_action( 'woocommerce_cart_collaterals' ); ?>

						<!-- </div> -->

						<?php do_action( 'woocommerce_after_cart' ); ?>

						<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
						
						
						<?php do_action( 'woocommerce_checkout_order_review' ); ?>		                  
						

						<!-- <div id="order_review" class="woocommerce-checkout-review-order">
							
						</div> -->

						<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
	              	</div>				
				</div>
			</div>
		</article>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>	

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
