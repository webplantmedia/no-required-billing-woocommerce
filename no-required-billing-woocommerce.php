<?php
/*
Plugin Name: No Required Billing WooCommerce
Description: No Required Billing WooCommerce
Author: Chris Baldelomar
Author URI: http://webplantmedia.com/
Version: 1.0
License: GPLv2 or later
*/


function nrbw_woocommerce_checkout_fields( $checkout_fields ) {
	foreach ( $checkout_fields as $k => $form ) {
		if ( 'billing' == $k ) {
			foreach ( $form as $kk => $field ) {
				switch ( $kk ) {
					case 'billing_first_name' :
					case 'billing_last_name' :
					case 'billing_email' :
						// nothing
						break;
					default :
						unset( $checkout_fields[ $k ][ $kk ] );
				}
			}
		}
	}

	return $checkout_fields;
}
add_filter( 'woocommerce_checkout_fields', 'nrbw_woocommerce_checkout_fields' );
