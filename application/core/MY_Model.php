<?php

class MY_Model extends CI_Model {
	protected $table; 
	protected $foreign;
	protected $required = array();
	//protected $foreign = array('foreigntable' => 'thistable.foreignkey = foreigntable.key');
	
	
	public function __construct() {
		parent::__construct();
		$this->table = strtolower(preg_replace('/^([a-zA-Z]+)_model/', '\1', get_class($this))) . 's';
		$this->load->database();
	}
	
	/**
	 * 
	 * @param string $fields
	 * @param array $conditions
	 */
	public function get($fields = null, $conditions) {
		if (!empty($fields)) {
			$this->db->select($fields);
		
			// Check for reference tables and add necessary joins
			foreach (explode(',', $fields) as $field) {
				if (strpos($field, '.') !== false) {
					$parts = explode('.', $field);
					$table = trim($parts[0]);
					$name = trim($parts[1]);
					
					if (empty($this->foreign[$table])) {
						continue;
					}
					
					if (empty($joins[$table]) && !empty($this->foreign[$table])) {
						$joins[$table] = $this->foreign[$table];
					}
				}
			}
		} 
		
		$this->db->from($this->table);
		if (!empty($conditions)) {
			if (is_array($conditions)) {
				foreach($conditions as $field => $value) {
					$this->db->where($field, $value);
				}
			} else {
				$this->db->where($conditions);
			}
		}
		
		if (!empty($joins)) {
			foreach($joins as $table => $join) {
				$this->db->join($table, $join);
			}
		}
		return $this->db->get()->result();
	}
	
	/**
	 * Gets a record by the ID
	 * @param int $id
	 * @return boolean|recordset
	 */
	public function getById($id) {
		$result = $this->db->get_where($this->table, array('id'=>$id))->result();
		if (count($result) == 0) {
			return false;
		}
		return $result[0];
	}
	
	/**
	 * Save the record to database
	 * @param array $data
	 * @return boolean TRUE on success or FALSE on failure
	 */
	public function save(array $data) {
		
		foreach ($this->required as $field) {
			if (empty($data[$field])) {
				return false;
			}
		}

		if (empty($data['id'])) {
			$this->db->insert($this->table, $data);
		} else {
			$this->db->update($this->table, $data, array('id'=>$data['id']));
		}
	}
}