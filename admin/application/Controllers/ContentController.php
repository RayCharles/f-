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
		$contents = $this->db->select('*')->from('contents')->fetch_object();
		
		$this->view->set_vars ( array ('contents' => $contents) );
		$this->view->add_template ( 'Content.index.tpl.php' );
		$this->main_contents = $this->view->render ();
		
		$this->display_admin_template ();
	}
	
	public function addHandler() {
		$this->view->set_vars ( array () );
		$this->view->add_template ( 'Content.add.tpl.php' );
		$this->main_contents = $this->view->render ();
		
		$this->display_admin_template ();
	}
	
	public function addContentAJAXHandler() {
		if ($this->input->post ()) {
			$post = $this->input->make_db_ready ( $this->input->post () );
				
			if ($this->input->server ( 'HTTP_X_REQUESTED_WITH' )) { // Only via
				// ajax
				foreach ( $this->input->post () as $setting => $value ) {
					
				}
				echo "Success";
			} else {
				echo 'This page is only via ajax accessable! Fuck yeah!';
			}
		} else {
			return false;
		}
	}
}