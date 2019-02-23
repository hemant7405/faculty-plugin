<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Fileloader' ) ) {
	
	class Fileloader {

		public function __construct() {
			$this->load();
		}
		
		public function load() {
			require_once WPHK_PLUGIN_DIR . '/modules/class-faculty-cpt.php';
			require_once WPHK_PLUGIN_DIR . '/modules/class-faculty-cw.php';
			require_once WPHK_PLUGIN_DIR . '/modules/class-faculty-mb.php';
			require_once WPHK_PLUGIN_DIR . '/modules/class-faculty-sc.php';
			//require_once WPHK_PLUGIN_DIR . '/admin/admin.php';
		}
	}
	
	$fl = new fileloader();
}
