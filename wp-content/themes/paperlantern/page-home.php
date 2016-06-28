<?php 
echo "Redirecting...";
$product = get_page_by_title( 'Sichuan Pepper Gin', OBJECT, 'product' );
echo '<script>window.location.href = "'.get_permalink( $product->ID ).'"</script>';
exit();
?>