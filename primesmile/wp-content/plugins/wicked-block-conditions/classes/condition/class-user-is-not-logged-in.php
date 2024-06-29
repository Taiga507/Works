<?php

namespace Wicked_Block_Conditions\Condition;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

use Wicked_Block_Conditions\Condition\Condition;
use Wicked_Block_Conditions\Token\Token_Collection;

/**
 * Checks if a user is *not* logged in.
 *
 * @since 1.0.0
 */
class User_Is_Not_Logged_In extends Condition {

    public $type = 'user_is_not_logged_in';

    protected function do_evaluate( Token_Collection $args ) {
		return ! is_user_logged_in();
    }

}
