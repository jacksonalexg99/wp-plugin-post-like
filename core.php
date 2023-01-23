<?php
/*
Plugin Name:افزونه لایک پست
Plugin URI: http://wordpress.org/plugins/plugin-wordpress/
Description:  افزونه لایک پست
Author: محمدرضا کیانی
Version: 1.0.0
Author URI:http://mohammadrezakiani.ir
*/
?>
<?php
if ( ! defined( "ABSPATH" ) ) {
	die( 'مجوز دسترسی نداری!' );
}

define( "KO_LIKE_URL", plugin_dir_url( __FILE__ ) );
define( "KO_LIKE_DIR", plugin_dir_path( __FILE__ ) );

include_once KO_LIKE_DIR . "/_inc/save_like.php";
include_once KO_LIKE_DIR . '/_inc/add_like.php';
include_once KO_LIKE_DIR . "/_inc/get_count_like.php";

function register_scrip_css() {
	wp_enqueue_style( 'style_ko_like2', KO_LIKE_URL . "assets/css/style2.css", '', '1.0.0' );
	if ( is_user_logged_in() ) {
		wp_enqueue_script( 'script_ko_like', KO_LIKE_URL . "assets/script/script.js", [ 'jquery' ], '1.0.0', 'true' );
		wp_enqueue_style( 'style_ko_like', KO_LIKE_URL . "assets/css/style.css", '', '1.0.0' );

	}
}

add_action( 'wp_enqueue_scripts', 'register_scrip_css' );

