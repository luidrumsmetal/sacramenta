<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('inicio/header');
    $this->load->view('inicio/ceb/organizacion');
    $this->load->view('inicio/footer');
  }

}