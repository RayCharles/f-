<?php
abstract class F_Controller extends Controller {
	
	protected $db;
	protected $input;
	protected $main_contents;
	
	protected function init() {
		$this->view->set_vars ( array ('assets' => ABS . DS . APPS . DS . 'assets' ) );
	}
	
	protected function init_db() {
		$this->db = X_Base::getInstance ();
		$this->db->set_config_file ( DB_CONFIG );
		$this->db->connectToDatabase ();
	}
	
	protected function init_input() {
		$this->input = Input::getInstance ();
	}
	
	protected function init_language($language = 'english') {
		$lang = Language::getInstance ();
		$lang->set_language ( $language );
		$this->view->set_vars ( array ('language' => $lang->initialize (), 'lang' => $lang->initialize () ) );
	}
	
	protected function display_admin_template() {
		$this->view->reset ();
		$this->view->add_template ( 'skeleton.tpl.php' );
		$this->view->set_vars ( array ('main_contents' => $this->main_contents ) );
		$this->view->display ();
	}
}