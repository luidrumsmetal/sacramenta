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
    $this->load->view('parroquia/alta_parroquia');
    $this->load->view('template/footer');
  }
  function listParroquia()
  {
    $data['title'] = 'Lista de Parroquia';
    $this->load->library('table');
        $this->load->library('pagination');


        $config['base_url'] = base_url().'jurisdiccion/listParroquia';
        $config['total_rows'] = $this->Jurisdiccion_model->count('parroquia');
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
    $data['results']= $this->Jurisdiccion_model->listGet('parroquia','idParroquia,nombre,direccion','',$config['per_page'],$this->uri->segment(3));
    $this->load->view('template/header',$data);
    $this->load->view('parroquia/listParroquia',$data);
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
          //cambio joel
          $this->session->set_flashdata('success','Parroquia registrada correctamente!');
          redirect(base_url().'jurisdiccion/listParroquia');
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
