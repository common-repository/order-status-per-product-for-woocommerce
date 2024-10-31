<?php
/*Admin Menu Here*/ 
add_action( 'admin_menu',  'osppfw_submenu_page');
function osppfw_submenu_page() {
   add_menu_page( 'Woocommerce Order Status', 'Woocommerce Order Status', 'manage_options', 'wc-custom-order-status', 'osppfw_order_status_callback');
}

/*Woocommerce Order Status Settings Here*/
function osppfw_order_status_callback() {
    ?>    
        <div class="wrap">
            <h2><?php echo esc_html( __( 'Woocommerce Order Status Settings', 'order-status-per-product-for-woocommerce' ) ); ?></h2>
        </div>
            <form method="post" >
              <?php wp_nonce_field( 'osppfw_nonce_action', 'osppfw_nonce_field' ); ?>
                <div id="poststuff">
                    <div class="postbox">
                        <div class="postbox-header">
                            <h2><?php echo esc_html( __( 'Enable/Disable', 'order-status-per-product-for-woocommerce' ) ); ?></h2>
                        </div>
                        <div class="inside">
                        <table>
                            <tr>
                                <td>
                                    <?php echo esc_html( __( 'Enable?', 'order-status-per-product-for-woocommerce' ) ); ?>
                                </td>
                                <td>
                                    <input type="checkbox" name="osppfw_enable" value="yes" <?php if(get_option('osppfw_status_enable') == 'yes') { echo 'checked'; } ?>>
                                </td>
                            </tr>
                        </table>  
                        </div> 
                    </div>

                    <div class="postbox">
                        <div class="postbox-header">
                            <h2><?php echo esc_html( __( 'Date Format', 'order-status-per-product-for-woocommerce' ) ); ?></h2>
                        </div>
                        <div class="inside">
                            <table>
                                <tr>
                                    <td>
                                        <input type="text" name="osppfw_date_format" value="<?php if(get_option('osppfw_date_format') != '') {echo esc_attr(get_option('osppfw_date_format')); } else { echo 'd-F-Y'; } ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="oc_date_format_help">
                                            <span class="description"><span class="ocfmhglgt"><?php echo esc_html( __( 'd', 'order-status-per-product-for-woocommerce' ) ); ?></span><?php echo esc_html( __( ' - The day of the month (from 01 to 31)', 'order-status-per-product-for-woocommerce' ) ); ?> </span>
                                            <span class="description"><span class="ocfmhglgt"><?php echo esc_html( __( 'D', 'order-status-per-product-for-woocommerce' ) ); ?></span><?php echo esc_html( __( ' - A textual representation of a day (three letters)', 'order-status-per-product-for-woocommerce' ) ); ?></span>
                                            <span class="description"><span class="ocfmhglgt"><?php echo esc_html( __( 'j', 'order-status-per-product-for-woocommerce' ) ); ?></span><?php echo esc_html( __( ' - The day of the month without leading zeros (1 to 31)', 'order-status-per-product-for-woocommerce' ) ); ?></span>
                                            <span class="description"><span class="ocfmhglgt"><?php echo esc_html( __( 'l', 'order-status-per-product-for-woocommerce' ) ); ?></span><?php echo esc_html( __( '- (lowercase "L") - A full textual representation of a day', 'order-status-per-product-for-woocommerce' ) ); ?></span>
                                            <span class="description"><span class="ocfmhglgt"><?php echo esc_html( __( 'm', 'order-status-per-product-for-woocommerce' ) ); ?></span><?php echo esc_html( __( ' - A numeric representation of a month (from 01 to 12)', 'order-status-per-product-for-woocommerce' ) ); ?></span>
                                            <span class="description"><span class="ocfmhglgt"><?php echo esc_html( __( 'F', 'order-status-per-product-for-woocommerce' ) ); ?></span><?php echo esc_html( __( ' - A full textual representation of a month (January through December)', 'order-status-per-product-for-woocommerce' ) ); ?></span>
                                            <span class="description"><span class="ocfmhglgt"><?php echo esc_html( __( 'M', 'order-status-per-product-for-woocommerce' ) ); ?></span><?php echo esc_html( __( ' - A short textual representation of a month (three letters)', 'order-status-per-product-for-woocommerce' ) ); ?></span>
                                            <span class="description"><span class="ocfmhglgt"><?php echo esc_html( __( 'n', 'order-status-per-product-for-woocommerce' ) ); ?></span><?php echo esc_html( __( ' - A numeric representation of a month, without leading zeros (1 to 12)', 'order-status-per-product-for-woocommerce' ) ); ?></span>
                                            <span class="description"><span class="ocfmhglgt"><?php echo esc_html( __( 'Y', 'order-status-per-product-for-woocommerce' ) ); ?></span><?php echo esc_html( __( ' - A four digit representation of a year', 'order-status-per-product-for-woocommerce' ) ); ?></span>
                                            <span class="description"><span class="ocfmhglgt"><?php echo esc_html( __( 'y', 'order-status-per-product-for-woocommerce' ) ); ?></span><?php echo esc_html( __( ' - A two digit representation of a year', 'order-status-per-product-for-woocommerce' ) ); ?></span>
                                        </div>
                                    </td>
                                </tr>
                            </table>  
                        </div>
                    </div>
                    <div class="postbox">
                        <div class="postbox-header">
                            <h2><?php echo esc_html( __( 'Status Display Format', 'order-status-per-product-for-woocommerce' ) ); ?></h2>
                        </div>
                        <div class="inside">
                            <table>
                                <tr>
                                    <td>
                                        <textarea name="osppfw_stdis_format" rows="4" cols="35"><?php if(get_option('osppfw_stdis_format') != '') {echo esc_attr(get_option('osppfw_stdis_format')); } else {  echo esc_html('Status: {status}'); } ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="oc_date_format_help">
                                        <span class="description"><span class="ocfmhglgt"><?php echo esc_html( '{status}', 'order-status-per-product-for-woocommerce' ); ?></span><?php echo esc_html( '- to display status date', 'order-status-per-product-for-woocommerce' ); ?></span>
                                        <span class="description"><span class="ocfmhglgt"><?php echo esc_html('{date}', 'order-status-per-product-for-woocommerce' ); ?></span><?php echo esc_html( ' - to display status update date', 'order-status-per-product-for-woocommerce' ); ?></span>
                                        <span class="description"><span class="ocfmhglgt"><?php echo esc_html( '{note}', 'order-status-per-product-for-woocommerce' ); ?></span><?php echo esc_html( '- to display status note', 'order-status-per-product-for-woocommerce' ); ?> </span>
                                    </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="postbox">
                        <div class="postbox-header">
                            <h2><?php echo esc_html( __( 'Statuses', 'order-status-per-product-for-woocommerce' ) ); ?></h2>
                        </div>
                        <div class="inside">
                            <table class="osppfw_status_table ">
                                <thead>
                                    <tr>
                                        <th><?php echo esc_html( __( 'Status', 'order-status-per-product-for-woocommerce' ) ); ?></th>
                                        <th><?php echo esc_html( __( 'Status Color', 'order-status-per-product-for-woocommerce' ) ); ?></th>
                                        <th><?php echo esc_html( __( 'Status Note', 'order-status-per-product-for-woocommerce' ) ); ?></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                <?php
                                if(!empty(get_option( 'osppfw_statuses' ))) {
                                    $statuses_array = get_option( 'osppfw_statuses' );
                                    
                                    foreach ($statuses_array as $key => $status) {
                                        ?>

                                        <tr>
                                            <td>
                                                <input type="text" name="osppfw_statuses_name[]" value="<?php echo esc_attr($status['status_name']); ?>">
                                            </td>
                                            <td>
                                                <input type="text" class="color-picker" data-alpha="true" name="osppfw_statuses_color[]" value="<?php echo esc_attr($status['status_color']); ?>"/>
                                            </td>
                                            <td>
                                                <textarea name="osppfw_statuses_note[]" rows="2"><?php echo esc_attr($status['status_note']); ?></textarea>
                                            </td>
                                            <td>
                                                <p class="osppfw_remove_status button"><?php echo esc_html( __( 'Remove Status', 'order-status-per-product-for-woocommerce' ) ); ?></p>
                                            </td>
                                        </tr>

                                        <?php
                                        }  

                                } else {
                                    
                                ?>
                                    <tr>
                                        <td>
                                            <input type="text" name="osppfw_statuses_name[]" >
                                        </td>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" name="osppfw_statuses_color[]" />
                                        </td>
                                        <td>
                                            <textarea name="osppfw_statuses_note[]" rows="2"></textarea>
                                        </td>
                                        <td>
                                            <p class="osppfw_remove_status button"><?php echo esc_html( __( 'Remove Status', 'order-status-per-product-for-woocommerce' ) ); ?></p>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <a class="osppfw_add_status button"><?php echo esc_html( __( 'Add Status', 'order-status-per-product-for-woocommerce' ) ); ?></a>
                        </div>
                    </div>
                </div> 
                <input type="hidden" name="action" value="osppfw_save_option">
                <input type="submit" value="Save changes" name="submit" class="button-primary" id="wfc-btn-space">
                <?php
                if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'osppfw_save_option') {
                   ?>
                    <div class="notice notice-success is-dismissible">
                        <p>
                            <strong><?php echo esc_html("Your Setting Saved Successfully...!","order-status-per-product-for-woocommerce");?>
                            </strong>
                        </p>
                    </div>
                    <?php
                }
                ?>
            </form>  
    <?php
}

/*Page Option Save Here*/
add_action( 'init', 'osppfw_save_options');
function osppfw_save_options(){
    if( current_user_can('administrator') ) { 
        if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'osppfw_save_option'){
            if(!isset( $_POST['osppfw_nonce_field'] ) || !wp_verify_nonce( $_POST['osppfw_nonce_field'], 'osppfw_nonce_action' )) 
            {
                echo 'Sorry, your nonce did not verify.';
                exit;
            }else {

                if(!empty($_POST['osppfw_statuses_name'])) {
                    $status_name = osppfw_recursive_sanitize_text_field($_POST['osppfw_statuses_name']);
                    $status_color = osppfw_recursive_sanitize_text_field($_POST['osppfw_statuses_color']);
                    $status_note = osppfw_recursive_sanitize_text_field($_POST['osppfw_statuses_note']);
                    $statuses = array();

                    if(!empty($status_name)) {
                        foreach ($status_name as $key => $name) {
                            if(!empty($name)) {
                                $status['status_name'] = $name;
                                $status['status_color'] = $status_color[$key];
                                $status['status_note'] = $status_note[$key];
                                
                                $statuses[] = $status;
                            }
                        }  
                    }

                    update_option('osppfw_statuses', $statuses, 'yes');
                } else {
					$statuses = array();
					update_option('osppfw_statuses', $statuses, 'yes');                  	
                }

                

                if(isset($_POST['osppfw_enable'])) {
                    if($_POST['osppfw_enable'] == 'yes') {
                        update_option('osppfw_status_enable', 'yes', 'yes');
                    } else {
                        update_option('osppfw_status_enable', 'no', 'yes');
                    }
                } else {
                    update_option('osppfw_status_enable', 'no', 'yes');
                }

                
                if(isset($_POST['osppfw_date_format'])) {
                    $osppfw_date_format = sanitize_text_field($_POST['osppfw_date_format']);
                    update_option('osppfw_date_format', $osppfw_date_format, 'yes');
                }


                if(isset($_POST['osppfw_stdis_format'])) {
                    $osppfw_stdis_format = sanitize_textarea_field($_POST['osppfw_stdis_format']);
                    update_option('osppfw_stdis_format', $osppfw_stdis_format, 'yes');
                }
            }
        }
    }
}

/*Sanitized array*/
function osppfw_recursive_sanitize_text_field($array) {

    foreach ( $array as $key => $value ) {
        if ( is_array( $value ) ) {
            $value = osppfw_recursive_sanitize_text_field($value);
        }else{
            $value = sanitize_text_field( $value );
        }
    }
    return $array;
}

/* Add New Status */
add_action( 'admin_footer', 'osppfw_footer_script');
function osppfw_footer_script() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery(".osppfw_add_status").click(function(){
                jQuery(".osppfw_status_table tbody").append('<tr><td><input type="text" name="osppfw_statuses_name[]" ></td><td><input type="text" class="color-picker" data-alpha="true" name="osppfw_statuses_color[]" value="" /></td><td><textarea name="osppfw_statuses_note[]" rows="2"></textarea></td><td><p class="osppfw_remove_status button">Remove Status</p></td></tr>');
                jQuery('.color-picker').wpColorPicker();
            });
        });
    </script>
    <?php
}

/* Select Order Status */
add_action( 'woocommerce_after_order_itemmeta', 'osppfw_set_status_per_product', 3, 20 );
function osppfw_set_status_per_product( $item_id, $item, $product ) {

    $osppfw_status_enable = get_option('osppfw_status_enable');
    
    if($osppfw_status_enable == 'yes') {

        if(!empty(get_option( 'osppfw_statuses' ))) {
            $statuses_array = get_option( 'osppfw_statuses' );
            if(isset($statuses_array) && !empty($statuses_array)) {
                if ( ! empty( $product ) && isset( $product ) ) {
                    $post_type = $product->post_type;
                    if ( ! empty( $post_type ) && ( $post_type === 'product' || $post_type === 'product_variation' ) ) {
                        $item_status = get_post_meta( $item_id, 'item_status', true );
                        ?>
                        <div class="wc-order-item-sku">
                            <strong><?php echo esc_html( __( 'Item Status:', 'order-status-per-product-for-woocommerce' ) ); ?></strong>
                            <select id="item_status_<?php echo esc_attr($item_id); ?>" name="item_status_<?php echo esc_attr($item_id); ?>">
                                <option value="">Select</option>
                                <?php
                                foreach ($statuses_array as $key => $value) {
                                ?>
                                <option value="<?php echo esc_attr($value['status_name']); ?>" <?php if($value['status_name'] == $item_status) { echo 'selected'; } ?>><?php echo esc_attr($value['status_name']); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <?php
                    }
                }
            }
        }

    }

}

/* Save Order Status */
add_action('woocommerce_update_order', 'osppfw_custom_update_order');
function osppfw_custom_update_order($order_id){

 $osppfw_status_enable = get_option('osppfw_status_enable');

  if ( $osppfw_status_enable === 'yes' ) {

    $action = isset( $_POST['action'] ) ? sanitize_text_field( $_POST['action'] ) : '';
     
    if(!empty($_REQUEST['order_item_id'])){
            $order_item_ids = array_map('intval',$_REQUEST['order_item_id']);
            $oc_action    = $action;
            $order_item_id = $order_item_ids;

            if (isset( $order_item_ids ) && ! empty( $order_item_ids ) ) {
                $order_item_ids = $order_item_ids;
            } else {
                $order_item_ids = array();
            }
              print_r($order_item_ids);
          
            if ( $oc_action === 'edit_order'  ) {
                   
                foreach ($order_item_ids as $item_id) {
                    // Get the new status data
                    $item_status_data = isset($_POST['item_status_' . $item_id]) ? sanitize_text_field($_POST['item_status_' . $item_id]) : '';
            
                    if ($item_status_data !== '') {
                        // Update the custom status in post meta
                        $item_status = get_post_meta($item_id, 'item_status', true);
                        if ($item_status !== $item_status_data) {
                            update_post_meta($item_id, 'item_status', $item_status_data);
                            update_post_meta($item_id, 'item_status_date', current_time('timestamp', 0));
                        }
                    }
                }
            }
        }
    }
  
}