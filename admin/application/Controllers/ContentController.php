<?php
class ContentController extends F_Controller {
	
	protected function init() {
		$this->view->set_vars ( array ('assets' => ABS . DS . APPS . DS . 'assets' ) );
		$this->view->set_vars ( array ('IndexController' => '', 'ContentController' => 'active', 'SettingsController' => '', 'UserController' => '' ) ); // For
		                                                                                                                                                 // menu
		
		$this->init_language ();
		$this->init_db ();
		$this->init_input ();
		
		// Check whether current user is logged in
		$auth = Authentication::getInstance ();
		(! $auth->logged_in ()) ? redirect ( site_url () . '/admin/User/Login/' ) : NULL;
	}
	
	public function indexHandler() {
		$this->view->set_vars ( array () );
		$this->view->add_template ( 'Content.index.tpl.php' );
		$this->main_contents = $this->view->render ();
		
		$this->display_admin_template ();
	}
}