<?php
class UserController extends F_Controller {
	
	protected function init() {
		$this->view->set_vars ( array ('assets' => ABS . DS . APPS . DS . 'assets' ) );
		$this->view->set_vars ( array ('IndexController' => '', 'ContentController' => '', 'SettingsController' => '', 'UserController' => 'active' ) ); // For
		                                                                                                                                                 // menu
		
		$this->init_language ();
		$this->init_db ();
		$this->init_input ();
	}
	
	public function indexHandler() {
		$auth = Authentication::getInstance ();
		(! $auth->logged_in ()) ? redirect ( site_url () . '/admin/User/Login/' ) : NULL;
		
		$user = $auth->get_user_data ();
		$this->view->set_vars ( array ("_user" => $user [0] ) );
		$this->view->add_template ( 'user.index.tpl.php' );
		$this->main_contents = $this->view->render ();
		
		$this->display_admin_template ();
	}
	
	public function loginHandler() {
		$this->view->add_template ( 'user.login.tpl.php' );
		$this->main_contents = $this->view->render ();
		
		$this->view->display ();
	}
	
	public function logoutHandler() {
		$auth = Authentication::getInstance ();
		$auth->logout ();
		
		// @todo: add message here
		redirect ( site_url () . "/admin/User/login/" );
	}
	
	public function submitHandler() {
		$username = $this->input->post ( 'username' );
		$password = $this->input->post ( 'password' );
		$remember = ($this->input->post ( 'remember' ) === 'on') ? TRUE : FALSE;
		
		echo "<pre>", var_dump ( $username, $password, $remember ), "</pre>";
		
		$auth = Authentication::getInstance ();
		if ($auth->login ( $username, $password, $remember )) {
			redirect ( site_url () . '/admin/' );
		} else {
			// @todo: Message
			redirect ( site_url () . '/admin/User/login/' );
		}
	}
	
	public function registerHandler() {
	
	}
	
	public function resetHandler() {
	
	}
	
	public function addHandler() {
	
	}
	
	public function removeHandler() {
	
	}
	
	public function editHandler() {
	
	}
	
	public function saveUserAJAXHandler() {
		$data = $this->input->post ();
		
		$user_id = $data ['user_id'];
		unset ( $data ['user_id'] );
		
		if ($data ['user_password'] !== '') {
			$data ['user_password'] = Authentication::getInstance ()->decrypt_password ( $data ['user_password'] );
		} else {
			unset ( $data ['user_password'] ); // TODO
		}
		
		$user = new User ();
		$user->update ( $this->input->post ( 'user_id' ), $data );
		
		Authentication::getInstance ()->reload_user_data ( $user_id );
	}
	
	public function allHandler() {
		$auth = Authentication::getInstance ();
		(! $auth->logged_in ()) ? redirect ( site_url () . '/admin/User/Login/' ) : NULL;
		
		$users = $this->db->select ( '*' )->from ( 'users' )->fetch_object ();
		
		$this->view->set_vars ( array ("users" => $users ) );
		$this->view->add_template ( 'User.all.tpl.php' );
		$this->main_contents = $this->view->render ();
		
		$this->display_admin_template ();
	}

}