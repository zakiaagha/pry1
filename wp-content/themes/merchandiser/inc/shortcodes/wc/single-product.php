<?php

function getbowtied_product_mod($atts, $content = null) {	
	extract(shortcode_atts(array(
		"id" => ''
	), $atts));
    ob_start();
    
	echo '<div class="shortcode_single_product">'.do_shortcode('[product id="'.$id.'"]').'</div>';
	
    $content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("product_mod", "getbowtied_product_mod");