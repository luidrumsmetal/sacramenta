<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Inicio';
    $this->load->view('template/header',$data);
    $this->load->view('template/footer');
  }

  function priestCreate()
  {
    $data['title'] = 'Registro de Sacerdotes';
    $this->load->view('template/header',$data);
    $this->load->view('users/priestCreate');
    $this->load->view('template/footer');

  }

}
