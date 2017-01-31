<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sacramentos extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('inicio/header');
    $this->load->view('inicio/sacramentos/bautizo');
    $this->load->view('inicio/footer');
  }

  function primera()
  {
    $this->load->view('inicio/header');
    $this->load->view('inicio/sacramentos/primerac');
    $this->load->view('inicio/footer');
  }  

  function confirmacion()
  {
    $this->load->view('inicio/header');
    $this->load->view('inicio/sacramentos/confirmacion');
    $this->load->view('inicio/footer');
  }    

  function matrimonio()
  {
    $this->load->view('inicio/header');
    $this->load->view('inicio/sacramentos/matrimonio');
    $this->load->view('inicio/footer');
  }  
}