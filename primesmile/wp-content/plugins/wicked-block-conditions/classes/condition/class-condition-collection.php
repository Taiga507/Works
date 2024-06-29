<?php

namespace Wicked_Block_Conditions\Condition;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

use Wicked_Block_Conditions;
use Wicked_Block_Conditions\Object_Collection;

/**
 * Holds a collection of conditions.
 */
class Condition_Collection extends Object_Collection implements \JsonSerializable {

    /**
     * Add a condition.
     *
     * @param Condition
     *  The condition to add.
     */
    public function add( $item ) {
        $this->add_if( $item, 'Wicked_Block_Conditions\Condition\Condition' );
    }

    /**
     * Evaluate each condition in the collection.
     *
     * @param array $args
     *  The arguments used to evaluate the condition within the context of a rule.
     */
    public function evaluate( $args ) {
        // Assume the best
        $result = true;

        foreach ( $this->items as $condition ) {
            if ( 'and' == $condition->operator ) {
                $result = $result && $condition->evaluate( $args );
            } else {
                $result = $result || $condition->evaluate( $args );
            }
        }

        return $result;
    }

	/**
	 * Build the collection from a JSON string.
	 *
	 * @param string $json
	 *  The JSON string of the conditions.
	 * @return Condition_Collection
	 *  The current object instance.
	 */
	public function from_json( $json ) {
		$conditions = json_decode( $json );

		foreach ( $conditions as $item ) {
			$condition = Wicked_Block_Conditions::get_instance()->get_new_condition( $item->type );

			// Skip if condition wasn't found
			if ( ! $condition ) continue;

			$condition->from_json( json_encode( $item ) );

			$this->add( $condition );
		}

		return $this;
	}

	public function jsonSerialize() {
		$json = array();

		foreach ( $this->items as $condition ) {
			$json[] = $condition;
		}

		return $json;
	}
}
