<?php

namespace Preseto\SupportPilot;

class PluginSupportItem extends AbstractSupportItem {

	public function topic_feed_url() {
		return sprintf( 'https://wordpress.org/support/plugin/%s/feed/', $this->slug );
	}

}
