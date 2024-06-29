<?php

namespace Wicked_Block_Conditions\Token;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

use Wicked_Block_Conditions\Token\Token_Collection;

/**
 * A token is a piece of data (e.g. a string, an object, an array, etc.) that is
 * used by conditions to evaluate themselves.
 */
class Token implements \JsonSerializable {

	const SOURCE_PHP 	= 'php';
	const SOURCE_TOKEN 	= 'token';
	const SOURCE_CONFIG = 'config';

    const TYPE_BOOLEAN 	= 'boolean';
    const TYPE_STRING 	= 'string';
    const TYPE_OBJECT 	= 'object';
	const TYPE_INTEGER 	= 'integer';
	const TYPE_ARRAY 	= 'array';
    const TYPE_MIXED 	= 'mixed';

	/**
	 * The path to the token within the context of a token collection.
	 *
	 * @var string
	 */
	protected $path;

    /**
	 * The internal value of the token.
	 *
     * @var mixed
     */
    protected $value;

    /**
	 * The token's child tokens.
	 *
     * @var Token_Collection
     */
    protected $tokens;

    /**
	 * A descriptive name of the token.
	 *
     * @var string
     */
    public $name;

    /**
	 * The machine name of the token. Should only include letters and underscores.
	 *
     * @var string
     */
    public $key;

	/**
	 * The generic type of data that the token represents.  For example, integer,
	 * string, object, etc.
	 *
	 * @var string
	 */
	public $data_type = self::TYPE_STRING;

	/**
	 * The specific data type that is returned by the token.  For example,
	 * WP_Post, WP_User, etc.
	 *
	 * @var string
	 */
	public $return_type;

	/**
	 * Whether or not the token can be filtered.
	 *
	 * @var bool
	 */
	public $is_filterable = false;

    public function __construct() {
        $this->tokens = new Token_Collection();

		// Default return type to be same as data type
		if ( ! $this->return_type ) {
			$this->return_type = $this->data_type;
		}
    }

    /**
     * Adds a child token.
     *
     * @param Token
     */
    public function add_token( Token $token ) {
		$token->set_path( $this->path . ':' . $token->key );

        $this->tokens->add( $token );
    }

    /**
     * Returns the token's child tokens.
     *
     * @return Token_Collection
     */
    public function get_tokens() {
		$this->init_tokens();

        return $this->tokens;
    }

	/**
	 * Set the token's child tokens.
	 *
	 * @param Token_Collection $tokens
	 *  A collection of tokens to assign to the token's child tokens.
	 * @return Token_Collection
	 */
	public function set_tokens( Token_Collection $tokens ) {
		$this->tokens = $tokens;

		return $this->tokens;
	}

	/**
	 * Gets a child token.
	 *
	 * @param string $key
	 *  The token key or path to fetch.
	 * @return Wicked_Token|false
	 *  The token or false if the token wasn't found.
	 */
	public function get_token( $key ) {
		return $this->tokens->get_token( $key );
	}

    /**
     * Sets the value of the token within a context.
     *
     * @param mixed $value
     */
    public function set_value( $value = null ) {
        $this->value = $value;
    }

    /**
     * Returns the token's value.
     *
     * @return Token
     */
    public function get_value() {
        return $this->value;
    }

	/**
	 * Some token types can't initalize child tokens in the constructor as it
	 * would result in an infinite loop. This function is used to initalize
	 * child tokens and avoid infinate loops.
	 */
	public function init_tokens() {
		// Don't do anything if we've already initialized the tokens
		if ( count( $this->tokens ) > 0 ) return;

		$this->tokens = new Token_Collection();

		$this->do_init_tokens();
	}

	/**
	 * Child classes should use this function to initialize child tokens to
	 * ensure tokens don't get overwritten by subsequent calls to init_tokens().
	 */
	protected function do_init_tokens() {
	}

	/**
	 * Replaces token placeholders in a string with each token's value.
	 *
	 * @param string $s
	 *  A string containing one or more tokens. A token can be inserted into a
	 *  string using the format {{ token_key.child_token_key }}
	 * @param Token_Collection $tokens
	 *  The token values to replace the token placeholders with.
	 */
	public static function replace_tokens( $s, Token_Collection $tokens ) {
		$matches = array();

		// TODO: test this with multiple lines
		// Find tokens matching the pattern {{ token:token }} or {{token:token}}
		preg_match_all( '/\{\{\s?[A-Z0-9\.\-\_\:]*\s?\}\}/i', $s, $matches );

		if ( ! empty( $matches[0] ) ) {
			foreach ( $matches[0] as $match ) {
				$key = preg_replace( '/^\{\{\s?([A-Z0-9\.\-\_\:]*)\s?\}\}/i', '$1', $match );
				$token = $tokens->get_token( $key );

				// Leave the string alone if a matching token wasn't found
				if ( $token ) {
					$value = $token->get_value();

					// Replace objects and arrays with empty string
					if ( is_object( $value ) || is_array( $value ) ) $value = '';

					$replacement = preg_replace( '/^\{\{\s?([A-Z0-9\.\-\_\:]*)\s?\}\}/i', $value, $match );
					$s = str_replace( $match, $replacement, $s );
				}
			}
		}

		return $s;
	}

	/**
	 * Parses an input for tokens, a manual string or PHP.
	 *
	 * @param string $input
	 *  A string containing one or more tokens or PHP code to evaluate.
	 * @param Token_Collection $args
	 *  The arguments containing values for the tokens.
	 * @param string $source
	 *  The source of the input.
	 * @return mixed
	 *  The token value when the source is token, the string after replacing
	 *  tokens when the source is config, or the result of the evaluated PHP.
	 */
	public static function parse_input( $input, Token_Collection $args, $source = self::SOURCE_CONFIG ) {
		// Objects can't be parsed
		if ( is_object( $input ) ) return $input;

		// Array's can't be parsed either (at least not for now)
		if ( is_array( $input ) ) return $input;

		if ( 'config' == $source ) {
			return self::replace_tokens( $input, $args );
		}

		if ( 'token' == $source ) {
			// Change '{{ token }}' to 'token'
			$input = preg_replace( '/[\{\}\s]/', '', $input );

			return $args->get_value( $input );
		}

		if ( 'php' == $source ) {
			// TODO
			return false;//eval( $value );
		}

		return $input;
	}

	/**
	 * Gets the token's path.
	 *
	 * @return string
	 *  The token path in the format grandparent:parent:key.
	 */
	public function get_path() {
		return $this->path;
	}

	/**
	 * Sets the token's path.
	 *
	 * @param string $path
	 *  A path in the format grandparent:parent:key.
	 */
	public function set_path( $path ) {
		$this->path = $path;

		foreach ( $this->tokens as $token ) {
			$token->set_path( $path . ':' . $token->key );
		}
	}

	public function jsonSerialize() {
		return array(
			'name' 			=> $this->name,
			'key' 			=> $this->key,
			'description' 	=> $this->description,
			'path' 			=> $this->path,
			'dataType' 		=> $this->data_type,
			'returnType' 	=> $this->return_type,
			'tokens' 		=> $this->tokens,
		);
	}
}
