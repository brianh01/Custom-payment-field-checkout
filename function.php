/**
 * Update the order meta with field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['cheque_custom_field'] ) ) {
        update_post_meta( $order_id, 'CHEQUE Custom Field', sanitize_text_field( $_POST['cheque_custom_field'] ) );
    }
}

/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('CHEQUE Custom Field').':</strong> ' . get_post_meta( $order->id, 'CHEQUE Custom Field', true ) . '</p>';
}
