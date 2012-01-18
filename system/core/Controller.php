<?php

abstract class Controller {
	
	protected $view;
	
	function __construct() {
		$this->view = View::getInstance ();
		$this->view->set_default_path ( TEMPLATE_PATH );
		$this->init ();
	}
	
	protected abstract function init();
	public abstract function indexHandler();
}