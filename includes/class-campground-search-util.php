<?php

/**
 * Static class of utility methods
 *
 * @link       https://winlum.com
 * @since      1.0.0
 *
 * @package    Campground_Search
 * @subpackage Campground_Search/includes
 */

/**
 * Static class of utility methods.
 *
 * @package    Campground_Search
 * @subpackage Campground_Search/includes
 * @author     WinLum Inc.
 */
final class Campground_Search_Util {

	/**
	 * Recursively converts associative array(s) into an object.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @param    mixed     $array          The item to convert to an object.
	 */
	public static function array_to_object( $array ) {
		return is_array( $array ) && self::array_type( $array ) !== 'index'
			? (object) array_map( array( __CLASS__, __METHOD__ ), $array)
			: $array;
	}

	/**
	 * Determines the array "type".
	 * @see https://stackoverflow.com/questions/173400/how-to-check-if-php-array-is-associative-or-sequential/3883417#3883417
	 *
	 * @param    array     $array          The array to check.
	 * @return   string    One of three strings: assoc, index, or sparse.
	 */
	public static function array_type( array $array ) {
		$last_key = -1;
		$type = 'index';
		
		foreach ( $array as $key => $val ) {
			if ( ! is_int( $key ) || $key < 0 ) {
				return 'assoc';
			}
			if ( $key !== $last_key + 1 ) {
				$type = 'sparse';
			}
			$last_key = $key;
		}
		
		return $type;
	}

	/**
	 * Converts a camel case string into dash case.
	 *
	 * @author-  WinLum Inc.
	 * @since    1.0.0
	 * @param    string    $string         The string to convert.
	 */
	public static function camel_to_dash_case( $string ) {
		return self::from_camel_case( $string, '-' );
	}

	/**
	 * Converts a camel case string into snake case.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @param    string    $string         The string to convert.
	 */
	public static function camel_to_snake_case( $string ) {
		return self::from_camel_case( $string, '_' );
	}

	/**
	 * Applies the provided callback to each of the array's keys.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @param    callable  $callback       The function to convert the key with.
	 * @param    array     $array          The array whose keys to process.
	 */
	public static function convert_array_key_case( callable $callback, array $array ) {
		return array_reduce(
			array_keys( $array ),
			function ( $carry, $item ) use ( $callback, $array ) {
				$key = call_user_func( $callback, $item );
				$carry[$key] = is_array( $array[$item] )
					? self::convert_array_key_case( $callback, $array[$item] )
					: $array[$item];

				return $carry;
			},
			array()
		);
	}

	/**
	 * Converts a dash case string into camel case.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @param    string    $string         The string to convert.
	 */
	public static function dash_to_camel_case( $string ) {
		return self::to_camel_case( $string, '-' );
	}

	/**
	 * Prepends the provided prefix and separator to the string.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @param    string    $string         The string to update.
	 * @param    string    $prefix         The string to prepend. Default is @see Campground_Search_Const::PREFIX.
	 * @param    string    $separator      The separator to use. Default is "_".
	 */
	public static function prefix_string( $string, $prefix = Campground_Search_Const::PREFIX, $separator = '_' ) {
		return $prefix . $separator . $string;
	}

	/**
	 * Convenience method to @see self::prefix_string.
	 * Prepends the prefix (@see Campground_Search_Const::PREFIX_CSS) and separator ("-") to the string.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @param    string    $string         The string to update.
	 */
	public static function prefix_css_string( $string ) {
		return self::prefix_string( $string, Campground_Search_Const::PREFIX_CSS, '-' );
	}

	/**
	 * Sanitizes the provided field (Can be recursive).
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @param    mixed     $field          The field to sanitize.
	 */
	public static function sanitizeField( $field ) {
		// check if associative array, and sanitize fields
		return is_array( $field )
			? array_map( array( __CLASS__, __METHOD__ ), $field )
			: sanitize_text_field( $field );
	}

	/**
	 * Converts a snake case string into camel case.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @param    string    $string         The string to convert.
	 */
	public static function snake_to_camel_case( $string ) {
		return self::to_camel_case( $string, '_' );
	}

	/**
	 * Converts a camel case string to a lower case delimited version.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @access   private
	 * @param    string    $string         The string to convert. Default is "".
	 * @param    string    $separator      The separator to use. Default is "_".
	 */
	private static function from_camel_case( $string = '', $separator = '_' ) {
		return strtolower(
			preg_replace(
				'/(?<=\d)(?=[A-Za-z])|(?<=[A-Za-z])(?=\d)|(?<=[a-z])(?=[A-Z])/',
				$separator,
				$string
			)
		);
	}

	/**
	 * Converts a delimited string to a camel case string.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @access   private
	 * @param    string    $string         The string to convert. Default is "".
	 * @param    string    $separator      The separator to use. Default is "_".
	 */
	private static function to_camel_case( $string = '', $separator = '_' ) {
		return lcfirst( self::to_pascal_case( $string, $separator ) );
	}

	/**
	 * Converts a delimited string to a pascal case string.
	 *
	 * @author   WinLum Inc.
	 * @since    1.0.0
	 * @access   private
	 * @param    string    $string         The string to convert. Default is "".
	 * @param    string    $separator      The separator to use. Default is "_".
	 */
	private static function to_pascal_case( $string = '', $separator = '_' ) {
		return str_replace( $separator, '', ucwords( $string, $separator ) );
	}

}
