<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmacion extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->load->model(array('Sacrament_model','Users_model'));
  }

  function index()
  {
    $data['title'] = 'Registro Confirmacion';
    $this->load->view('template/header',$data);
    $this->load->view('sacramentos/confirmacion/confirmacionCreate');
    $this->load->view('template/footer');
  }
  function confirmacionRegister()
  {
    $this->load->library('form_validation');
    #$this->form_validation->set_rules('ci_id', 'Carnet de Identidad', 'trim|required|min_length[4]|numeric|xss_clean');
    #$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[2]|xss_clean');
    #$this->form_validation->set_rules('apellido', 'Apellido', 'trim|required|min_length[2]|xss_clean');
    #$this->form_validation->set_rules('fechanac', 'Fecha nacimiento', 'trim|required|xss_clean');
    $this->form_validation->set_rules('fechacom', 'Fecha Primera Confirmacion', 'trim|required|xss_clean');
    $this->form_validation->set_rules('parroquia_id', 'Parroquia', 'trim|required|xss_clean');
    $this->form_validation->set_rules('lugarNacimiento', 'Lugar de Nacimiento', 'trim|required|xss_clean');
    $this->form_validation->set_rules('libroOne', 'Libro', 'trim|required|xss_clean');
    $this->form_validation->set_rules('paginaOne', 'Pagina', 'trim|required|xss_clean');
    $this->form_validation->set_rules('numeroOne', 'Numero', 'trim|required|xss_clean');
    $this->form_validation->set_rules('carnetPadrino_id', 'Carnet de identidad Padrino', 'trim|required|xss_clean');
    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', 'Ingrese correctamente los datos');
        redirect(base_url().'confirmacion');
    }
    else
    {
      $ci = $this->input->post('ci_id');
      $personWithCi = $this->Users_model->getId($ci);
      $persona_id = $personWithCi->id;
      $sacramento = '3';
      $parroquia_id = $this->input->post('parroquia_id');
      $data = array(
        'fecha' => $this->input->post('fechacom'),
        'persona_id' => $persona_id,
        'parroquia_id' => $parroquia_id,
        'sacramento_id' => $sacramento,
        'ciudad_id' => $this->input->post('lugarNacimiento')
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
               $data = array(
                  'persona_id' => $this->input->post('carnetPadrino_id'),
                  'certificado_id' => $certificado_id
                );
                if ($this->Sacrament_model->Register('certificadopadrino',$data)==TRUE) {
                  $this->session->set_flashdata('success','Confirmacion registrado correctamente!');
                  redirect(base_url() . 'confirmacion');
                }
                else {
                  $this->session->set_flashdata('error', 'Ingrese correctamente los datos (padrino)');
                  redirect(base_url().'confirmacion');
                }
            }
            else
            {
              $this->session->set_flashdata('error', 'Ingrese correctamente los datos (libro)');
              redirect(base_url().'confirmacion');
            }
        }
        else
        {
          $this->session->set_flashdata('error', 'Ingrese correctamente los datos (certificado)');
          redirect(base_url().'confirmacion');
        }
    }
  }

}