<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faithful extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
	}

	public function index()
	{
		$this->faithfulList();
	}

	public function faithfulList(){
		$data['title'] = 'Lista de Fieles';
		$this->load->view('template/header', $data);
		$this->load->view('users/faithfulList');
		$this->load->view('template/footer');
	}
	public function faithfulListAjax(){
		$texto = $this->input->post('texto');
		$listFaithful = $this->Users_model->getFaithful($texto);
		echo json_encode($listFaithful);
	}
}

/* End of file Faithful.php */
/* Location: ./application/controllers/Faithful.php */