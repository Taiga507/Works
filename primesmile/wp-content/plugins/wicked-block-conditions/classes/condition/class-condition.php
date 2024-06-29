<?php

namespace Wicked_Block_Conditions\Condition;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

use Wicked_Block_Conditions\Util\JSON_Mapper;
use Wicked_Block_Conditions\Token\Token;
use Wicked_Block_Conditions\Token\Token_Collection;

/**
 * A condition is an expression that evaluates to true or false. Conditions that
 * contain other conditions are group conditions.
 */
abstract class Condition implements \JsonSerializable {

	/**
	 * Whether or not the condition has been evaluated.
	 *
	 * @var boolean
	 */
	private $evaluated = false;

	/**
	 * The result of the condition after it has been evaluated.
	 *
	 * @var boolean
	 */
	private $result = true;

	/**
	 * Map of JSON object properties to class properties.
	 *
	 * @var string
	 */
	protected $json_map = array();

    /**
	 * A user-defined label that describes a condition within the context of a
	 * rule.
	 *
     * @var string
     */
    public $label;

    /**
	 * The condition's operator relative to the previous condition. Either 'and'
     * or 'or';
	 *
     * @var string
     */
    public $operator = 'and';

	/**
	 * The type of condition (e.g. 'group', 'truth', 'string', etc.) for the
	 * purpose of re-building the condition from JSON.
	 *
	 * @var string
	 */
	public $type = 'condition';

	/**
	 * Whether or not to negate the condition.
	 *
	 * @var boolean
	 */
	public $negate = false;

	/**
	 * The order of the condition relative to other conditions within a group.
	 *
	 * @var integer
	 */
	public $order = 0;

	public function __construct() {
		$this->json_map = array(
			'type' 		=> 'type',
			'operator' 	=> 'operator',
			'label' 	=> 'label',
			'negate' 	=> 'negate',
		);
	}

    /**
     * Evaluates the condition within the context of an event.
     *
	 * @param Token_Collection $args
	 *  Arguments from within the context of an event.
     * @return boolean
     *  True if the condition is met, false if not.
     */
    public final function evaluate( Token_Collection $args ) {
		$result = $this->do_evaluate( $args );

		if ( $this->negate ) $result = ! $result;

		$this->result = $result;

		$this->evaluated = true;

        return $result;
    }

	/**
	 * Returns the condition's internal result property.
	 *
	 * @return boolean
	 */
	public function get_result() {
		return $this->result;
	}

	/**
	 * Returns whether or not the condition has been evaluated.
	 *
	 * @return boolean
	 */
	public function get_evaluated() {
		return $this->evaluated;
	}

	/**
	 * Concrete classes should override this to evaluate itself and return the
	 * the boolean result.
	 *
	 * @return boolean
	 *  The evaluated result of the condition.
	 */
	protected function do_evaluate( Token_Collection $args ) {
		return true;
	}

	/**
	 * @see Token::parse_input
	 */
	public function parse_input( $input, Token_Collection $args, $source = TOKEN::SOURCE_CONFIG ) {
		return Token::parse_input( $input, $args, $source );
	}

	public function jsonSerialize() {
		return JSON_Mapper::build_json_object( $this->json_map, $this );
	}

	/**
	 * Imports the condition from JSON.
	 *
	 * @param string $json
	 *  The JSON representing the condition.
	 */
	public function from_json( $json ) {
		return JSON_Mapper::from_json( $this->json_map, $json, $this );
	}
}
