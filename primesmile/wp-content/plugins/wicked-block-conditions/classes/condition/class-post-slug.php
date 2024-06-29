<?php

namespace Wicked_Block_Conditions\Condition;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

use Wicked_Block_Conditions\Condition\Condition;
use Wicked_Block_Conditions\Token\Token_Collection;

/**
 * Checks if the current post's slug matches the specified slug.
 *
 * @since 1.0.0
 */
class Post_Slug extends Condition {

    public $type = 'post_slug';

	/**
	 * The slug to check the post against.
	 *
     * @var string
     */
    public $slug;

	public function __construct() {
		parent::__construct();

		$this->json_map += array(
			'type' 		=> 'post_slug',
			'slug' 	    => 'slug',
		);
	}

    protected function do_evaluate( Token_Collection $args ) {
		global $post;

		return $this->slug == $post->post_name;
    }

}
