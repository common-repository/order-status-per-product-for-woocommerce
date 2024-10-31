<?php
/* admin style and script */
function OSPPFW_load_admin_script_style() {
    wp_enqueue_style( 'OSPPFW_admin_css', OSPPFW_PLUGIN_DIR . '/assets/css/osppfw_back_style.css', false, '1.0.0' );
    wp_enqueue_script( 'OSPPFW_admin_script', OSPPFW_PLUGIN_DIR . '/assets/js/osppfw_back_script.js', false, '1.0.0' );
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-alpha', OSPPFW_PLUGIN_DIR . '/assets/js/wp-color-picker-alpha.min.js', array( 'wp-color-picker' ), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'OSPPFW_load_admin_script_style');

function OSPPFW_load_footer(){
    wp_enqueue_script( 'wc-add-to-cart-variation' );
    wp_enqueue_script('wc-single-product');
}
add_filter( 'wp_footer', 'OSPPFW_load_footer' , 10, 2 );