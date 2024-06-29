<?php

namespace Wicked_Block_Conditions\Util;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

/**
 * Simple utility class that maps class properties to and from JSON.  Probably
 * re-inventing the wheel here but couldn't seem to find a simple solution for
 * this.
 */
class JSON_Mapper {

    public static function to_json( $map, $object ) {
		$o = self::build_json_object( $map, $object );
		return json_encode( $o );
    }

	public static function from_json( $map, $json, $object ) {
		$o = json_decode( $json );
		return self::parse_json( $map, $o, $object );
	}

	public static function build_json_object( $map, $object ) {
		$a = array();

		foreach ( $map as $json_property => $object_property ) {
			if ( is_array( $object_property ) ) {
				$a[ $json_property ] = ( object ) self::build_json( $object_property, $object );
			} elseif ( property_exists( $object, $object_property ) ) {
				$a[ $json_property ] = $object->{ $object_property };
			} else {
				$a[ $json_property ] = $object_property;
			}
		}

		return ( object ) $a;
	}

	private static function parse_json( $map, $json_object, &$object ) {
		foreach ( $map as $json_property => $object_property ) {
			if ( property_exists( $json_object, $json_property ) ) {
				if ( is_array( $object_property ) ) {
					self::parse_json( $object_property, $json_object->{ $json_property }, $object );
				} elseif ( property_exists( $object, $object_property ) ) {
					$object->{ $object_property } = $json_object->{ $json_property };
				}
			}
		}

		return $object;
	}
}
