<?php

namespace Wicked_Block_Conditions\Condition;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

use Wicked_Block_Conditions\Condition\Condition;
use Wicked_Block_Conditions\Token\Token_Collection;

/**
 * Checks if the current post has the specified terms.
 *
 * @since 1.0.0
 */
class Post_Has_Term extends Condition {

    public $type = 'post_has_term';

	/**
	 * The taxonomy slug to check.
	 *
     * @var string
     */
    public $taxonomy;

	/**
	 * Array of term slugs to check for.
	 *
     * @var array
     */
    public $terms;

	/**
	 * 'and' if the post should have all specified terms, 'or' if it can contain
	 * any of the specified terms.
	 *
	 * @var string
	 */
	public $term_operator = 'or';

	public function __construct() {
		parent::__construct();

		$this->json_map += array(
			'type' 			=> 'post_has_term',
			'taxonomy' 		=> 'taxonomy',
			'terms' 		=> 'terms',
			//'termOperator' 	=> 'term_operator',
		);
	}

    protected function do_evaluate( Token_Collection $args ) {
		global $post;

		// Do nothing if we don't have a taxonomy
		if ( ! $this->taxonomy ) return true;

		// Do nothing if we don't have any terms
		if ( empty( $this->terms ) ) return true;

		$result = 'and' == $this->term_operator ? true : false;

		foreach ( $this->terms as $term ) {
			if ( 'and' == $this->term_operator ) {
				$result = $result && has_term( $term, $this->taxonomy, $post );
			} else {
				$result = $result || has_term( $term, $this->taxonomy, $post );
			}
		}

		return $result;
    }

}
