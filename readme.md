# Support Pilot for WordPress.org

> A WordPress plugin to build RSS feeds of plugin and theme support topics and replies until WP.org meta ticket [#4867](https://meta.trac.wordpress.org/ticket/4867) is merged.

[![Build Status](https://travis-ci.com/kasparsd/support-pilot.svg?branch=master)](https://travis-ci.com/kasparsd/support-pilot)

## Overview

It is currently impossible to get notified of new WordPress.org support forum replies without subscribing to each individual topic via email. See [this Meta Track ticket](https://meta.trac.wordpress.org/ticket/4867) for details.

So I created the [Support Pilot plugin](https://github.com/kasparsd/support-pilot-plugin) for WordPress that generates RSS feeds for support topics _and_ replies for any plugin or theme on WordPress.org.

It works by parsing and combining the RSS feed of the 30 latest support support topics and the RSS feeds for replies to each of those topics.

![RSS feeds for WP.org replies](https://kaspars.net/wp-content/uploads/2020/07/wordpress-support-forum-topic-replies-rss-feeds.png "A list of support topics and replies for WordPress.org plugins and themes in an RSS reader.")

## Installation

The plugin must be added as [a Composer dependency](https://packagist.org/packages/kasparsd/support-pilot-plugin) to your site:

```
composer require kasparsd/support-pilot-plugin
```

or run `composer install` inside the plugin directory to install the necessary PHP dependencies.

## Usage

The plugin registers a new public feed endpoint `wporgreplies` which supports `plugin` and `theme` request parameters which must match the plugin or theme slug on WP.org:

```
https://example.com/feed/wporgreplies?plugin=PLUGINSLUG
```

where `PLUGINSLUG` is the plugin slug on WP.org.

These feeds can be used to generate [Slack notifications](https://slack.com/intl/en-lv/help/articles/218688467-Add-RSS-feeds-to-Slack) or any other automation that supports RSS feeds.

## Credits

Created by [Kaspars Dambis](https://kaspars.net).
