<?php
/*

Plugin Name: Wicked Block Conditions
Plugin URI: https://wickedplugins.com/wicked-block-conditions/
Description: Show or hide blocks based on conditions.
Version: 1.2.0
Author: Wicked Plugins
Author URI: https://wickedplugins.com/
Text Domain: wicked-block-conditions
License: GPLv2 or later

Copyright 2018 Driven Development, LLC dba Wicked Plugins
(email : hello@wickedplugins.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

if ( class_exists( 'Wicked_Block_Conditions' ) ) return;

require_once( dirname( __FILE__ ) . '/classes/class-wicked-block-conditions.php' );

register_activation_hook( __FILE__, array( 'Wicked_Block_Conditions', 'activate' ) );

Wicked_Block_Conditions::get_instance();
