<?php
/* Front Side Order Status Here */
function osppfw_order_status_product_front( $item_id, $item, $order, $flag = false ) {
    
    $osppfw_status_enable = get_option('osppfw_status_enable');
    
    if ( $osppfw_status_enable === 'yes' ) {

        $item_status      = get_post_meta( $item_id, 'item_status', true );
        $item_status_date = get_post_meta( $item_id, 'item_status_date', true );

        $statuses_array = get_option( 'osppfw_statuses' );

        $status_color = '';
        $status_note = '';

        foreach ($statuses_array as $key => $value) {
            if(in_array($item_status, $value)) {
                $status_color = $value['status_color'];
                $status_note = $value['status_note'];
            }
        }

        $status_color_style = '';

        if($status_color != '') {
           $status_color_style = 'style="color: '.$status_color.';"';
        }

        if($item_status != '' && $item_status_date != '') {
            
            if(get_option('osppfw_date_format') != '') {
                $date_format = get_option('osppfw_date_format');
            } else {
                $date_format = get_option( 'date_format' ) . ' ' . get_option( 'time_format' );
            }
            
            $itm_status_dt = date( $date_format, $item_status_date);
            $item_status_display = wpautop(get_option('osppfw_stdis_format'));

            $itm_status_span = "<span ".wp_kses_post( $status_color_style ).">".esc_html( $item_status )."</span>";

            $item_status_display = str_replace('{status}', $itm_status_span, $item_status_display);
            $item_status_display = str_replace('{date}', $itm_status_dt, $item_status_display);
            $item_status_display = str_replace('{note}', $status_note, $item_status_display);

        ?>
            <span class="osppfw_status_span"><?php echo wp_kses_post($item_status_display); ?></span>
        <?php
        }
    }
}
add_action( 'woocommerce_order_item_meta_end', 'osppfw_order_status_product_front', 10, 4 );