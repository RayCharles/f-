<?php

class IndexController extends F_Controller {
	protected function init() {
		
		$this->init_db ();
	}
	
	public function indexHandler() {
		$fs = $this->db->select ( '*' )->from ( 'forum' )->where ( array ('forum_visible' => 1 ) )->fetch_object ();
		foreach ( $fs as $f ) {
			$forum [] = new Forum ( $f );
		}
		
		$this->view->set_vars ( array ('forum' => $forum ) );
		$this->view->add_template ( 'index.tpl.php' );
		$this->view->display ();
	}
}