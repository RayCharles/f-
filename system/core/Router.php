<?php
/**

 * User: Arthur
 * Date: 27.03.11
 * Time: 21:16
 * Router class
 */

class Router {
	
	private static $instance = NULL;
	public static function getInstance() {
		
		if (NULL === self::$instance) {
			self::$instance = new self ();
		}
		return self::$instance;
	}
	private function __clone() {
	}
	
	public function route() {
		$this->uri = URI::getInstance ();
		$this->uri->parse_uri ();
		
		if (! $this->uri->get_controller ()) {
			$this->_set_default_controller ();
			return;
		}
		
		$this->_set_routing ();
	
	}
	
	private function _set_default_controller() {
		require_once ROOT . DS . APPS . DS . 'Controllers' . DS . 'IndexController.php';
		
		$controller = new IndexController ();
		if ($this->uri->get_params ()) {
			call_user_func_array ( array ($controller, 'indexHandler' ), $this->uri->get_params () );
		} else {
			$controller->indexHandler ();
		}
		
		// todo: From config file
	}
	
	private function _set_routing() {
		if (! $this->_validate_request ()) {
			$this->_set_default_controller ();
			return;
		}
		
		$controller = $this->uri->get_controller () . 'Controller';
		$module = $this->uri->get_module () . 'Handler';
		
		require_once ROOT . DS . APPS . DS . 'Controllers' . DS . $this->uri->get_controller () . 'Controller.php';
		
		$controller = new $controller ();
		if ($this->uri->get_params ()) { // if some parameters have been passed
			if (method_exists ( $controller, $module )) { // if the required method
			                                              // exists
				call_user_func_array ( array ($controller, $module ), $this->uri->get_params () ); // FUTURE:
				                                                                                   // change
				                                                                                   // the
				                                                                                   // way
				                                                                                   // calling
				                                                                                   // functions
			} else { // else call default indexHandler
				call_user_func_array ( array ($controller, 'indexHandler' ), $this->uri->get_params () ); // FUTURE:
				                                                                                          // change
				                                                                                          // the
				                                                                                          // way
				                                                                                          // calling
				                                                                                          // functions
			}
		} else {
			if (method_exists ( $controller, $module )) {
				$controller->$module ();
			} else {
				$controller->indexHandler ();
			}
		}
	}
	
	private function _validate_request() {
		if (! $this->uri->get_controller ()) {
			return FALSE;
		}
		
		if (! file_exists ( ROOT . DS . APPS . DS . 'Controllers' . DS . $this->uri->get_controller () . 'Controller.php' )) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
