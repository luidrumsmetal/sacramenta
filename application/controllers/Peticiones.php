<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peticiones extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Historial de Peticiones';
    $this->load->view('template/header', $data);
    $this->load->view('peticiones/index');
    $this->load->view('template/footer');
  }

}
