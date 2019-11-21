<?php

namespace Preseto\SupportPilot;

class ThemeSupportItem extends AbstractSupportItem {

	public function topic_feed_url() {
		return sprintf( 'https://wordpress.org/support/theme/%s/feed/', $this->slug );
	}

}
