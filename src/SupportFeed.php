<?php

namespace Preseto\SupportPilot;

use \SimplePie;

class SupportFeed {

	protected $asset;

	protected static $feed;

	function __construct( $asset ) {
		$this->asset = $asset;
	}

	public function feed() {
		if ( ! isset( self::$feed ) ) {
			self::$feed = fetch_feed( $this->asset->topic_feed_url() );
		}

		return self::$feed;
	}

	public function title() {
		return $this->feed()->get_title();
	}

	public function items() {
		return $this->feed()->get_items();
	}

	public function topics_and_replies() {
		$replies = [];

		foreach ( $this->items() as $topic ) {
			$replies[] = fetch_feed( sprintf( '%sfeed/', $topic->get_link() ) );
		}

		return SimplePie::merge_items( $replies );
	}

}
