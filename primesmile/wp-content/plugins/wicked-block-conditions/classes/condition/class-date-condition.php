<?php

namespace Wicked_Block_Conditions\Condition;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

use DateTime;
use DateTimeZone;
use DateInterval;
use Wicked_Block_Conditions\Condition\Condition;
use Wicked_Block_Conditions\Token\Token;
use Wicked_Block_Conditions\Token\Token_Collection;

/**
 * The date condition compares date values.
 */
class Date_Condition extends Condition {

    /**
     * @var string
     *  The type of comparison to perform.
	 *  'before': date one is before date two
	 *  'after': date one is after date two
	 *  'same day': date one and date two are on the same day
	 *  'within': date one and date two are within the same period of time
     */
    public $compare = 'before';

	/**
	 * The source of date one.
	 *
	 * @var string
	 */
	public $date_one_source = Token::SOURCE_CONFIG;

	/**
	 * The value, token path or PHP to obtain date one.
	 *
	 * @var string
	 */
	public $date_one;

	/**
	 * The source of date two.
	 *
	 * @var string
	 */
	public $date_two_source = Token::SOURCE_CONFIG;

	/**
	 * The value, token path or PHP to obtain date two.
	 *
	 * @var string
	 */
	public $date_two;

	/**
	 * The number of minutes when comparing two dates within a certain period of time.
	 *
	 * @var int
	 */
	public $interval_minutes = 0;

	/**
	 * The number of hours when comparing two dates within a certain period of time.
	 *
	 * @var int
	 */
	public $interval_hours = 0;

	/**
	 * The number of days when comparing two dates within a certain period of time.
	 *
	 * @var int
	 */
	public $interval_days = 0;

	/**
	 * The number of months when comparing two dates within a certain period of time.
	 *
	 * @var int
	 */
	public $interval_months = 0;

	/**
	 * The number of years when comparing two dates within a certain period of time.
	 *
	 * @var int
	 */
	public $interval_years = 0;

	public function __construct() {
		parent::__construct();

		$this->json_map += array(
			'type' 		=> 'date_condition',
			'compare' 	=> 'compare',
			'dateOne' 	=> array(
				'source' 	=> 'date_one_source',
				'value' 	=> 'date_one',
			),
			'dateTwo' 	=> array(
				'source' 	=> 'date_two_source',
				'value' 	=> 'date_two',
			),
			'interval' => array(
				'minutes' 	=> 'interval_minutes',
				'hours' 	=> 'interval_hours',
				'days' 		=> 'interval_days',
				'months' 	=> 'interval_months',
				'years' 	=> 'interval_years',
			)
		);
	}

    /**
     * @see Condition::do_evaluate()
     */
    protected function do_evaluate( Token_Collection $args ) {
		$result 	= false;
		$date_one 	= $this->parse_input( $this->date_one, $args, $this->date_one_source );
		$date_two 	= $this->parse_input( $this->date_two, $args, $this->date_two_source );

		if ( ! is_a( $date_one, 'DateTime' ) ) {
			$date_one = new DateTime( $date_one, new DateTimeZone( 'UTC' ) );
		}

		if ( ! is_a( $date_two, 'DateTime' ) ) {
			$date_two = new DateTime( $date_two, new DateTimeZone( 'UTC' ) );
		}

		if ( 'before' == $this->compare ) {
			$result = $date_one < $date_two;
		}

		if ( 'after' == $this->compare ) {
			$result = $date_one > $date_two;
		}

		if ( 'same day' == $this->compare ) {
			// Hmmm, should we use DateTime->diff instead?  Is there a better way?
			$result = $date_one->format( 'Y-m-d') == $date_two->format( 'Y-m-d');
		}

		if ( 'within' == $this->compare ) {
			$diff = $date_one->diff( $date_two );

			$interval = new DateInterval( 'P0Y' );
			$interval->y = $this->interval_years;
			$interval->m = $this->interval_months;
			$interval->d = $this->interval_days;
			$interval->h = $this->interval_hours;
			$interval->i = $this->interval_minutes;

			$result = $this->compare_intervals( $interval, $diff );
		}

		return $result;
    }

	/**
	 * Compares two date intervals and returns true if the first interval is
	 * greater than or equal to the second interval, false if otherwise.
	 *
	 * @param $first
	 *  The date interval to check if greater than or equal to the second interval.
	 * @param $second
	 *  The date interval to check if less than the first interval.
	 * @return boolean
	 *  See description.
	 */
	public function compare_intervals( DateInterval $first, DateInterval $second ) {
		if ( $first->y > $second->y ) {
			return true;
		}

		if ( $first->y < $second->y ) {
			return false;
		}

		if ( $first->m > $second->m ) {
			return true;
		}

		if ( $first->m < $second->m ) {
			return false;
		}

		if ( $first->d > $second->d ) {
			return true;
		}

		if ( $first->d < $second->d ) {
			return false;
		}

		if ( $first->h > $second->h ) {
			return true;
		}

		if ( $first->h < $second->h ) {
			return false;
		}

		if ( $first->i > $second->i ) {
			return true;
		}

		if ( $first->i < $second->i ) {
			return false;
		}

		if ( $first->s > $second->s ) {
			return true;
		}

		if ( $first->s < $second->s ) {
			return false;
		}

		return true;
	}
}
