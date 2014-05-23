<?php
class Entry_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
		$this->table = 'entries';
		$this->required = array('title', 'code', 'tags');
	}
	
}