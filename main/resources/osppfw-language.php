<?php

/*PLUGIN LOADED Order Status Per Product For Woocommerce */
add_action( 'plugins_loaded', 'OSPPFW_load_textdomain_lang' );
function OSPPFW_load_textdomain_lang() {
    load_plugin_textdomain( 'order-status-per-product-woocommerce', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

/*LANGUAGES FOLDER Order Status Per Product For Woocommerce */
add_filter( 'load_textdomain_mofile', 'OSPPFW_plugin_load_own_textdomain_lang', 10, 2 );
function OSPPFW_plugin_load_own_textdomain_lang( $mofile, $domain ) {
    if ( 'order-status-per-product-woocommerce' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
        $locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
        $mofile = WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) . '/languages/' . $domain . '-' . $locale . '.mo';
    }
    return $mofile;
}