<?php

namespace Wicked_Block_Conditions\Util;

// Disable direct load
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

/**
 * Various utility functions
 */
final class Util {

	/**
	 * Inserts an array into an existing array after the specified key while preserving
	 * the inserted array's keys.
	 *
	 * @param array $array
	 *  The array to insert into.
	 *
	 * @param string $key
	 *  The key to insert the new array after.
	 *
	 * @param array $array_to_insert
	 *  The array to be inserted.
	 *
	 */
	public static function array_insert_after_key( &$array, $key, $array_to_insert ) {
		// Created this function because the following approach does not preserve the inserted array's keys:
		// array_splice( $array, $index + 1, 0, $array_to_insert );
		$offset = array_search( $key, array_keys( $array ) );
		$offset++;
		$array = array_slice( $array, 0, $offset, true ) + $array_to_insert + array_slice( $array, $offset, NULL, true );
	}

	/**
	 * Inserts an array into an existing array before the specified key while preserving
	 * the inserted array's keys.
	 *
	 * @param array $array
	 *  The array to insert into.
	 *
	 * @param string $key
	 *  The key to insert the new array before.
	 *
	 * @param array $array_to_insert
	 *  The array to be inserted.
	 *
	 */
	public static function array_insert_before_key( &$array, $key, $array_to_insert ) {
		$offset = array_search( $key, array_keys( $array ) );
		$array 	= array_slice( $array, 0, $offset, true ) + $array_to_insert + array_slice( $array, $offset, NULL, true );
	}

	/**
	 * Returns the URL for the current request.
	 *
	 * @see https://stackoverflow.com/questions/6768793/get-the-full-url-in-php
	 */
	public static function get_url( $use_forwarded_host = false ) {
		$s 			= $_SERVER;
		$ssl      	= ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
		$sp       	= strtolower( $s['SERVER_PROTOCOL'] );
		$protocol 	= substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
		$port     	= $s['SERVER_PORT'];
		$port     	= ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
		$host     	= ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
		$host     	= isset( $host ) ? $host : $s['SERVER_NAME'] . $port;

		return $protocol . '://' . $host . $s['REQUEST_URI'];
	}

	/**
	 * Gets a date timezone object based on the timezone setting on the site's
	 * General Settings page.
	 *
	 * @return DateTimeZone
	 */
	public static function get_timezone() {
		$identifier = self::get_timezone_identifer();

		return new \DateTimeZone( $identifier );
	}

	/**
	 * Gets the timezone string set on the site's General Settings page.
	 *
	 * Thanks to this article on SkyVerge for handling UTC offsets:
	 * https://www.skyverge.com/blog/down-the-rabbit-hole-wordpress-and-timezones/
	 *
	 * @return string
	 *  A string that can be used to instantiate a DateTimeZone object.
	 */
	public static function get_timezone_identifer() {
		// If site timezone string exists, return it
		if ( $timezone = get_option( 'timezone_string' ) ) {
			return $timezone;
		}

		// Get UTC offset, if it isn't set then return UTC
		if ( 0 === ( $utc_offset = get_option( 'gmt_offset', 0 ) ) ) {
			return 'UTC';
		}

		// Round offsets like 7.5 down to 7
		// TODO: explore if this is the right approach
		$utc_offset = round( $utc_offset, 0, PHP_ROUND_HALF_DOWN );

		// Adjust UTC offset from hours to seconds
		$utc_offset *= 3600;

		// Attempt to guess the timezone string from the UTC offset
		if ( $timezone = timezone_name_from_abbr( '', $utc_offset, 0 ) ) {
			return $timezone;
		}

		// Last try, guess timezone string manually
		$is_dst = date( 'I' );

		foreach ( timezone_abbreviations_list() as $abbr ) {
			foreach ( $abbr as $city ) {
				if ( $city['dst'] == $is_dst && $city['offset'] == $utc_offset ) {
					return $city['timezone_id'];
				}
			}
		}

		// Fallback to UTC
		return 'UTC';
	}
}
