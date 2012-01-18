<?php
class Forum extends Model {
	
	private $data;
	
	public $forum_id;
	public $forum_name;
	public $forum_desc;
	public $forum_created;
	public $forum_modified;
	public $forum_password;
	public $forum_visible;
	public $forum_opened;
	
	public function __construct($data) {
		parent::__construct ();
		
		$this->data = $data;
		$this->_init ();
	}
	
	private function _init() {
		$this->forum_id = $this->data->forum_id;
		$this->forum_name = $this->data->forum_name;
		$this->forum_desc = $this->data->forum_desc;
		$this->forum_created = $this->data->forum_created;
		$this->forum_modified = $this->data->forum_modified;
		$this->forum_password = $this->data->forum_password;
		$this->forum_visible = $this->data->forum_visible;
		$this->forum_opened = $this->data->forum_opened;
	}
	
	public function get_all() {
	
	}

}