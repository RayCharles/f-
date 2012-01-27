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
	
	static function content_type($int = 0) { // @todo belongs to Content.Model
		$types = array ("simple_post", "post_to_thread", "thread", "topic" );
		
		return $types [$int];
	}
	
	static function content_visibility($varchar = 1) {
		switch ($varchar) {
			case 0 :
				return 'private';
				break;
			case 1 :
				return 'public';
				break;
			default :
				return 'password_protected';
				break;
		}
	}
	
	static function get_all_cats() {
		$cats = X_Base::getInstance()->select('*')->from('categories')->where(array('Type' => 1))->fetch_object();
		
		return $cats;
	}
}