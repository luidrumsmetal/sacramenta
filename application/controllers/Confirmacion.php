<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmacion extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    
  }

  public function confirmacionCreate()
  {
    $data['title'] = 'Registro Confirmacion';
    $this->load->view('template/header');
    $this->load->view('sacramentos/confirmacion/confirmacionCreate');
    $this->load->view('template/footer');
    
  }

}