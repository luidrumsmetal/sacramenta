<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acercade extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('inicio/header');
    $this->load->view('inicio/ceb/acercade');
    $this->load->view('inicio/footer');
  }

    function asamblea()
  {
    $this->load->view('inicio/header');
    $this->load->view('inicio/ceb/asamblea');
    $this->load->view('inicio/footer');
  }

    function presiden()
  {
    $this->load->view('inicio/header');
    $this->load->view('inicio/ceb/presiden');
    $this->load->view('inicio/footer');
  }

    function representados()
  {
    $this->load->view('inicio/header');
    $this->load->view('inicio/ceb/representados');
    $this->load->view('inicio/footer');
  }

    function organization()
  {
    $this->load->view('inicio/header');
    $this->load->view('inicio/ceb/organizacion');
    $this->load->view('inicio/footer');
  }


}
