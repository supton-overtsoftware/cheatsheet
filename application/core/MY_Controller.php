<?php
class MY_Controller extends CI_Controller {
	protected $js = array();
	protected $css = array();
	protected $layout = 'main';
	
	protected function render($view, $data = array()) {
		$this->load->helper(array('html', 'url'));
		$this->load->view('_layouts/' . $this->layout, array('view'=>$view, 'data'=>$data, 'js'=>$this->js, 'css'=>$this->css));
	}
}