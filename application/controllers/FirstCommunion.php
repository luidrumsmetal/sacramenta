<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FirstCommunion extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Sacrament_model','Users_model'));
    if (!$this->session->userdata('nombres')) {
      redirect(base_url().'login');
    }
    if ($this->session->userdata('tipo') != 'administrador') {
        if (!$this->session->userdata('nombres')) {
            redirect(base_url().'login');
        }
        else{
          redirect(base_url().'home');
        }
    }
  }

  function index()
  {
    $data['title'] = 'Registro Primera Comunion';
    $this->load->view('template/header',$data);
    $this->load->view('sacramentos/firstCommunion/firstCommunionCreate');
    $this->load->view('template/footer');
  }
  function FirstCommunionRegister()
  {
    $this->load->library('form_validation');
    #$this->form_validation->set_rules('ci_id', 'Carnet de Identidad', 'trim|required|min_length[4]|numeric|xss_clean');
    #$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[2]|xss_clean');
    #$this->form_validation->set_rules('apellido', 'Apellido', 'trim|required|min_length[2]|xss_clean');
    #$this->form_validation->set_rules('fechanac', 'Fecha nacimiento', 'trim|required|xss_clean');
    $this->form_validation->set_rules('fechacom', 'Fecha Primera Confirmacion', 'trim|required|xss_clean');
    $this->form_validation->set_rules('parroquia_id', 'Parroquia', 'trim|required|xss_clean');
    $this->form_validation->set_rules('libroOne', 'Libro', 'trim|required|xss_clean');
    $this->form_validation->set_rules('paginaOne', 'Pagina', 'trim|required|xss_clean');
    $this->form_validation->set_rules('numeroOne', 'Numero', 'trim|required|xss_clean');
    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', 'Ingrese correctamente los datos');
        redirect(base_url().'firstCommunion');
    }
    else
    {
      $persona_id = $this->input->post('feligres_id');
      $sacramento = '2';
      $celebrante = '1';
      $certificador='1';
      $parroquia_id = $this->input->post('parroquia_id');
      $data = array(
        'fecha' => $this->input->post('fechacom'),
        'persona_id' => $persona_id,
        'parroquia_id' => $parroquia_id,
        'sacramento_id' => $sacramento,
        'sacerdoteCelebrante_id'=>$celebrante,
        'sacerdoteCertificador_id'=>$certificador,
        'jurisdiccion_id' => $this->input->post('jurisdiccion_id')
      );
        if ($this->Sacrament_model->Register('certificado', $data) ==TRUE) {
          $fecha = $this->input->post('fechacom');
          $certificateWithCi = $this->Sacrament_model->getCertificate($persona_id,$fecha);
          $certificado_id = $certificateWithCi->idCertificado;
          $data = array(
            'libro' => $this->input->post('libroOne'),
            'pagina' => $this->input->post('paginaOne'),
            'numero' => $this->input->post('numeroOne'),
            'parroquia_id' => $parroquia_id,
            'certificado_id' => $certificado_id
          );
            if ($this->Sacrament_model->Register('libroparroquia',$data) == TRUE) {
                $this->session->set_flashdata('success','Primera Comunion registrado correctamente!');
                redirect(base_url() . 'firstCommunion');
            }
            else
            {
              $this->session->set_flashdata('error', 'Ingrese correctamente los datos (libro)');
              redirect(base_url().'firstCommunion');
            }
        }
        else
        {
          $this->session->set_flashdata('error', 'Ingrese correctamente los datos (certificado)');
          redirect(base_url().'firstCommunion');
        }
    }
  }

  public function autoCompleteFeligres(){
        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->Sacrament_model->autoCompleteFeligres($q);
        }
    }  
    

}
