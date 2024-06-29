<?php

namespace Wicked_Block_Conditions\REST_API\v1;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

class REST_API {

    private $version = 1;

    private $base = 'wicked-block-conditions/v1';

    /**
	 * Holds an instance of the class.
	 *
     * @var REST_API
     */
    private static $instance;

    private function __construct() {
        $this->register_routes();
    }

    /**
	 * Returns the singleton instance of the class.
     *
     * @return REST_API
	 */
    public static function get_instance() {
		if ( empty( self::$instance ) ) {
			self::$instance = new REST_API();
		}

		return self::$instance;
	}

	public function register_routes() {
        register_rest_route( $this->base, '/user-roles', array(
            'methods' => \WP_REST_Server::READABLE,
            'callback' => array( $this, 'get_user_roles' ),
            'permission_callback' => function () {
                return true;//current_user_can( 'edit_posts' );
            },
        ) );
	}

    public function get_user_roles( \WP_REST_Request $request ) {
        global $wp_roles;

        $roles      = array();
        $user_roles = $wp_roles->roles;

        foreach ( $user_roles as $key => $role ) {
            $roles[] = array(
                'value' => $key,
                'label' => $role['name'],
            );
        }

        return $roles;
	}

}
