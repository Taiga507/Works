<?php

namespace Wicked_Block_Conditions\Condition;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

use Wicked_Block_Conditions\Condition\Condition;
use Wicked_Block_Conditions\Token\Token_Collection;

/**
 * Checks if the current post's status matches the specified status.
 *
 * @since 1.0.0
 */
class Post_Status extends Condition {

    public $type = 'post_status';

	/**
	 * The visibility status to check the post against.
	 *
     * @var string
     */
    public $status;

	public function __construct() {
		parent::__construct();

		$this->json_map += array(
			'type' 		=> 'post_status',
			'status' 	=> 'status',
		);
	}

    protected function do_evaluate( Token_Collection $args ) {
		global $post;

		if ( 'password' == $this->status && ! empty( $post->post_password ) ) return true;

		return $this->status === get_post_status();
    }

}
