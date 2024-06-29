<?php

namespace Wicked_Block_Conditions\Condition;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

use Wicked_Block_Conditions\Condition\Condition;
use Wicked_Block_Conditions\Token\Token_Collection;

/**
 * Checks if the current user belongs to any of the specified role(s).
 *
 * @since 1.0.0
 */
class User_Has_Role extends Condition {

    public $type = 'user_has_role';

	/**
	 * Array of role slugs to check for.
	 *
     * @var array
     */
    public $roles = array();

	public function __construct() {
		parent::__construct();

		$this->json_map += array(
			'type' 	=> 'user_has_role',
			'roles' => 'roles',
		);
	}

    protected function do_evaluate( Token_Collection $args ) {
		$result = false;
		$user 	= wp_get_current_user();

		foreach ( $this->roles as $role ) {
			if ( in_array( $role, ( array ) $user->roles ) ) {
				$result = true;
			}
		}

		return $result;
    }

}
