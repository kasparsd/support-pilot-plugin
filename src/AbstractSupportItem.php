<?php

namespace Preseto\SupportPilot;

abstract class AbstractSupportItem {

	protected $slug;

	public function __construct( $slug ) {
		$this->slug = $slug;
	}

	public function slug() {
		return $this->slug;
	}

	abstract public function topic_feed_url();

}
