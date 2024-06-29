<?php

namespace Wicked_Block_Conditions\Condition;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

use Wicked_Block_Conditions\Condition\Condition;
use Wicked_Block_Conditions\Token\Token_Collection;

/**
 * Checks if the current post's ID matches the specified ID.
 *
 * @since 1.0.0
 */
class Post_ID extends Condition {

    public $type = 'post_id';

	/**
	 * The ID to check the post against.
	 *
     * @var string
     */
    public $post_id;

	public function __construct() {
		parent::__construct();

		$this->json_map += array(
			'type' 		=> 'post_id',
			'postId' 	=> 'post_id',
		);
	}

    protected function do_evaluate( Token_Collection $args ) {
		global $post;

		return ( int ) $this->post_id == get_the_ID();
    }

}
