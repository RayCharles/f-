<?php
class ContentModel extends Model {
	
	private $counter = 0;
	private $current_position = - 1;
	private $posts;
	
	protected static $instance = NULL;
	public static function getInstance() {
		if (NULL === self::$instance) {
			session_start ();
			self::$instance = new self ();
		}
		return self::$instance;
	}
	private function __clone() {
	}
	
	protected function init() {
		if (Authentication::getInstance ()->logged_in ()) {
			$this->posts = $this->db->select ( '*' )->from ( 'contents' )->where ( "contents.content_status = 0 AND contents.content_type = 0 AND contents.content_visibility <= 1" )->fetch_object ();
		} else {
			$this->posts = $this->db->select ( '*' )->from ( 'contents' )->where ( array ("content_status" => 0, "content_type" => 0, "content_visibility" => 0 ) )->fetch_object ();
		}
		
		$this->counter = count ( $this->posts );
	}
	
	public function the_post() {
		//TODO: setup post
		$this->current_position++;
	}
	
	public function have_posts() {
		if ($this->current_position + 1 < $this->counter) {
			return true;
		} elseif($this->current_position + 1 == $this->counter && $this->counter > 0) {
			$this->current_position = -1;
		}
	}
	
	public function post_class() {
	
	}
	
	public function the_ID() {
	
	}
	
	public function the_author() {
	
	}
	
	public function the_time() {
	
	}
	
	public function comments_popup_link() {
	
	}
	
	public function the_tags() {
	
	}
	
	public function get_the_category_list() {
	
	}
	
	public function the_permalink() {
	
	}
	
	public function the_title() {
	
	}
	
	public function the_content() {
	
	}

}

function the_post() {
	return ContentModel::getInstance ()->the_post ();
}

function have_posts() {
	return ContentModel::getInstance ()->have_posts ();
}

function post_class() {
	return ContentModel::getInstance ()->post_class ();
}

function the_ID() {
	return ContentModel::getInstance ()->the_ID ();
}

function the_author() {
	return ContentModel::getInstance ()->the_author ();
}

function the_time() {
	return ContentModel::getInstance ()->the_time ();
}

function comments_popup_link() {
	return ContentModel::getInstance ()->comments_popup_link ();
}

function the_tags() {
	return ContentModel::getInstance ()->the_tags ();
}

function get_the_category_list() {
	return ContentModel::getInstance ()->get_the_category_list ();
}

function the_permalink() {
	return ContentModel::getInstance ()->the_permalink ();
}

function the_title() {
	return ContentModel::getInstance ()->the_title ();
}

function the_content() {
	return ContentModel::getInstance ()->the_content ();
}