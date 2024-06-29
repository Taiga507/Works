<?php

namespace Wicked_Block_Conditions\Condition;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

use Wicked_Block_Conditions\Condition\Condition;
use Wicked_Block_Conditions\Token\Token_Collection;

/**
 * Checks if a user-defined function returns true.
 *
 * @since 1.0.0
 */
class User_Function extends Condition {

    public $type = 'user_function';

	/**
	 * The PHP function to call.
	 *
     * @var string
     */
    public $function;

	public function __construct() {
		parent::__construct();

		$this->json_map += array(
			'type' 		=> 'user_function',
			'function' 	=> 'function',
		);
	}

    protected function do_evaluate( Token_Collection $args ) {
		$result = false;

		if ( ! $this->function ) return true;

		if ( function_exists( $this->function ) ) {
			$result = true === call_user_func( $this->function );
		}

		return $result;
    }

}
