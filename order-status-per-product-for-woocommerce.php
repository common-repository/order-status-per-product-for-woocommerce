<?php
/**
* Plugin Name: Order Status Per Product For Woocommerce
* Description: This plugin allows create Order Status Per Product For Woocommerce plugin.
* Version: 1.1
* Copyright: 2023
* Text Domain: order-status-per-product-for-woocommerce
* Domain Path: /languages 
*/


if (!defined('ABSPATH')) {
    die('-1');
}

/* define  plugin file name   */
define('OSPPFW_PLUGIN_FILE', __FILE__);

/* define  plugin diretorypath  name   */    
define('OSPPFW_PLUGIN_DIR',plugins_url('', __FILE__));

/* define  plugin base  name   */  
define('OSPPFW_BASE_NAME', plugin_basename(OSPPFW_PLUGIN_FILE));

//include file 
include_once('main/resources/osppfw-installation-require.php');
include_once('main/backend/osppfw-backend.php');
include_once('main/fronted/osppfw-front.php');
include_once('main/resources/osppfw-language.php');
include_once('main/resources/osppfw-load-js-css.php');
