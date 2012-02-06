<?php
class Functions {
	
	static function shorten($text, $chars = 150, $trailing = '...') {
		if (strlen ( $text ) <= $chars)
			return $text;
		if (false !== ($breakpoint = strpos ( $text, '.', $chars ))) {
			if ($breakpoint < strlen ( $text ) - 1) {
				$text = substr ( $text, 0, $breakpoint ) . $trailing;
			}
		}
		return $text;
	}
	
	static function content_status($int = 1) { // @todo belongs to Content.Model
		$statuses = array ("published", "pending_approval", "not_published", "checked_out", "pending_go_live_date", "SPAM" );
		return $statuses [$int];
	}
	
	static function get_all_content_statuses() { // @todo belongs to
	                                             // Content.Model
		$statuses = array ("published", "pending_approval", "not_published", "checked_out", "pending_go_live_date", "SPAM" );
		return $statuses;
	}
	
	static function content_type($int = 0) { // @todo belongs to Content.Model
		$types = array ("simple_post", "post_to_thread", "thread", "topic" );
		return $types [$int];
	}
	
	static function get_all_content_types() { // @todo belongs to Content.Model
		$types = array ("simple_post", "post_to_thread", "thread", "topic" );
		return $types;
	}
	
	static function content_visibility($varchar = 1) {
		$opts = array ("private", "public", "password_protected" );
		return $opts [$varchar];
	}
	
	static function get_all_content_visibilities() {
		$opts = array ("private", "public", "password_protected" );
		return $opts;
	}
	
	static function get_all_cats() {
		$cats = X_Base::getInstance ()->select ( '*' )->from ( 'categories' )->where ( array ('Type' => 1 ) )->fetch_object ();
		
		return $cats;
	}
	
	static function process_tags(String $tags) {
		$tags = explode ( ',', $tags );
		foreach ( $tags as $tag ) {
			$id = X_Base::getInstance()->select('idCategories')->from('categories')->where(array('Name' => $tag))->fetch_object();
			if ($id[0]->idCategories) {
				//TODO
			}
		}
	}
}