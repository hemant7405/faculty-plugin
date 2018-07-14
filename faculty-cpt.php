<?php
/* 
* Plugin Name: Faculty CPT
* Description: This plugin is used to create the Custom post type for faculty also you can add the details of faculty through meta boxes.
* Author: Hemant Kothari
* Author URI: #
* Version: 0.0.1
*/

define( 'WPHK_PLUGIN', __FILE__ );

define( 'WPHK_PLUGIN_BASENAME', plugin_basename( WPHK_PLUGIN ) );

define( 'WPHK_PLUGIN_DIR', untrailingslashit( dirname( WPHK_PLUGIN ) ) );

define( 'WPHK_PLUGIN_URL', untrailingslashit( plugins_url( '', WPHK_PLUGIN ) ) );

require_once WPHK_PLUGIN_DIR . '/fileloader.php';