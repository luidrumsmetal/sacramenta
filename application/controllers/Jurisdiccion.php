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

  function faithfulCreate()
  {
    $data['msj_error'] = '';
    $this->load->view('login/header');
    $this->load->view('users/faithfulCreate',$data);
    $this->load->view('login/footer');
  }

  function ParroquiaRegistro()
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
        if ($this->Users_model->personRegister('persona',$data) == TRUE)
        {
          $ci = $this->input->post('ci');
          $personWithCi = $this->Users_model->getId($ci);
          $persona_id = $personWithCi->id;
            $data = array(
              'email' => $this->input->post('email'),
              'password' => $this->input->post('password'),
              'tipoUsuario' => $tipoUsuario,
              'persona_id' => $persona_id
            );


        }

    }
    $this->load->view('login/header');
    $this->load->view('users/faithfulCreate');
    $this->load->view('login/footer');

  }
  //  parte joel
  public function autoCompleteParroquia(){
        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->Jurisdiccion_model->autoCompleteParroquia($q);
        }
    }
  /// FIN -->
}
