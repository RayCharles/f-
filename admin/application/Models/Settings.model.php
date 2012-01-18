<?php
class Settings extends Model {
	
	static public function insert($setting, $value) {
	
	}
	
	static public function get($setting) {
		$setting = X_Base::getInstance ()->select ( '*' )->from ( 'settings' )->where ( array ("setting" => "$setting" ) )->fetch_object ();
		return $setting [0]->value;
	}
	
	static public function update($setting, $value) {
		$sql = "REPLACE INTO `settings` SET setting = '$setting', value= '$value'";
		$this->db->sql ( $sql )->execute ();
		$this->db->sql ( "ALTER TABLE `settings` AUTO_INCREMENT = 1" )->execute ();
	}
	
	static public function delete($setting) {
	
	}
	
	static public function get_all() {
		$settings_object = X_Base::getInstance ()->select ( '*' )->from ( 'settings' )->fetch_object ();
		
		$settings = array ();
		foreach ( $settings_object as $obj ) {
			$settings [$obj->setting] = $obj->value;
		}
		return $settings;
	}

}