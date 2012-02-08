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
	
	static function content_status($int = 0) { // @todo belongs to Content.Model
		$statuses = array ("published", "pending_approval", "not_published", "checked_out", "pending_go_live_date", "SPAM" );
		return $statuses [$int];
	}
	
	static function get_all_content_statuses() { // @todo belongs to
	                                             // Content.Model
		$statuses = array (0 => "published", 1 => "pending_approval", 2 => "not_published", 3 => "checked_out", 4 => "pending_go_live_date", 5 => "SPAM" );
		return $statuses;
	}
	
	static function content_type($int = 0) { // @todo belongs to Content.Model
		$types = array ("simple_post", "post_to_thread", "thread", "topic" );
		return $types [$int];
	}
	
	static function get_all_content_types() { // @todo belongs to Content.Model
		$types = array (0 => "simple_post", 1 => "post_to_thread", 2 => "thread", "topic" );
		return $types;
	}
	
	static function content_visibility($varchar = 0) {
		$opts = array (0 => "public", 1 => "private", 2 => "password_protected" );
		return $opts [$varchar];
	}
	
	static function get_all_content_visibilities() {
		$opts = array (0 => "public", 1 => "private", 2 => "password_protected" );
		return $opts;
	}
	
	static function get_all_cats() {
		$cats = X_Base::getInstance ()->select ( '*' )->from ( 'categories' )->where ( array ('Type' => 1 ) )->fetch_object ();
		
		return $cats;
	}
	
	static function process_tags($tags, $content_id) {
		$tags = explode ( ',', $tags );
		foreach ( $tags as $tag ) {
			$id = X_Base::getInstance ()->select ( 'idCategories' )->from ( 'categories' )->where ( array ('Name' => $tag ) )->fetch_object ();
			if (! empty ( $id )) {
				$if = $id [0]->idCategories;
				X_Base::getInstance ()->insert_into ( 'content_categories', array ("idContent" => $content_id, "idCategories" => $if ) )->execute ();
			} else {
				X_Base::getInstance ()->insert_into ( 'categories', array ("Name" => $tag, "Slug" => Functions::slug ( $tag ), "Type" => 2 ) )->execute ();
				X_Base::getInstance ()->insert_into ( 'content_categories', array ("idContent" => $content_id, "idCategories" => X_Base::getInstance ()->last_insert_id () ) )->execute ();
			}
		}
	}
	
	static function process_cats($cats, $content_id) {
		foreach ( $cats as $tag ) {
			X_Base::getInstance ()->insert_into ( 'content_categories', array ("idContent" => $content_id, "idCategories" => $tag ) )->execute ();
		}
	}
	
	static function slug($str) {
		$str = strtolower ( trim ( $str ) );
		$str = preg_replace ( '/[^a-z0-9-]/', '-', $str );
		$str = preg_replace ( '/-+/', "-", $str );
		return $str;
	}
}