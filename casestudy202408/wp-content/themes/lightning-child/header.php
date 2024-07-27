<?php
/**
 * Lightning G3 Header
 *
 * @package vektor-inc/lightning
 */

do_action( 'get_header' ); ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
global $lightning_theme_options;
$lightning_theme_options = get_option( 'lightning_theme_options' );
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
<?php
//閲覧履歴設定
global $rireki;
if (is_singular('accommodations')) {
if (isset($_COOKIE['rireki'])) {
$rireki = explode(",", $_COOKIE['rireki']);
$aruno = in_array($post->ID, $rireki);

if ($aruno == true) {
$rireki = array_diff($rireki, array($post->ID));
$rireki = array_values($rireki);
}
if (count($rireki) >= 4) {
$set_rireki = array_slice($rireki, 0, 4);
} else {
$set_rireki = $rireki;
}
$touroku = $post->ID.','.implode(",", $set_rireki);
setcookie('rireki', $touroku, time() + 7776000, '/');
} else {
$touroku = $post->ID;
setcookie('rireki', $touroku, time() + 7776000, '/');
}
} else {
if (isset($_COOKIE['rireki'])) {
$rireki = explode(",", $_COOKIE['rireki']);
}
}
?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#main"><?php _e( 'Skip to the content', 'lightning' ); ?></a>
<a class="skip-link screen-reader-text" href="#vk-mobile-nav"><?php _e( 'Skip to the Navigation', 'lightning' ); ?></a>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
}
?>
