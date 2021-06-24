<?php
/*
* Plugin Name: WooCommerce Composite Products AddOn
* Plugin URI: https://github.com/minhpham2015/composite-products-addon.git
* Description: Create personalized product kits and configurable products.
* Version: 1.0.0
* Author: Tom Pham
* Woo: 216836:0343e0115bbcb97ccd98442b8326a0af
* Text Domain: woocommerce-composite-products-addon
* Domain Path: /languages/
*
* Requires PHP: 5.6
*
* Requires at least: 4.4
* Tested up to: 5.5
*
* WC requires at least: 3.1
* WC tested up to: 4.4
*
* Copyright: © 2017-2020 SomewhereWarm SMPC.
* License: GNU General Public License v3.0
* License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define('PLG_URL',plugin_dir_url(__FILE__));
define('PLG_DIR',plugin_dir_path(__FILE__));
define('PLG_VERSION','1.0.0');

//Functions
require_once( 'includes/functions.php' );

//Hooks
require_once( 'includes/hooks.php' );

//Front End
require_once( 'includes/front-end.php' );
