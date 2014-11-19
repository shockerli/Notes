<?php

// Start of couchbase v.1.2.0

class Couchbase  {
	const SUCCESS = 0;
	const AUTH_CONTINUE = 1;
	const DELTA_BADVAL = 3;
	const E2BIG = 4;
	const EBUSY = 5;
	const EINTERNAL = 6;
	const EINVAL = 7;
	const ENOMEM = 8;
	const ERROR = 10;
	const ETMPFAIL = 11;
	const KEY_EEXISTS = 12;
	const KEY_ENOENT = 13;
	const NETWORK_ERROR = 16;
	const NOT_MY_VBUCKET = 17;
	const NOT_STORED = 18;
	const NOT_SUPPORTED = 19;
	const UNKNOWN_COMMAND = 20;
	const UNKNOWN_HOST = 21;
	const OPT_SERIALIZER = 1;
	const OPT_COMPRESSION = 2;
	const OPT_PREFIX_KEY = 3;
	const OPT_IGNOREFLAGS = 4;
	const SERIALIZER_PHP = 0;
	const SERIALIZER_JSON = 1;
	const SERIALIZER_JSON_ARRAY = 2;
	const SERIALIZER_IGBINARY = 3;
	const COMPRESSION_NONE = 0;
	const COMPRESSION_FASTLZ = 2;
	const COMPRESSION_ZLIB = 1;
	const GET_PRESERVE_ORDER = 1;
	const OPT_VOPTS_PASSTHROUGH = 5;
	const REPLICA_FIRST = 0;
	const REPLICA_ALL = 1;
	const REPLICA_SELECT = 2;

	private $_handle;


	/**
	 * @param $hosts
	 * @param $user [optional]
	 * @param $password [optional]
	 * @param $bucket [optional]
	 * @param $persistent [optional]
	 */
	public function __construct ($hosts, $user, $password, $bucket, $persistent) {}

	/**
	 * @param $id
	 * @param $document
	 * @param $expiry [optional]
	 * @param $persist_to [optional]
	 * @param $replicate_to [optional]
	 */
	public function add ($id, $document, $expiry, $persist_to, $replicate_to) {}

	/**
	 * @param $id
	 * @param $document
	 * @param $expiry [optional]
	 * @param $cas [optional]
	 * @param $persist_to [optional]
	 * @param $replicate_to [optional]
	 */
	public function set ($id, $document, $expiry, $cas, $persist_to, $replicate_to) {}

	/**
	 * @param $documents
	 * @param $expiry [optional]
	 * @param $persist_to [optional]
	 * @param $replicate_to [optional]
	 */
	public function setMulti (array $documents, $expiry, $persist_to, $replicate_to) {}

	/**
	 * @param $id
	 * @param $document
	 * @param $expiry [optional]
	 * @param $cas [optional]
	 * @param $persist_to [optional]
	 * @param $replicate_to [optional]
	 */
	public function replace ($id, $document, $expiry, $cas, $persist_to, $replicate_to) {}

	/**
	 * @param $id
	 * @param $document
	 * @param $expiry [optional]
	 * @param $cas [optional]
	 * @param $persist_to [optional]
	 * @param $replicate_to [optional]
	 */
	public function prepend ($id, $document, $expiry, $cas, $persist_to, $replicate_to) {}

	/**
	 * @param $id
	 * @param $document
	 * @param $expiry [optional]
	 * @param $cas [optional]
	 * @param $persist_to [optional]
	 * @param $replicate_to [optional]
	 */
	public function append ($id, $document, $expiry, $cas, $persist_to, $replicate_to) {}

	/**
	 * @param $cas
	 * @param $id
	 * @param $document
	 * @param $expiry [optional]
	 */
	public function cas ($cas, $id, $document, $expiry) {}

	/**
	 * @param $id
	 * @param $callback [optional]
	 * @param $cas [optional]
	 */
	public function get ($id, $callback, &$cas) {}

	/**
	 * @param $ids
	 * @param $cas [optional]
	 * @param $flags [optional]
	 */
	public function getMulti (array $idsarray , &$cas = null, $flags) {}

	/**
	 * @param $ids
	 * @param $strategy [optional]
	 */
	public function getReplica ($ids, $strategy) {}

	/**
	 * @param $ids
	 * @param $with_cas [optional]
	 * @param $callback [optional]
	 * @param $expiry [optional]
	 * @param $lock [optional]
	 */
	public function getDelayed (array $ids, $with_cas, $callback, $expiry, $lock) {}

	/**
	 * @param $ids
	 * @param $cas
	 * @param $expiry [optional]
	 */
	public function getAndLock ($ids, &$cas, $expiry) {}

	/**
	 * @param $ids
	 * @param $cas
	 * @param $flags [optional]
	 * @param $expiry [optional]
	 */
	public function getAndLockMulti (array $idsarray , &$cas = null, $flags, $expiry) {}

	/**
	 * @param $id
	 * @param $expiry
	 * @param $cas [optional]
	 */
	public function getAndTouch ($id, $expiry, &$cas) {}

	/**
	 * @param $ids
	 * @param $expiry
	 * @param $cas [optional]
	 */
	public function getAndTouchMulti (array $ids, $expiryarray , &$cas = null) {}

	/**
	 * @param $id
	 * @param $cas
	 */
	public function unlock ($id, $cas) {}

	/**
	 * @param $id
	 * @param $expiry
	 */
	public function touch ($id, $expiry) {}

	/**
	 * @param $ids
	 * @param $expiry
	 */
	public function touchMulti (array $ids, $expiry) {}

	public function fetch () {}

	public function fetchAll () {}

	/**
	 * @param $document
	 * @param $view [optional]
	 * @param $options [optional]
	 * @param $return_errors [optional]
	 */
	public function view ($document, $viewarray , $options, $return_errors) {}

	/**
	 * @param $doc_name
	 * @param $view_name [optional]
	 * @param $options [optional]
	 * @param $return_errors [optional]
	 */
	public function viewGenQuery ($doc_name, $view_namearray , $options, $return_errors) {}

	/**
	 * @param $id
	 * @param $cas [optional]
	 * @param $persist_to [optional]
	 * @param $replicate_to [optional]
	 */
	public function delete ($id, $cas, $persist_to, $replicate_to) {}

	public function getStats () {}

	public function flush () {}

	/**
	 * @param $id
	 * @param $delta [optional]
	 * @param $create [optional]
	 * @param $expire [optional]
	 * @param $initial [optional]
	 */
	public function increment ($id, $delta, $create, $expire, $initial) {}

	/**
	 * @param $id
	 * @param $delta [optional]
	 * @param $create [optional]
	 * @param $expire [optional]
	 * @param $initial [optional]
	 */
	public function decrement ($id, $delta, $create, $expire, $initial) {}

	public function getResultCode () {}

	public function getResultMessage () {}

	/**
	 * @param $option
	 * @param $value
	 */
	public function setOption ($option, $value) {}

	/**
	 * @param $option
	 */
	public function getOption ($option) {}

	/**
	 * @param $resource
	 */
	public function getVersion ($resource) {}

	public function getClientVersion () {}

	public function getNumReplicas () {}

	public function getServers () {}

	/**
	 * @param $id
	 * @param $cas
	 * @param $details [optional]
	 */
	public function observe ($id, $cas, &$details) {}

	/**
	 * @param $ids
	 * @param $details [optional]
	 */
	public function observeMulti (array $ids, &$details) {}

	/**
	 * @param $id
	 * @param $cas
	 * @param $details
	 */
	public function keyDurability ($id, $casarray , $details) {}

	/**
	 * @param $ids
	 * @param $details
	 */
	public function keyDurabilityMulti (array $idsarray , $details) {}

	/**
	 * @param $name
	 */
	public function getDesignDoc ($name) {}

	/**
	 * @param $name
	 * @param $document
	 */
	public function setDesignDoc ($name, $document) {}

	/**
	 * @param $name
	 */
	public function deleteDesignDoc ($name) {}

	public function listDesignDocs () {}

	public function getTimeout () {}

	/**
	 * @param $timeout
	 */
	public function setTimeout ($timeout) {}

}

class CouchbaseClusterManager  {

	/**
	 * @param $hosts
	 * @param $user
	 * @param $password
	 */
	public function __construct ($hosts, $user, $password) {}

	/**
	 * @param $name
	 * @param $attributes
	 */
	public function createBucket ($name, $attributes) {}

	/**
	 * @param $name
	 * @param $attributes
	 */
	public function modifyBucket ($name, $attributes) {}

	/**
	 * @param $name
	 */
	public function deleteBucket ($name) {}

	/**
	 * @param $name
	 */
	public function flushBucket ($name) {}

	/**
	 * @param $name [optional]
	 */
	public function getBucketInfo ($name) {}

	public function getInfo () {}

}

class CouchbaseException extends Exception  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;


	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

class CouchbaseIllegalKeyException extends CouchbaseException  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;


	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

class CouchbaseNoSuchKeyException extends CouchbaseException  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;


	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

class CouchbaseAuthenticationException extends CouchbaseException  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;


	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

class CouchbaseLibcouchbaseException extends CouchbaseException  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;


	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

class CouchbaseServerException extends CouchbaseException  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;


	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

class CouchbaseKeyMutatedException extends CouchbaseException  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;


	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

class CouchbaseTimeoutException extends CouchbaseException  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;


	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

class CouchbaseNotEnoughNodesException extends CouchbaseException  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;


	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

class CouchbaseIllegalOptionException extends CouchbaseException  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;


	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

class CouchbaseIllegalValueException extends CouchbaseException  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;


	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

class CouchbaseIllegalArgumentsException extends CouchbaseException  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;


	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

class CouchbaseNotSupportedException extends CouchbaseException  {
	protected $message;
	protected $code;
	protected $file;
	protected $line;


	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Clone the exception
	 * @link http://php.net/manual/en/exception.clone.php
	 * @return void No value is returned.
	 */
	final private function __clone () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Construct the exception
	 * @link http://php.net/manual/en/exception.construct.php
	 * @param $message [optional]
	 * @param $code [optional]
	 * @param $previous [optional]
	 */
	public function __construct ($message, $code, $previous) {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception message
	 * @link http://php.net/manual/en/exception.getmessage.php
	 * @return string the Exception message as a string.
	 */
	final public function getMessage () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the Exception code
	 * @link http://php.net/manual/en/exception.getcode.php
	 * @return mixed the exception code as integer in
	 * <b>Exception</b> but possibly as other type in
	 * <b>Exception</b> descendants (for example as
	 * string in <b>PDOException</b>).
	 */
	final public function getCode () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the file in which the exception occurred
	 * @link http://php.net/manual/en/exception.getfile.php
	 * @return string the filename in which the exception was created.
	 */
	final public function getFile () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the line in which the exception occurred
	 * @link http://php.net/manual/en/exception.getline.php
	 * @return int the line number where the exception was created.
	 */
	final public function getLine () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace
	 * @link http://php.net/manual/en/exception.gettrace.php
	 * @return array the Exception stack trace as an array.
	 */
	final public function getTrace () {}

	/**
	 * (PHP 5 &gt;= 5.3.0)<br/>
	 * Returns previous Exception
	 * @link http://php.net/manual/en/exception.getprevious.php
	 * @return Exception the previous <b>Exception</b> if available
	 * or <b>NULL</b> otherwise.
	 */
	final public function getPrevious () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * Gets the stack trace as a string
	 * @link http://php.net/manual/en/exception.gettraceasstring.php
	 * @return string the Exception stack trace as a string.
	 */
	final public function getTraceAsString () {}

	/**
	 * (PHP 5 &gt;= 5.1.0)<br/>
	 * String representation of the exception
	 * @link http://php.net/manual/en/exception.tostring.php
	 * @return string the string representation of the exception.
	 */
	public function __toString () {}

}

/**
 * @param $host
 * @param $user [optional]
 * @param $password [optional]
 * @param $bucket [optional]
 * @param $persistent [optional]
 */
function couchbase_connect ($host, $user, $password, $bucket, $persistent) {}

/**
 * @param $resource
 * @param $key
 * @param $value
 * @param $expiration [optional]
 */
function couchbase_add ($resource, $key, $value, $expiration) {}

/**
 * @param $resource
 * @param $key
 * @param $value
 * @param $expiration [optional]
 * @param $cas [optional]
 */
function couchbase_set ($resource, $key, $value, $expiration, $cas) {}

/**
 * @param $resource
 * @param $values
 * @param $expiration [optional]
 */
function couchbase_set_multi ($resourcearray , $values, $expiration) {}

/**
 * @param $resource
 * @param $key
 * @param $value
 * @param $expiration [optional]
 * @param $cas [optional]
 */
function couchbase_replace ($resource, $key, $value, $expiration, $cas) {}

/**
 * @param $resource
 * @param $key
 * @param $value
 * @param $expiration [optional]
 * @param $cas [optional]
 */
function couchbase_prepend ($resource, $key, $value, $expiration, $cas) {}

/**
 * @param $resource
 * @param $key
 * @param $value
 * @param $expiration [optional]
 * @param $cas [optional]
 */
function couchbase_append ($resource, $key, $value, $expiration, $cas) {}

/**
 * @param $resource
 * @param $cas
 * @param $key
 * @param $value
 * @param $expiration [optional]
 */
function couchbase_cas ($resource, $cas, $key, $value, $expiration) {}

/**
 * @param $resource
 * @param $key
 * @param $cache_cb [optional]
 * @param $cas_token [optional]
 */
function couchbase_get ($resource, $key, $cache_cb, &$cas_token) {}

/**
 * @param $resource
 * @param $keys
 * @param $cas_tokens [optional]
 * @param $flags [optional]
 */
function couchbase_get_multi ($resourcearray , $keysarray , &$cas_tokens = null, $flags) {}

/**
 * @param $resource
 * @param $keys
 * @param $with_cas [optional]
 * @param $cb [optional]
 * @param $expiry [optional]
 * @param $lock [optional]
 */
function couchbase_get_delayed ($resourcearray , $keys, $with_cas, $cb, $expiry, $lock) {}

/**
 * @param $resource
 * @param $key
 * @param $cas
 * @param $expiry [optional]
 */
function couchbase_get_and_lock ($resource, $key, &$cas, $expiry) {}

/**
 * @param $resource
 * @param $keys
 * @param $cas_tokens
 * @param $flags [optional]
 * @param $expiry [optional]
 */
function couchbase_get_and_lock_multi ($resourcearray , $keysarray , &$cas_tokens = null, $flags, $expiry) {}

/**
 * @param $resource
 * @param $key
 * @param $expiry
 * @param $cas [optional]
 */
function couchbase_get_and_touch ($resource, $key, $expiry, &$cas) {}

/**
 * @param $resource
 * @param $keys
 * @param $expiry
 * @param $cas_tokens [optional]
 */
function couchbase_get_and_touch_multi ($resourcearray , $keys, $expiryarray , &$cas_tokens = null) {}

/**
 * @param $resource
 * @param $key
 * @param $cas
 */
function couchbase_unlock ($resource, $key, $cas) {}

/**
 * @param $resource
 * @param $key
 * @param $expiry
 */
function couchbase_touch ($resource, $key, $expiry) {}

/**
 * @param $resource
 * @param $keys
 * @param $expiry
 */
function couchbase_touch_multi ($resourcearray , $keys, $expiry) {}

/**
 * @param $resource
 */
function couchbase_fetch ($resource) {}

/**
 * @param $resource
 */
function couchbase_fetch_all ($resource) {}

/**
 * @param $resource
 * @param $doc_name
 * @param $view_name [optional]
 * @param $options [optional]
 * @param $return_errors [optional]
 */
function couchbase_view ($resource, $doc_name, $view_namearray , $options, $return_errors) {}

/**
 * @param $resource
 * @param $doc_name
 * @param $view_name [optional]
 * @param $options [optional]
 * @param $return_errors [optional]
 */
function couchbase_view_gen_query ($resource, $doc_name, $view_namearray , $options, $return_errors) {}

/**
 * @param $resource
 * @param $key
 * @param $offset [optional]
 * @param $create [optional]
 * @param $expiration [optional]
 * @param $initial [optional]
 */
function couchbase_increment ($resource, $key, $offset, $create, $expiration, $initial) {}

/**
 * @param $resource
 * @param $key
 * @param $offset [optional]
 * @param $create [optional]
 * @param $expiration [optional]
 * @param $initial [optional]
 */
function couchbase_decrement ($resource, $key, $offset, $create, $expiration, $initial) {}

/**
 * @param $resource
 */
function couchbase_get_stats ($resource) {}

/**
 * @param $resource
 * @param $key
 * @param $cas [optional]
 */
function couchbase_delete ($resource, $key, $cas) {}

/**
 * @param $resource
 */
function couchbase_flush ($resource) {}

/**
 * @param $resource
 */
function couchbase_get_result_code ($resource) {}

/**
 * @param $resource
 */
function couchbase_get_result_message ($resource) {}

/**
 * @param $resource
 * @param $option
 * @param $value
 */
function couchbase_set_option ($resource, $option, $value) {}

/**
 * @param $resource
 * @param $option
 */
function couchbase_get_option ($resource, $option) {}

/**
 * @param $resource
 */
function couchbase_get_servers ($resource) {}

/**
 * @param $resource
 */
function couchbase_get_num_replicas ($resource) {}

/**
 * @param $resource
 */
function couchbase_get_version ($resource) {}

function couchbase_get_client_version () {}

/**
 * @param $resource
 * @param $key
 * @param $cas
 * @param $details [optional]
 */
function couchbase_observe ($resource, $key, $cas, &$details) {}

/**
 * @param $resource
 * @param $key_to_cas
 * @param $details [optional]
 */
function couchbase_observe_multi ($resourcearray , $key_to_cas, &$details) {}

/**
 * @param $resource
 * @param $key
 * @param $cas
 * @param $durability
 */
function couchbase_key_durability ($resource, $key, $casarray , $durability) {}

/**
 * @param $resource
 * @param $key_to_cas
 * @param $durability
 */
function couchbase_key_durability_multi ($resourcearray , $key_to_casarray , $durability) {}

/**
 * @param $resource
 * @param $name
 */
function couchbase_get_design_doc ($resource, $name) {}

/**
 * @param $resource
 * @param $name
 * @param $doc
 */
function couchbase_set_design_doc ($resource, $name, $doc) {}

/**
 * @param $resource
 * @param $name
 */
function couchbase_delete_design_doc ($resource, $name) {}

/**
 * @param $resource
 */
function couchbase_list_design_docs ($resource) {}

/**
 * @param $resource
 */
function couchbase_get_timeout ($resource) {}

/**
 * @param $resource
 * @param $timeout
 */
function couchbase_set_timeout ($resource, $timeout) {}

define ('COUCHBASE_SUCCESS', 0);
define ('COUCHBASE_AUTH_CONTINUE', 1);
define ('COUCHBASE_DELTA_BADVAL', 3);
define ('COUCHBASE_E2BIG', 4);
define ('COUCHBASE_EBUSY', 5);
define ('COUCHBASE_EINTERNAL', 6);
define ('COUCHBASE_EINVAL', 7);
define ('COUCHBASE_ENOMEM', 8);
define ('COUCHBASE_ERROR', 10);
define ('COUCHBASE_ETMPFAIL', 11);
define ('COUCHBASE_KEY_EEXISTS', 12);
define ('COUCHBASE_KEY_ENOENT', 13);
define ('COUCHBASE_NETWORK_ERROR', 16);
define ('COUCHBASE_NOT_MY_VBUCKET', 17);
define ('COUCHBASE_NOT_STORED', 18);
define ('COUCHBASE_NOT_SUPPORTED', 19);
define ('COUCHBASE_UNKNOWN_COMMAND', 20);
define ('COUCHBASE_UNKNOWN_HOST', 21);
define ('COUCHBASE_OPT_SERIALIZER', 1);
define ('COUCHBASE_OPT_COMPRESSION', 2);
define ('COUCHBASE_OPT_PREFIX_KEY', 3);
define ('COUCHBASE_OPT_IGNOREFLAGS', 4);
define ('COUCHBASE_SERIALIZER_PHP', 0);
define ('COUCHBASE_SERIALIZER_JSON', 1);
define ('COUCHBASE_SERIALIZER_JSON_ARRAY', 2);
define ('COUCHBASE_SERIALIZER_IGBINARY', 3);
define ('COUCHBASE_COMPRESSION_NONE', 0);
define ('COUCHBASE_COMPRESSION_FASTLZ', 2);
define ('COUCHBASE_COMPRESSION_ZLIB', 1);
define ('COUCHBASE_GET_PRESERVE_ORDER', 1);
define ('COUCHBASE_OPT_VOPTS_PASSTHROUGH', 5);
define ('COUCHBASE_REPLICA_FIRST', 0);
define ('COUCHBASE_REPLICA_ALL', 1);
define ('COUCHBASE_REPLICA_SELECT', 2);

// End of couchbase v.1.2.0
?>
