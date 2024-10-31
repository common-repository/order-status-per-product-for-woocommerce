<?php
/*Wocommerce Plugin Activate*/
function OSPPFW_check_install_plugin_state(){
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if ( ! ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) ) {
        set_transient( get_current_user_id() . 'OSPPFWerror', 'message' );
    }
}
add_action('admin_init', 'OSPPFW_check_install_plugin_state',11);


/*Add Error Notice*/
function OSPPFW_show_require_install_error_notice() {

    if ( get_transient( get_current_user_id() . 'OSPPFWerror' ) ) {
        deactivate_plugins( plugin_basename(OSPPFW_PLUGIN_FILE) );

        delete_transient( get_current_user_id() . 'OSPPFWerror' );

        echo '<div class="error"><p> This plugin is deactivated because it require <a href="plugin-install.php?tab=search&s=woocommerce">WooCommerce</a> plugin installed and activated.</p></div>';

    }
}
add_action( 'admin_notices', 'OSPPFW_show_require_install_error_notice');
