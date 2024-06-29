<?php

namespace Wicked_Block_Conditions\Condition;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

use Wicked_Block_Conditions\Condition\Condition;
use Wicked_Block_Conditions\Token\Token_Collection;

/**
 * Checks a query string for specified value.
 *
 * @since 1.1.0
 */
class Query_String extends Condition {

    public $type = 'query_string';

	/**
	 * The query string parameter to check.
	 *
     * @var string
     */
    public $parameter;

	/**
	 * The query string value to check for.
	 *
     * @var string
     */
    public $value;

	public function __construct() {
		parent::__construct();

		$this->json_map += array(
			'type' 			=> 'query_string',
			'parameter' 	=> 'parameter',
			'value' 		=> 'value',
		);
	}

    protected function do_evaluate( Token_Collection $args ) {
		// Do nothing if we don't have a parameter
		if ( ! $this->parameter ) return true;

		// Fail the condition if the parameter isn't present
		if ( ! isset( $_GET[ $this->parameter ] ) ) return false;

		// Fail the condition if the value doesn't match
		if ( $_GET[ $this->parameter ] != $this->value ) return false;

		// ...otherwise, we're good
		return true;
    }

}
