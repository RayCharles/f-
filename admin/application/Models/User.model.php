<?php
class User extends Model {
	
	protected function insert() {
	
	}
	
	static public function get($user_id) {
		$db = X_Base::getInstance ();
		$user = $db->select ( '*' )->from ( 'users' )->where ( array ('user_id' => $user_id ) )->fetch_object ();
		return $user [0];
	}
	
	public function update($user_id, $data) {
		$db = X_Base::getInstance ();
		$db->update ( 'users', $data )->where ( array ('user_id' => $user_id ) )->execute ();
		// echo $db->last_query();
	}
	
	protected function delete($user_id) {
	
	}
	
	public function get_all() {
	
	}

}