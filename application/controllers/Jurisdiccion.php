<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurisdiccion extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('Jurisdiccion_model');
  }

  function index()
  {

  }

  function parroquiaCreate()
  {
    $data['msj_error'] = '';
    $data['title'] = 'Registrar Parroquia';
    $this->load->view('template/header',$data);
    $this->load->view('parroquia/alta_parroquia',$data);
    $this->load->view('template/footer');
  }

  function parroquiaRegistro()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[2]|xss_clean');
    $this->form_validation->set_rules('jurisdiccion_id', 'jurisdiccion_id', 'trim|required|xss_clean');
    if ($this->form_validation->run()==false)
    {
        $this->session->set_flashdata('error','Ingrese correctamente los datos');
    }
    else {
        $data = array(
          'nombre' => $this->input->post('nombre'),
          'direccion' => $this->input->post('direccion'),
          'jurisdiccion_id' => $this->input->post('jurisdiccion_id')
        );

          $this->Jurisdiccion_model->addParroquia("parroquia",$data);


    }
    $this->load->view('template/header');
    $this->load->view('parroquia/alta_parroquia');
    $this->load->view('template/footer');

  }
  //  parte joel
  public function autoCompleteParroquia(){
        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->Jurisdiccion_model->autoCompleteParroquia($q);
        }
    }


    public function autoCompleteJurisdiccion(){
        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
           # $this->Jurisdiccion_model->autoCompleteJurisdiccion($q);
            $this->Jurisdiccion_model->autoCompleteJurisdiccion($q);
        }
    }
  /// FIN -->
}
