<?php

namespace Wicked_Block_Conditions\Condition;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

use Wicked_Block_Conditions\Token\Token_Collection;
use Wicked_Block_Conditions\Condition\Condition;
use Wicked_Block_Conditions\Condition\Condition_Collection;

/**
 * A group condition is a condition that consists of child conditions.
 */
class Group extends Condition {

	public $type = 'group';

    /**
     * @var Condition_Collection
     *  The conditions within the group.
     */
    protected $conditions;

    public function __construct() {
		parent::__construct();

        $this->conditions = new Condition_Collection();
    }

    /**
     * @see Conditon::do_evaluate()
     */
    protected function do_evaluate( Token_Collection $args ) {
        return $this->conditions->evaluate( $args );
    }

    /**
     * Sets the group's conditions.
     *
     * @return Condition
     *  The current condition instance.
     */
    public function set_conditions( Condition_Collection $conditions ) {
        $this->conditions = $conditions;

        return $this;
    }

     /**
      * Gets the group's conditions.
      *
      * @return Condition_Collection
      */
     public function get_conditions() {
         return $this->conditions;
     }

	 public function from_json( $json ) {
		 parent::from_json( $json );

		 $condition 	= json_decode( $json );
		 $conditions 	= $condition->conditions;

		 $this->conditions->from_json( json_encode( $conditions ) );

		 return $this;
	 }
}
