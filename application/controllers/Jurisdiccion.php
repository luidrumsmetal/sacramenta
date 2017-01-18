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
    $this->load->view('template/header');
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

        //COMPROBAMOS QUE TODOS LOS CAMPOS TENGAN DATOS

        if(isset($nombre) && !empty($nombre) && isset($jurisdiccion_id) && !empty($jurisdiccion_id)){

          //SI LOS CAMPOS ESTAN CORRECTOS LOS INSERTAMOS EN LA BASE DE DATOS
          //LLAMAMOS AL MODELO Clientes_model QUE SE ENCARGARÁ DE INGRESAR LOS DATOS

          $this->Jurisdiccion_model->addParroquia("parroquia",$data);
         
          redirect(base_url("jurisdiccion/agreagar_parroquia"));

        }

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
  /// FIN -->
}
