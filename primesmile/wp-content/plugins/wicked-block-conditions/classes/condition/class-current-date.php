<?php

namespace Wicked_Block_Conditions\Condition;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

use DateTime;
use Wicked_Block_Conditions\Condition\Condition;
use Wicked_Block_Conditions\Condition\Date_Condition;
use Wicked_Block_Conditions\Token\Token_Collection;
use Wicked_Block_Conditions\Util\Util;

/**
 * Compares the current date/time to the specired date.
 *
 * @since 1.0.0
 */
class Current_Date extends Condition {

    public $type = 'current_date';

	/**
     * @var string
     *  The type of comparison to perform.
	 *  'before': date one is before date two
	 *  'after': date one is after date two
	 *  'same day': date one and date two are on the same day
     */
    public $compare = 'before';

	/**
	 * The date to compare to the current date.
	 *
     * @var string
     */
    public $date;

	public function __construct() {
		parent::__construct();

		$this->json_map += array(
			'type' 		=> 'current_date',
			'compare' 	=> 'compare',
			'date' 		=> 'date',
		);
	}

    protected function do_evaluate( Token_Collection $args ) {
		$condition = new Date_Condition();

		$condition->compare 	= $this->compare;
		$condition->date_one 	= new DateTime( 'now', Util::get_timezone() );
		$condition->date_two 	= new DateTime( $this->date, Util::get_timezone() );

		// Set seconds to zero
		$condition->date_one->setTime( $condition->date_one->format( 'h' ), $condition->date_one->format( 'i' ) );
		$condition->date_two->setTime( $condition->date_two->format( 'h' ), $condition->date_two->format( 'i' ) );

		return $condition->evaluate( $args );
    }

}
