<?php
class Entries extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('entry_model');
		$this->load->helper('url');
	}
	
	/**
	 *
	 */
	public function index($tag='') {
		$conditions = !empty($tag) ? "tags LIKE '%$tag%'" : null;
		$data['entries'] = $this->entry_model->get('*', $conditions);
		$this->render('entries/index', $data);
	}
	
	public function add() {
		if (!empty($this->input->post())) {
			$entry['title']				= $this->input->post('title');
			$entry['tags'] 				= $this->input->post('tags');
			$entry['code']	 			= $this->input->post('code');
			$entry['description'] 		= $this->input->post('description');
			if ($this->entry_model->save($entry)) {
				redirect('/', 'refresh');
			}
		}
		$this->render('entries/add');
	}
	
	public function edit($id) {
		if (!empty($this->input->post())) {
			$entry['id']				= $this->input->post('id');
			$entry['title']				= $this->input->post('title');
			$entry['tags'] 				= $this->input->post('tags');
			$entry['code']	 			= $this->input->post('code');
			$entry['description'] 		= $this->input->post('description');
			if ($this->entry_model->save($entry)) {
				redirect('/', 'refresh');
			}
		}
		$entries = $this->entry_model->get('*', array('id' => $id));
		if (count($entries) == 1) {
			$data['entry'] = $entries[0];
			$this->render('entries/edit', $data);
		} else {
			redirect('/');
		}
	}
}