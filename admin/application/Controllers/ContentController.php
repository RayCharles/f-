<?php
class ContentController extends F_Controller {
	
	protected function init() {
		$this->view->set_vars ( array ('assets' => ABS . DS . APPS . DS . 'assets', "user" => Authentication::getInstance ()->get_user_data () ) );
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
		$contents = $this->db->select ( '*' )->from ( 'contents' )->fetch_object ();
		
		$this->view->set_vars ( array ('contents' => $contents ) );
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
			$contents = array ();
			
			if (isset ( $post ['tags'] )) {
				$contents ['tags'] = $post ['tags'];
				unset ( $post ['tags'] );
			}
			if (isset ( $post ['cats'] )) {
				$contents ['cats'] = $post ['cats'];
				unset ( $post ['cats'] );
			}
			if (isset ( $post ['tags__ptags'] )) {
				unset ( $post ['tags__ptags'] );
			}
			$post ['content_created'] = time ();
			$post ['content_published'] = time ();
			$post ['content_edited'] = time ();
			
			if ($this->input->server ( 'HTTP_X_REQUESTED_WITH' )) {
				$execute = $this->db->insert_into ( 'contents', $post )->execute ();
				$post_id = $this->db->last_insert_id ();
				// $post_id = 1;
				// Insert cats and tags
				if (isset ( $contents ['tags'] ) and ! empty ( $contents ['tags'] )) {
					Functions::process_tags ( $contents ['tags'], $post_id );
				}
				if (isset ( $contents ['cats'] ) and ! empty ( $contents ['cats'] )) {
					Functions::process_cats ( $contents ['cats'], $post_id );
				}
				// TODO: save post settings
				echo $post_id;
			} else {
				echo 'This page is only via ajax accessable! Fuck yeah!';
			}
		} else {
			return false;
		}
	}
	
	public function newCatHandler() {
		if ($this->input->get ()) {
			$post = $this->input->make_db_ready ( $this->input->get () );
			if ($this->input->server ( 'HTTP_X_REQUESTED_WITH' )) {
				$post['Slug'] = Functions::slug($post['Name']);
				$post['Type'] = 1;
				$this->db->insert_into('categories', $post)->execute();
				$r = $this->db->select('*')->from('categories')->where(array('idCategories' => $this->db->last_insert_id()))->fetch_object();
				echo json_encode($r[0]);
			} else {
				echo 'This page is only via ajax accessable! Fuck yeah!';
			}
		} else {
			return false;
		}
	}
}