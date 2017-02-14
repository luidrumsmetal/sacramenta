<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    if (!$this->session->userdata('tipo')){
			$this->session->set_flashdata('error','Debe Iniciar Sesion');
			redirect(base_url().'login');
    }
  }

  function index()
  {
    $data['title'] = 'Inicio';
    $this->load->view('template/header',$data);
    $this->load->view('home');
    $this->load->view('template/footer');
  }

  function priestCreate()
  {
    $data['title'] = 'Registro de Sacerdotes';
    $this->load->view('template/header',$data);
    $this->load->view('users/priestCreate');
    $this->load->view('template/footer');

  }

  function fiel()
  {
    $data['title'] = 'Inicio';
    $this->load->view('template/header',$data);
    $this->load->view('fiel');
    $this->load->view('template/footer');
  }

  function bautizo()
  {
    $this->load->view('template/header');
    $this->load->view('fiel/bautizo');
    $this->load->view('template/footer');
  }

  function primera()
  {
    $this->load->view('template/header');
    $this->load->view('inicio/sacramentos/primerac');
    $this->load->view('template/footer');
  }

  function confirmacion()
  {
    $this->load->view('template/header');
    $this->load->view('inicio/sacramentos/confirmacion');
    $this->load->view('template/footer');
  }

  function matrimonio()
  {
    $this->load->view('template/header');
    $this->load->view('inicio/sacramentos/matrimonio');
    $this->load->view('template/footer');
  }

}
