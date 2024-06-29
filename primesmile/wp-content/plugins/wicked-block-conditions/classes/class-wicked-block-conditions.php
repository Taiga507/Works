<?php

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

use Wicked_Block_Conditions\Condition\Condition_Collection;
use Wicked_Block_Conditions\Token\Token_Collection;

/**
 * Main plugin class.
 */
final class Wicked_Block_Conditions {

    /**
	 * Holds an instance of the class.
	 *
     * @var Wicked_Block_Conditions
     */
    private static $instance;

	/**
	 * Internal registry of conditions.
	 *
	 * @var Array
	 */
	private $conditions = array();

    private function __construct() {
		// Register autoload function
        spl_autoload_register( array( $this, 'autoload' ) );

		// Note: -10 is used for enqueue_block_editor_assets because default
		// priority wasn't earlier enough to hook into registerBlockType in JS
		// for Stackable blocks plugin

        add_action( 'init', 						array( $this, 'init' ) );
		add_action( 'enqueue_block_editor_assets', 	array( $this, 'enqueue_block_editor_assets' ), -10 );
		add_action( 'rest_api_init', 				array( $this, 'rest_api_init' ) );

		add_filter( 'pre_render_block', 			array( $this, 'pre_render_block' ), 10, 2 );
		add_filter( 'render_block', 				array( $this, 'render_block' ), 10, 2 );
		add_filter( 'register_block_type_args', 	array( $this, 'register_block_type_args' ), 10, 2 );
    }

	/**
	 * Called immediately after the singleton instance is constructed to prevent
	 * infinite loops caused by calling get_instance() before the singleton has
	 * finished constructing.
	 */
	private function ready() {
		$this->register_conditions();
	}

    /**
	 * Plugin activation hook.
	 */
	public static function activate() {
		// Check for multisite
		if ( is_multisite() && is_plugin_active_for_network( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'wicked-block-conditions.php' ) ) {
			$sites = get_sites( array( 'fields' => 'ids' ) );

			foreach ( $sites as $id ) {
				switch_to_blog( $id );

				Wicked_Block_Conditions::activate_site();

				restore_current_blog();
			}
		} else {
			Wicked_Block_Conditions::activate_site();
		}
    }

	/**
	 * Activates/initalizes settings for a single site.
	 */
	public static function activate_site() {

    }

    /**
     * Class autoloader.
     */
    public function autoload( $class ) {
        $path = strtolower( $class );
        $path = str_replace( '_', '-', $path );

        // Convert to an array
        $path = explode( '\\', $path );

        // Nothing to do if we don't have anything
        if ( empty( $path[0] ) ) return;

        // Only worry about our namespace
        if ( 'wicked-block-conditions' != $path[0] ) return;

        // Remove the root namespace
        unset( $path[0] );

        // Get the class name
        $class = array_pop( $path );

        // Glue it back together
        $path = join( DIRECTORY_SEPARATOR, $path );
        $path = dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . 'class-' . $class . '.php';

        include_once( $path );
	}

    /**
	 * Returns the singleton instance of the plugin.
     *
     * @return Wicked_Block_Conditions
	 */
    public static function get_instance() {
		if ( empty( self::$instance ) ) {
			self::$instance = new Wicked_Block_Conditions();
			self::$instance->ready();
		}

		return self::$instance;
	}

    public function init() {

    }

	public function rest_api_init() {
		$api = Wicked_Block_Conditions\REST_API\v1\REST_API::get_instance();
	}

	/**
	 * enqueue_block_editor_assets hook.
	 */
	public function enqueue_block_editor_assets() {
		$script = plugin_dir_url( dirname( __FILE__ ) ) . 'dist/index.js';

		if ( defined( 'WICKED_BLOCK_CONDITIONS_DEV' ) && WICKED_BLOCK_CONDITIONS_DEV ) {
			$script = WICKED_BLOCK_CONDITIONS_DEV_SERVER . '/assets/index.js';
		}

		// $data = array(
		// 	'data' => array(
		// 		'conditions' => array(),
		// 	),
		// );

		wp_enqueue_script( 'wicked-block-conditions', $script, array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-data', 'wp-components', 'wp-i18n' ), Wicked_Block_Conditions::plugin_version() );
		//wp_localize_script( 'wicked-block-conditions', 'wickedBlockConditions', $data );

		wp_enqueue_style( 'wicked-block-conditions', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/css/admin.css', array(), Wicked_Block_Conditions::plugin_version() );

		wp_set_script_translations( 'wicked-block-conditions', 'wicked-block-conditions' );
	}

	/**
	 * Returns the plugin's version.
	 *
	 * @return string
	 *  The plugin's current version.
	 */
	public static function plugin_version() {
		static $version = false;

		if ( ! $version && function_exists( 'get_plugin_data' ) ) {
			$plugin_data 	= get_plugin_data( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'wicked-block-conditions.php' );
			$version 		= $plugin_data['Version'];
		}

		return $version;
	}

	/**
	 * 'render_block' filter.
	 */
	public function render_block( $block_content, $block ) {
		// 'pre_render_block' is not called for inner blocks but 'render_block'
		// is. Therefore, check the pre-render condition here and empty the
		// block's contents if it shouldn't be displayed
		$result = $this->pre_render_block( $block_content, $block );

		if ( false === $result ) {
			$block_content = '';
		}

		return $block_content;
	}

	/**
	 * 'pre_render_block' filter.
	 *
	 * Note: 'pre_render_block' wasn't introduced until WordPress 5.1
	 * Note: It appears this filter is only called for top-level blocks and not
	 * inner blocks.
	 */
	public function pre_render_block( $pre_render, $block ) {
	    // Don't execute this in the admin
	    if ( is_admin() ) return $pre_render;

		// Don't do anything if we don't have any conditions
		if ( empty( $block['attrs']['wickedBlockConditions']['conditions'] ) ) return $pre_render;

		// Don't apply conditions when editing a post (this allows server-side
		// rendered blocks like Gravity Forms to be previewed even if there are
		// conditions in place that would hide the block)
		if ( isset( $_GET['context'] ) && 'edit' == $_GET['context'] && ! empty( $_GET['post_id'] ) ) return $pre_render;

		// Get block action and conditions
		$action 			= $block['attrs']['wickedBlockConditions']['action'];
		$conditions_data 	= $block['attrs']['wickedBlockConditions']['conditions'];

		$tokens 	= new Token_Collection();
		$conditions = new Condition_Collection();
		$conditions->from_json( json_encode( $conditions_data ) );

		$result = $conditions->evaluate( $tokens );

		if ( true == $result && 'hide' == $action ) $pre_render = false;

		if ( false == $result && 'show' == $action ) $pre_render = false;

		return $pre_render;
	}

	/**
	 * Registers built-in conditions and gives others a chance to register their
	 * conditions.
	 */
	private function register_conditions() {
		$this->register_condition( array(
			'type' 		=> 'condition',
			'callback' 	=> '\Wicked_Block_Conditions\Condition\Condition',
		) );

		$this->register_condition( array(
			'type' 		=> 'group',
			'callback' 	=> '\Wicked_Block_Conditions\Condition\Group',
		) );

		$this->register_condition( array(
			'type' 		=> 'user_is_logged_in',
			'callback' 	=> '\Wicked_Block_Conditions\Condition\User_Is_Logged_In',
		) );

		$this->register_condition( array(
			'type' 		=> 'user_is_not_logged_in',
			'callback' 	=> '\Wicked_Block_Conditions\Condition\User_Is_Not_Logged_In',
		) );

		$this->register_condition( array(
			'type' 		=> 'user_has_role',
			'callback' 	=> '\Wicked_Block_Conditions\Condition\User_Has_Role',
		) );

		$this->register_condition( array(
			'type' 		=> 'post_has_term',
			'callback' 	=> '\Wicked_Block_Conditions\Condition\Post_Has_Term',
		) );

		$this->register_condition( array(
			'type' 		=> 'post_status',
			'callback' 	=> '\Wicked_Block_Conditions\Condition\Post_Status',
		) );

		$this->register_condition( array(
			'type' 		=> 'current_date',
			'callback' 	=> '\Wicked_Block_Conditions\Condition\Current_Date',
		) );

		$this->register_condition( array(
			'type' 		=> 'user_function',
			'callback' 	=> '\Wicked_Block_Conditions\Condition\User_Function',
		) );

		$this->register_condition( array(
			'type' 		=> 'query_string',
			'callback' 	=> '\Wicked_Block_Conditions\Condition\Query_String',
		) );

		$this->register_condition( array(
			'type' 		=> 'post_id',
			'callback' 	=> '\Wicked_Block_Conditions\Condition\Post_ID',
		) );

		$this->register_condition( array(
			'type' 		=> 'post_slug',
			'callback' 	=> '\Wicked_Block_Conditions\Condition\Post_Slug',
		) );

		// Give others a chance to register their conditions
		do_action( 'wicked_block_conditions_register_conditions' );

		// Gives others a chance to filter the conditions
		$this->conditions = apply_filters( 'wicked_block_conditions', $this->conditions );
	}

	/**
	 * Registers a condition type.
	 *
	 * @param array $condition
	 *  An array with the following keys:
	 *
	 *  'type': A string that uniquely identifies the condition and that can be
	 *  used to instantiate new instances of the condition.  If a condition with
	 *  the same type already exists, it will be overwritten.
	 *
	 *  'callback': The fully-qualified class name to use when instantiating new
	 *  instances of the condition type.  In the future, this may support
	 *  functions as callbacks.
	 */
	public function register_condition( Array $condition ) {
		$this->conditions[ $condition['type'] ] = $condition;
	}

	/**
	 * Creates and returns a new instance of a condition based on the type.
	 *
	 * @param string $type
	 *  The type of condition object to create.
	 * @return Condition
	 *  An newly instantiated Condition object or false if the condition type
	 *  doesn't exist (i.e. isn't registered).
	 */
	public function get_new_condition( $type ) {
		if ( isset( $this->conditions[ $type ]['callback'] ) ) {
			$callback = $this->conditions[ $type ]['callback'];

			if ( class_exists( $callback ) ) return new $callback();
		}

		return false;
	}

	/**
	 * WordPress register_block_type_args filter.  Registers attribute for
	 * conditions.
	 */
	public function register_block_type_args( $args, $name ) {
		$args['attributes']['wickedBlockConditions'] = array(
			'type' => 'object'
		);

		return $args;
	}
}
