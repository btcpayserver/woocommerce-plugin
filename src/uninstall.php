<?php
/**
 * BitPay for WooCommerce Uninstall
 *
 * @author 		bitpay
 */
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) )
    exit();

global $wpdb;

// Delete options
$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE 'woocommerce_bitpay%';");
