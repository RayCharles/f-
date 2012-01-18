<?php
class Settings extends Model {
	
	protected function insert($setting, $value) {
	
	}
	
	protected function get($setting) {
	
	}
	
	public function update($setting, $value) {
		$sql = "REPLACE INTO `settings` SET setting = '$setting', value= '$value'";
		$this->db->sql ( $sql )->execute ();
		$this->db->sql ( "ALTER TABLE `settings` AUTO_INCREMENT = 1" )->execute ();
	}
	
	protected function delete($setting) {
	
	}
	
	public function get_all() {
		$settings_object = $this->db->select ( '*' )->from ( 'settings' )->fetch_object ();
		
		$settings = array ();
		foreach ( $settings_object as $obj ) {
			$settings [$obj->setting] = $obj->value;
		}
		return $settings;
	}

}