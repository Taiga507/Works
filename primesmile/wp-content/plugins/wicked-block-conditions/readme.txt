=== Wicked Block Conditions ===
Contributors: wickedplugins
Tags: blocks, block editor, conditions, conditional logic, gutenberg, administration, conditional blocks
Requires at least: 5.0
Tested up to: 6.1
Stable tag: 1.2.0
Requires PHP: 5.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Show or hide blocks based on conditions.

== Description ==

Wicked Block Conditions is a powerful tool for creating conditional blocks.  A conditional block is a block that can be shown (or hidden) if the conditions you define are met.  For example, you can create blocks that are only shown to logged-in users (great for membership sites).

Define simple conditions or combine conditions into groups using and/or operators for more complex scenarios.

= Show or hide blocks based on: =
* User login status
* User role
* Date and time
* Post categories or tags
* Post status
* The value of a query string parameter
* The result of a custom PHP function

= Features: =
* Show or hide any block using conditions
* Specify an unlimited number of conditions
* Combine conditions with “and” or “or” operators
* Group conditions to create complex display rules
* Works with any Gutenberg block including third-party blocks

= Support =
Please see the [FAQ section](https://wordpress.org/plugins/wicked-block-conditions/#faq) below for common questions. [Visit the support forum](https://wordpress.org/support/plugin/wicked-block-conditions) if you have a question or need help.

= About Wicked Plugins =
Wicked Plugins specializes in crafting high-quality, reliable plugins that extend WordPress in powerful ways while being simple and intuitive to use.  We’re full-time developers who know WordPress inside and out and our customer happiness engineers offer friendly support for all our products. [Visit our website](https://wickedplugins.com/?utm_source=readme&utm_campaign=wicked_block_conditions&utm_content=about_link) to learn more about us.

== Installation ==

1. Upload 'wicked-block-conditions' to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen by searching for 'Wicked Block Conditions'.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Edit a post or page using the block editor and select a block.  You should see a 'Display Conditions' panel.

== Frequently Asked Questions ==
= I installed the plugin, now what? =
Edit a post or page and select the block that you’d like to show or hide based on conditions.  In the right sidebar of the editor, you should see a panel labeled 'Display Conditions'.  Click the panel to expand it and click the “Add Condition” link to add your first condition.

= How do I edit a condition? =
Click the cog icon to the right of the condition's label.

= How do I delete a condition? =
Click the cog icon to the right of the condition's label to edit the condition and then click the 'Delete' button.

= How do I show a block when the current date is between two dates? =
This can be accomplished by using two 'Check The Date' conditions.  Click 'Add Condition' and choose the 'Check The Date' condition.  Choose the 'After' option and select the date that you'd like to start showing the block (i.e. the start date).  Save the condition and add another 'Check The Date' condition but this time choose the 'Before' option and select the date that you'd like to stop showing the block (i.e. the end date).

= I set up a block to display after a certain date but it's not working. What's wrong? =
Be sure that the correct timezone is selected on the Settings > General page in WordPress and that the date and time you specified for your condition is for that timezone.

= What does the 'Negate condition' option do? =
Every condition returns true or false based on whether or not the condition was met.  Negating a condition reverses the outcome so that a condition that would normally return true will return false and, a condition that would normally return false returns true instead.

= Will my block conditions get deleted if I deactivate or uninstall the plugin? =
Yes and no.  The conditions are not deleted and will still be there if you re-activate the plugin later; however, if you edit a page with conditional blocks while the plugin is deactivated, any conditions that were previously assigned to blocks will be erased.

== Screenshots ==

1. The block with the dark background will only be displayed if the user is logged in
2. Use and/or operators and group conditions for more complex conditional blocks
3. Various conditions can be used to show or hide blocks
4. Every condition can be assigned a custom label.  You can also negate conditions.  Each condition has its own configuration settings.

== Changelog ==

= 1.2.0 (February 6, 2023) =
* New: check post ID condition
* New: check post slug condition

= 1.1.3 (December 21, 2022) =
* Remove references to deprecated WordPres JavaScript functions
* Add plugin text domain to translation functions in JavaScript
* Update tested-up-to version

= 1.1.2 (May 16, 2022) =
* Fix user-defined function name disappearing
* Fix server-side rendered blocks not working
* Fix server-side rendered blocks not previewing in editor when display conditions aren't met
* Test with WordPress 6.0 and update tested-up-to version

= 1.1.1 (May 17, 2021) =
* Fix conditions not applying to inner blocks
* Fix first condition being added to all blocks of same type

= 1.1.0 =
* Add support for query string parameters
* Fix operator dropdowns overlapping condition labels

= 1.0.2 =
* Update 'Tested up to' flag to 5.4

= 1.0.1 =
* Fix text domain
* Fix plugin name in readme

= 1.0.0 =
* Initial release
