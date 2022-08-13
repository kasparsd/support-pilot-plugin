<?php
/**
 * Plugin Name:       Support Pilot for WordPress.org
 * Plugin URI: https://github.com/kasparsd/support-pilot-plugin
 * Description: RSS feeds for WordPress plugin and theme support forum replies
 * Author: Kaspars Dambis
 * Author URI: https://kaspars.net
 * Version: 0.1.0
 * License: GPLv2 or later
 */

use Preseto\SupportPilot\PluginController;

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

$controller = new PluginController( __FILE__ );

add_action( 'plugins_loaded', [ $controller, 'init' ] );
