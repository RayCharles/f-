<?php

/**
 * User: Arthur
 * Date: 27.03.11
 * Time: 19:19
 * Common functions
 */
function setReporting() {
	// if (DEVELOPMENT_ENVIRONMENT == TRUE) {
	error_reporting ( E_ALL );
	ini_set ( 'display_errors', 'On' );
	
	// } else {
	// error_reporting(E_ALL);
	// ini_set('display_errors', 'Off');
	// ini_set('log_errors', 'On');
	// ini_set('error_log', ROOT . DS . FRAMEWORK . 'tmp' . DS . 'logs' . DS .
// 'error.log');
	// }
}

function __autoload($class) {
	if (file_exists ( ROOT . DS . FRAMEWORK . DS . CORE . DS . $class . '.php' )) { // Core
	                                                                             // (system)
	                                                                             // classes
		require_once (ROOT . DS . FRAMEWORK . DS . CORE . DS . $class . '.php');
		return;
	} elseif (file_exists ( ROOT . DS . FRAMEWORK . DS . 'library' . DS . $class . '.php' )) { // Custom
	                                                                                       // (system/library/)
	                                                                                       // classes
		require_once (ROOT . DS . FRAMEWORK . DS . 'library' . DS . $class . '.php');
		return;
	} elseif (file_exists ( ROOT . DS . APPS . DS . 'library' . DS . $class . '.php' )) { // Custom
	                                                                                   // classes
		require_once ROOT . DS . APPS . DS . 'library' . DS . $class . '.php';
		return;
	} elseif (file_exists ( ROOT . DS . APPS . DS . 'Models' . DS . $class . '.php' )) { // Model
	                                                                                        // classes
		require_once ROOT . DS . APPS . DS . 'Models' . DS . $class . '.php';
		return;
	} else {
		return FALSE;
	}
}

// Get apache version
function apache_version() {
	if (function_exists ( 'apache_get_version' )) {
		if (preg_match ( '|Apache\/(\d+)\.(\d+)\.(\d+)|', apache_get_version (), $version )) {
			return $version [1] . '.' . $version [2] . '.' . $version [3];
		}
	} elseif (isset ( $_SERVER ['SERVER_SOFTWARE'] )) {
		if (preg_match ( '|Apache\/(\d+)\.(\d+)\.(\d+)|', $_SERVER ['SERVER_SOFTWARE'], $version )) {
			return $version [1] . '.' . $version [2] . '.' . $version [3];
		}
	}
	
	return '(unknown)';
}

function site_url() {
	return ABS;
}

function ip() {
	if (! isset ( $_SERVER ['HTTP_X_FORWARDED_FOR'] )) {
		
		$client_ip = $_SERVER ['REMOTE_ADDR'];
	} else {
		
		$client_ip = $_SERVER ['HTTP_X_FORWARDED_FOR'];
	}
	
	return $client_ip;
}

function redirect($url, $message = NULL) {
	if ($message == NULL) {
		header ( "Location: $url" );
	} else {
		header ( "Location: $url?$message" );
	
	}
}