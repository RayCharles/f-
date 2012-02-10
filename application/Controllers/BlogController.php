<?php

class BlogController extends F_Controller {
	protected function init() {
		$this->view->set_vars ( array ('assets' => ABS . DS . APPS . DS . 'assets' ) );
		
		$this->init_db ();
	}
	
	public function indexHandler() {
		$m = ContentModel::getInstance();
		$m->the_post();
		$posts = $this->db->sql("SELECT contents.*, categories.* FROM contents INNER JOIN content_categories ON contents.content_id = content_categories.idContent INNER JOIN categories ON content_categories.idCategories = categories.idCategories")->fetch_object ();
		$this->view->set_vars ( array ('forum' => $posts ) );
		//$this->view->add_template ( 'blog.tpl.php' );
		$this->view->display ();
	}
}