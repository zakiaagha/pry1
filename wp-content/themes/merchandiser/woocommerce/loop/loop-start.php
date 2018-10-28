<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */
 
global $woocommerce_loop;
?>

<?php

$products_per_column 			= 6;
$products_per_column_xlarge 	= 5;
$products_per_column_large 		= 3;
$products_per_column_medium 	= 2;
$products_per_column_small 		= 2;

if ( ( isset($woocommerce_loop['columns']) && $woocommerce_loop['columns'] != "" ) ) {
	$products_per_column = $woocommerce_loop['columns'];
} else {
	$products_per_column = get_option('woocommerce_catalog_columns', 5);

	if (isset($_GET["products_per_row"])) {
		$products_per_column = $_GET["products_per_row"];
	}
}

if ($products_per_column 			== 	6 	) {
	$products_per_column_xlarge 	= 	5 	;
	$products_per_column_large 		= 	3 	;
	$products_per_column_medium 	= 	3 	;
	$products_per_column_small 		= 	2 	;
}

if ($products_per_column 			== 	5	) {
	$products_per_column_xlarge 	= 	4	;
	$products_per_column_large 		= 	3	;
	$products_per_column_medium 	= 	3	;
	$products_per_column_small 		= 	2	;
}

if ($products_per_column 			== 	4	) {
	$products_per_column_xlarge 	= 	4	;
	$products_per_column_large 		= 	3	;
	$products_per_column_medium 	= 	3	;
	$products_per_column_small 		= 	2	;
}

if ($products_per_column 			== 	3	) {
	$products_per_column_xlarge 	= 	3	;
	$products_per_column_large 		= 	2	;
	$products_per_column_medium 	= 	2	;
	$products_per_column_small 		= 	2	;
}

if ($products_per_column 			== 	2	) {
	$products_per_column_xlarge 	= 	2	;
	$products_per_column_large 		= 	2	;
	$products_per_column_medium 	= 	2	;
	$products_per_column_small 		= 	2	;
}

if ($products_per_column 			== 	1	) {
	$products_per_column_xlarge 	= 	1	;
	$products_per_column_large 		= 	1	;
	$products_per_column_medium 	= 	1	;
	$products_per_column_small 		= 	1	;
}

?>

<ul 

class="	products products-grid 
		small-block-grid-<?php 		echo intval($products_per_column_small); 	?> 
		medium-block-grid-<?php 	echo intval($products_per_column_medium); 	?> 
		large-block-grid-<?php 		echo intval($products_per_column_large); 	?> 
		xlarge-block-grid-<?php 	echo intval($products_per_column_xlarge); 	?> 
		xxlarge-block-grid-<?php 	echo intval($products_per_column);			?> 
		columns-<?php 				echo intval($products_per_column);			?>
">