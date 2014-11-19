<?php

// Start of json v.1.3.1

/**
 * Objects implementing JsonSerializable
 * can customize their JSON representation when encoded with
 * <b>json_encode</b>.
 * @link http://php.net/manual/zh/class.jsonserializable.php
 */
interface JsonSerializable  {

	/**
	 * (PHP 5 &gt;= 5.4.0)<br/>
	 * Specify data which should be serialized to JSON
	 * @link http://php.net/manual/zh/jsonserializable.jsonserialize.php
	 * @return mixed data which can be serialized by <b>json_encode</b>,
	 * which is a value of any type other than a resource.
	 */
	abstract public function jsonSerialize ();

}

class JsonIncrementalParser  {
	const JSON_PARSER_SUCCESS = 0;
	const JSON_PARSER_CONTINUE = 1;


	/**
	 * @param $depth [optional]
	 * @param $options [optional]
	 */
	public function __construct ($depth, $options) {}

	public function getError () {}

	public function reset () {}

	/**
	 * @param $json
	 */
	public function parse ($json) {}

	/**
	 * @param $filename
	 */
	public function parseFile ($filename) {}

	/**
	 * @param $options [optional]
	 */
	public function get ($options) {}

}

/**
 * (PHP 5 &gt;= 5.2.0, PECL json &gt;= 1.2.0)<br/>
 * 对变量进行JSON编码
 * @link http://php.net/manual/zh/function.json-encode.php
 * @param mixed $value <p>
 * 待编码的value，除了resource类型之外，可以为任何数据类型
 * </p>
 * <p>
 * 该函数只能接受UTF-8编码的数据
 * </p>
 * <p>PHP implements a superset of
 * JSON - it will also encode and decode scalar types and <b>NULL</b>. The JSON standard
 * only supports these values when they are nested inside an array or an object.
 * </p>
 * @param int $options [optional] 由以下常量组成的二进制掩码：JSON_HEX_QUOT, JSON_HEX_TAG, JSON_HEX_AMP, JSON_HEX_APOS, JSON_NUMERIC_CHECK, JSON_PRETTY_PRINT, JSON_UNESCAPED_SLASHES, JSON_FORCE_OBJECT, JSON_UNESCAPED_UNICODE
 * </p>
 * @param int $depth [optional] <p>
 * Set the maximum depth. Must be greater than zero.
 * </p>
 * @return string 编码成功则返回一个以JSON形式表示的string或者在失败时返回FALSE
 */
function json_encode ($value, $options = 0, $depth = 512) {}

/**
 * (PHP 5 &gt;= 5.2.0, PECL json &gt;= 1.2.0)<br/>
 * 对JSON格式的字符串进行解码
 * @link http://php.net/manual/zh/function.json-decode.php
 * @param string $json <p>
 * 待解码的json格式的字符串
 * </p>
 * <p>
 * 本函数只接受UTF-8编码的字符串
 * </p>
 * <p>PHP implements a superset of
 * JSON - it will also encode and decode scalar types and <b>NULL</b>. The JSON standard
 * only supports these values when they are nested inside an array or an object.
 * </p>
 * @param bool $assoc [optional] <p>
 * 当该参数为TRUE时，将返回array而非object
 * </p>
 * @param int $depth [optional] <p>
 * User specified recursion depth.
 * </p>
 * @param int $options [optional] <p>
 * Bitmask of JSON decode options. Currently only
 * <b>JSON_BIGINT_AS_STRING</b>
 * is supported (default is to cast large integers as floats)
 * </p>
 * @return mixed the value encoded in <i>json</i> in appropriate
 * PHP type. Values true, false and
 * null (case-insensitive) are returned as <b>TRUE</b>, <b>FALSE</b>
 * and <b>NULL</b> respectively. <b>NULL</b> is returned if the
 * <i>json</i> cannot be decoded or if the encoded
 * data is deeper than the recursion limit.
 */
function json_decode ($json, $assoc = false, $depth = 512, $options = 0) {}

/**
 * (PHP 5 &gt;= 5.3.0)<br/>
 * 返回最后发生的错误
 * @link http://php.net/manual/zh/function.json-last-error.php
 * @return int 返回一个整型
 */
function json_last_error () {}

/**
 * (PHP 5 &gt;= 5.5.0)<br/>
 * Returns the error string of the last json_encode() or json_decode() call
 * @link http://php.net/manual/zh/function.json-last-error-msg.php
 * @return string the error message on success or <b>NULL</b> with wrong parameters.
 */
function json_last_error_msg () {}


/**
 * All &lt; and &gt; are converted to \u003C and \u003E.
 * Available since PHP 5.3.0.
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_HEX_TAG', 1);

/**
 * All &#38;#38;s are converted to \u0026.
 * Available since PHP 5.3.0.
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_HEX_AMP', 2);

/**
 * All ' are converted to \u0027.
 * Available since PHP 5.3.0.
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_HEX_APOS', 4);

/**
 * All " are converted to \u0022.
 * Available since PHP 5.3.0.
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_HEX_QUOT', 8);

/**
 * Outputs an object rather than an array when a non-associative array is
 * used. Especially useful when the recipient of the output is expecting
 * an object and the array is empty.
 * Available since PHP 5.3.0.
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_FORCE_OBJECT', 16);

/**
 * Encodes numeric strings as numbers.
 * Available since PHP 5.3.3.
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_NUMERIC_CHECK', 32);

/**
 * Don't escape /.
 * Available since PHP 5.4.0.
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_UNESCAPED_SLASHES', 64);

/**
 * Use whitespace in returned data to format it.
 * Available since PHP 5.4.0.
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_PRETTY_PRINT', 128);

/**
 * Encode multibyte Unicode characters literally (default is to escape as \uXXXX).
 * Available since PHP 5.4.0.
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_UNESCAPED_UNICODE', 256);
define ('JSON_PARTIAL_OUTPUT_ON_ERROR', 512);

/**
 * Occurs with underflow or with the modes mismatch.
 * Available since PHP 5.3.0.
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_ERROR_STATE_MISMATCH', 2);

/**
 * Control character error, possibly incorrectly encoded.
 * Available since PHP 5.3.0.
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_ERROR_CTRL_CHAR', 3);

/**
 * Malformed UTF-8 characters, possibly incorrectly encoded. This
 * constant is available as of PHP 5.3.3.
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_ERROR_UTF8', 5);

/**
 * <p>
 * The object or array passed to <b>json_encode</b> include
 * recursive references and cannot be encoded.
 * If the <b>JSON_PARTIAL_OUTPUT_ON_ERROR</b> option was
 * given, <b>NULL</b> will be encoded in the place of the recursive reference.
 * </p>
 * <p>
 * This constant is available as of PHP 5.5.0.
 * </p>
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_ERROR_RECURSION', 6);

/**
 * <p>
 * The value passed to <b>json_encode</b> includes either
 * <b>NAN</b>
 * or <b>INF</b>.
 * If the <b>JSON_PARTIAL_OUTPUT_ON_ERROR</b> option was
 * given, 0 will be encoded in the place of these
 * special numbers.
 * </p>
 * <p>
 * This constant is available as of PHP 5.5.0.
 * </p>
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_ERROR_INF_OR_NAN', 7);

/**
 * <p>
 * A value of an unsupported type was given to
 * <b>json_encode</b>, such as a resource.
 * If the <b>JSON_PARTIAL_OUTPUT_ON_ERROR</b> option was
 * given, <b>NULL</b> will be encoded in the place of the unsupported value.
 * </p>
 * <p>
 * This constant is available as of PHP 5.5.0.
 * </p>
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_ERROR_UNSUPPORTED_TYPE', 8);

/**
 * No error has occurred.
 * Available since PHP 5.3.0.
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_ERROR_NONE', 0);

/**
 * The maximum stack depth has been exceeded.
 * Available since PHP 5.3.0.
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_ERROR_DEPTH', 1);

/**
 * Syntax error.
 * Available since PHP 5.3.0.
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_ERROR_SYNTAX', 4);
define ('JSON_OBJECT_AS_ARRAY', 1);
define ('JSON_PARSER_NOTSTRICT', 4);

/**
 * Encodes large integers as their original string value.
 * Available since PHP 5.4.0.
 * @link http://php.net/manual/zh/json.constants.php
 */
define ('JSON_BIGINT_AS_STRING', 2);

// End of json v.1.3.1
?>
