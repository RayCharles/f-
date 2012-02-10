<?php

class IndexController extends F_Controller {
	protected function init() {
		$this->view->set_vars ( array ('assets' => ABS . DS . APPS . DS . 'assets' ) );
		$this->init_db ();
	}
	
	public function indexHandler() {
		$forum = null;
		$this->view->set_vars ( array ('forum' => $forum ) );
		$this->view->add_template ( 'index.tpl.php' );
		$this->view->display ();
	}
}