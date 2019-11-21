<?php

namespace Preseto\SupportPilot;

use Preseto\SupportPilot\SupportFeed;
use Preseto\SupportPilot\PluginSupportItem;
use Suin\RSSWriter\Feed;
use Suin\RSSWriter\Channel;
use Suin\RSSWriter\Item;

class FeedController {

	public function feed_for_plugin( $slug ) {
		return $this->feed_for_support_item( new PluginSupportItem( $slug ) );
	}

	public function feed_for_theme( $slug ) {
		return $this->feed_for_support_item( new ThemeSupportItem( $slug ) );
	}

	protected function feed_for_support_item( $support_item ) {
		$feed = new Feed();
		$channel = new Channel();

		$channel
			->title( $support_item->slug() )
			->appendTo( $feed );

		$support_feed = new SupportFeed( $support_item );

		foreach ( $support_feed->topics_and_replies() as $feed_item ) {
			$item = new Item();

			$item
				->title( $feed_item->get_title() )
				->description( $feed_item->get_description() )
				->url( $feed_item->get_permalink() )
				->pubDate( $feed_item->get_date( 'U' ) )
				->guid( $feed_item->get_id(), true )
				->appendTo( $channel );
		}

		return $feed;
	}

}
