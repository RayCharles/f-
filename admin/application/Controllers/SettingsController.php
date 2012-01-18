<?php
class SettingsController extends F_Controller {
	
	public function init() {
		$this->init_language ();
		$this->init_db ();
		$this->init_input ();
		
		$this->view->set_vars ( array ('assets' => ABS . DS . APPS . DS . 'assets' ) );
		$this->view->set_vars ( array ('IndexController' => '', 'ContentController' => '', 'SettingsController' => 'active', 'UserController' => '' ) ); // For
		                                                                                                                                                 // menu
		                                                                                                                                                 
		// Check whether current user is logged in
		$auth = Authentication::getInstance ();
		(! $auth->logged_in ( 2 )) ? redirect ( site_url () . '/admin/Index/' ) : NULL;
	}
	
	public function indexHandler() {
		$settings = new Settings ();
		$this->view->set_vars ( array ('_settings' => $settings->get_all () ) );
		
		$this->view->add_template ( 'Settings.index.tpl.php' );
		$this->main_contents = $this->view->render ();
		
		$this->display_admin_template ();
	}
	
	public function saveAJAXHandler() {
		if ($this->input->post ()) {
			$post = $this->input->make_db_ready ( $this->input->post () );
			$this->input->set_post ( 'allowed_to_register', ($this->input->post ( 'allowed_to_register' ) == 'true') ? 1 : 0 );
			
			if ($this->input->server ( 'HTTP_X_REQUESTED_WITH' )) { // Only via
			                                                        // ajax
				$settings = new Settings ();
				foreach ( $this->input->post () as $setting => $value ) {
					$settings->update ( $setting, $value );
				}
			} else {
				echo 'This page is only via ajax accessable! Fuck yeah!';
			}
		} else {
			return false;
		}
	}
}