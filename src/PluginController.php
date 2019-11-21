<?php

namespace Preseto\SupportPilot;

class PluginController {

	protected $file;

	public function __construct( $file ) {
		$this->file = $file;
	}

	protected function request_param( $key ) {
		return filter_input( INPUT_GET, $key, FILTER_SANITIZE_STRING );
	}

	public function init() {
		add_action( 'init', [ $this, 'add_feed' ] );
	}

	public function add_feed() {
		add_feed( 'wporgreplies', [ $this, 'feed' ] );
	}

	public function feed() {
		$controller = new FeedController();

		$theme_slug = sanitize_key( $this->request_param( 'theme' ) );
		$plugin_slug = sanitize_key( $this->request_param( 'plugin' ) );

		$feed = null;

		if ( ! empty( $plugin_slug ) ) {
			$feed = $controller->feed_for_plugin( $plugin_slug );
		} elseif( ! empty( $theme_slug ) ) {
			$feed = $controller->feed_for_theme( $theme_slug );
		}

		if ( empty( $feed ) ) {
			wp_die( 'Please specify the theme or plugin slug' );
		}

		header( 'Content-Type: application/xml; charset=utf-8' );
		echo $feed->render(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped, output escaped by library.
		die;
	}

}
