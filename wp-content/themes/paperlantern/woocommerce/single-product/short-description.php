<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

if ( ! $post->post_excerpt ) {
	return;
}

?>
	<div itemprop="description">
		<?php //apply_filters( 'woocommerce_short_description', $post->post_excerpt )
		$description = $post->post_excerpt;
		?>
		<p><span class="first-letter"><?php echo $description[0] ?></span><?php echo substr($description, 1); ?></p>
	</div>
</div>

<div class="props-container">
	<div class="row">
	  <div class="col-md-6"><h5>Bottle Format</h5><span class="props">700ml</span></div>
	  <div class="col-md-6"><h5>Region</h5><span class="props">Thailand</span></div>
	</div>
</div>
