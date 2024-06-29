=== GamiPress - Vimeo integration ===
Contributors: gamipress, tsunoa, rubengc, eneribs
Tags: vimeo, video, gamipress, gamification, points, achievements, badges, awards, rewards, credits, engagement, play, watch, player
Requires at least: 4.4
Tested up to: 6.2
Stable tag: 1.0.9
License: GNU AGPLv3
License URI:  http://www.gnu.org/licenses/agpl-3.0.html

Connect GamiPress with Vimeo

== Description ==

GamiPress - Vimeo integration let's you add activity triggers based on Vimeo video interaction adding new activity events on [GamiPress](https://wordpress.org/plugins/gamipress/ "GamiPress")!

= Watch a demo =

https://youtu.be/pijaOYc9nLo

= New Events =

* Watch any video: When an user watches any vimeo video.
* Watch a specific video: When an user watches a specific vimeo video.

Important: The unique Vimeo videos that trigger this activities are the videos placed through GamiPress: Vimeo block, [gamipress_vimeo] shortcode and GamiPress: Vimeo widget.

== Installation ==

= From WordPress backend =

1. Navigate to Plugins -> Add new.
2. Click the button "Upload Plugin" next to "Add plugins" title.
3. Upload the downloaded zip file and activate it.

= Direct upload =

1. Upload the downloaded zip file into your `wp-content/plugins/` folder.
2. Unzip the uploaded zip file.
3. Navigate to Plugins menu on your WordPress admin area.
4. Activate this plugin.

== Frequently Asked Questions ==

== Screenshots ==

== Frequently Asked Questions ==

= Which attributes support [gamipress_vimeo] shortcode? =

[gamipress_vimeo] shortcode supports:

* url: The Vimeo video URL or ID.
* width: The player width (in pixels). By default, 640.
* height: The player height (in pixels). By default, 360.
* from_url: Force load video from URL. Set it to yes if video is private or if you can not get it loaded correctly. Accepts yes or no. By default, no.

Example with video URL:
``[gamipress_vimeo url="https://vimeo.com/170993302" width="640" height="360"]``
Example with video ID:
``[gamipress_vimeo url="170993302" width="640" height="360"]``

Important: For private links (URLs like https://vimeo.com/{video_id}/{public_token}) you need to provide the full URL on "url" attribute and set "from_url" to "yes".
Example:
``[gamipress_vimeo url="{full_private_link}" from_url="yes"]``

= Can this plugin work with Vimeo videos embedded in other way? =

No, is required that videos are placed through the provided block, shortcode or widget to let the plugin detect when an user interacts with them.

== Changelog ==

= 1.0.9 =

* **Improvements**
* Added escaping functions when rendering shortcodes to increase plugin security.

= 1.0.8 =

* **Improvements**
* Ensure to only display the preview on the blocks editor area.

= 1.0.7 =

* **Improvements**
* Ensure to only display the preview when its available.

= 1.0.6 =

* **Improvements**
* Added preview on the block editor area.

= 1.0.5 =

* **Bug Fixes**
* Fixed incorrect event count for watch a specific video event.

= 1.0.4 =

* **Bug Fixes**
* Fixed incorrect check when comparing specific video IDs.

= 1.0.3 =

* **Bug Fixes**
* Fixed an incorrect check that causes multiples video watches not trigger the watch a video event.
* **Developer Notes**
* Added a filter to modify the video allowed delay (by default of 1 second).

= 1.0.2 =

* **Improvements**
* Added the ability to correctly handle events when multiple videos get played at same time.
* Improved watched time detection when video gets paused.

= 1.0.1 =

* **New Features**
* Added the attribute "from_url" to the [gamipress_vimeo] shortcode.
* Added the field "Load video from URL" to GamiPress: Vimeo block and widget.
* Added support for private links.

= 1.0.0 =

* Initial release.
