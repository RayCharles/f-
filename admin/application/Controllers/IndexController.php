<?php
class IndexController extends F_Controller {
	
	protected function init() {
		$this->init_language ();
		$this->init_db ();
		$this->view->set_vars ( array ('assets' => ABS . DS . APPS . DS . 'assets' ) );
		$this->view->set_vars ( array ('IndexController' => 'active', 'ContentController' => '', 'SettingsController' => '', 'UserController' => '' ) ); // For
		                                                                                                                                                 // menu
		                                                                                                                                                 
		// Check whether current user is logged in
		$auth = Authentication::getInstance ();
		(! $auth->logged_in ()) ? redirect ( site_url () . '/admin/User/Login/' ) : NULL;
	}
	
	public function indexHandler() {
		$this->view->set_vars ( array () );
		$this->view->add_template ( 'index.home.tpl.php' );
		$this->main_contents = $this->view->render ();
		
		$this->display_admin_template ();
	}
}