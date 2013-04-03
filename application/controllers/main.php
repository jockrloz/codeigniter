<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller { 
	
	function __construct() {
		parent::__construct();
		$this->load->model('bookmarksModel');
	}

	public function index() {		
		$this->load->view('headers/librerias');
		$this->load->view('principal');
		$this->load->view('footer');
	}

	public function agregar() {
		$this->load->view('headers/librerias');
		$this->load->view('agregar');
		$this->load->view('footer');
	}

	public function guardar() {
		$data = array(
			'titulo' => $this->input->post('titulo',TRUE),
			'url' => $this->input->post('url', TRUE),
			'creacion' => date('Y/m/d h:m')
		);

		$this->bookmarksModel->guardar($data);
		redirect('main/agregar');
	}

	public function ver(){
		$data = array(
			'enlaces' => $this->bookmarksModel->verTodo(),
			'dump' => 0
		);

		$this->load->view('headers/librerias');
		$this->load->view('ver', $data);
		$this->load->view('footer');
	}

	
	

	

	
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */