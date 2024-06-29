<?php

namespace Wicked_Block_Conditions\Token;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

use Wicked_Block_Conditions\Object_Collection;

/**
 * Holds a collection of tokens.
 */
class Token_Collection extends Object_Collection implements \JsonSerializable {

    /**
     * Add a token.
     *
     * @param Token
     *  The token to add.
     */
    public function add( $item ) {
        $this->add_if( $item, 'Wicked_Block_Conditions\Token\Token' );
    }

	/**
     * Gets a token from the collection by key.
     *
     * @param string $key
     *  The key to search for. A path like global:current_site:name can also be
     *  used.
     *
     * @return Token|boolen
     *  The token or false if the token wasn't found.
     */
    public function get_token( $key ) {
        // Split the key up in case a path was used
        $keys   = explode( ':', $key );
        $token  = false;
        $tokens = $this->items;

        // Loop through each key in the path
        foreach ( $keys as $key ) {
            // Search current collection for token
            foreach ( $tokens as $token ) {
                if ( $key == $token->key ) {
                    // Set tokens for the next loop
                    $tokens = $token->get_tokens();
                    // Exit this loop since we've found the token
                    break;
                } else {
					$token = false;
				}
            }
        }

        return $token;
    }

	/**
	 * Gets the value for a token within the collection.
	 *
	 * @param $key
	 *  The path to the token.
	 * @return mixed|false
	 *  The value of the token or false if the token doesn't exist.
	 */
	public function get_value( $key ) {
		$token = $this->get_token( $key );

		if ( $token ) return $token->get_value();

		return false;
	}
	/**
	 * Sets the value of the specified token.
	 *
	 * @param string $key
	 *  The key/path of the token to set the value for.
	 * @param mixed $value
	 *  The value to set.
	 * @return mixed|boolen
	 *  The token's value or false if the token wasn't found.
	 */
	public function set_value( $key, $value ) {
		$token = $this->get_token( $key );

		if ( $token ) $token->set_value( $value );

		return $token;
	}

	public function jsonSerialize() {
		return $this->items;
	}
}
