<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matrimonio extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Users_model','Sacrament_model'));
  }

  function index()
  {
    $data['title'] = 'Registro Matrimonio';
    $this->load->view('template/header',$data);
    $this->load->view('sacramentos/matrimonio/matrimonioCreate');
    $this->load->view('template/footer');
  }

  function matrimonioRegister()
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
        redirect(base_url().'matrimonio');
    }
    else
    {
      $ci = $this->input->post('esposo_id');
      $personWithCi = $this->Users_model->getId($ci);
      $persona_id = $personWithCi->id;
      $sacramento = '4';
      $parroquia_id = $this->input->post('parroquia_id');
      $jurisdiccion_id = $this->input->post('jurisdiccion_id');
      $sacerdoteCelebrante_id = $this->input->post('sacerdoteCelebrante_id');
      $sacerdoteCertificador_id = $this->input->post('sacerdoteCertificador_id');
      $data = array(
        'fecha' => $this->input->post('fechacom'),
        'persona_id' => $persona_id,
        'parroquia_id' => $parroquia_id,
        'sacramento_id' => $sacramento,
        'jurisdiccion_id' => $jurisdiccion_id,
        'sacerdoteCelebrante_id' => $sacerdoteCelebrante_id,
        'sacerdoteCertificador_id' => $sacerdoteCertificador_id
      );
        if ($this->Sacrament_model->Register('certificado', $data) ==TRUE) {
          $ci = $this->input->post('esposa_id');
          $personWithCi = $this->Users_model->getId($ci);
          $persona_id = $personWithCi->id;
          $sacramento = '4';
          $parroquia_id = $this->input->post('parroquia_id');
          $jurisdiccion_id = $this->input->post('jurisdiccion_id');
          $sacerdoteCelebrante_id = $this->input->post('sacerdoteCelebrante_id');
          $sacerdoteCertificador_id = $this->input->post('sacerdoteCertificador_id');
          $data = array(
            'fecha' => $this->input->post('fechacom'),
            'persona_id' => $persona_id,
            'parroquia_id' => $parroquia_id,
            'sacramento_id' => $sacramento,
            'jurisdiccion_id' => $jurisdiccion_id,
            'sacerdoteCelebrante_id' => $sacerdoteCelebrante_id,
            'sacerdoteCertificador_id' => $sacerdoteCertificador_id
          );
            if ($this->Sacrament_model->Register('certificado',$data) == TRUE) {
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
               $certificateWithCi = $this->Sacrament_model->getCertificate($persona_id,$fecha);
               $certificado_id = $certificateWithCi->idCertificado;
               $data = array(
                  'oficialia' => $this->input->post('oficialia'),
                  'partida' => $this->input->post('partida'),
                  'numero' => $this->input->post('numeroOf'),
                  'certificado_id' => $certificado_id 
                );
                    if ($this->Sacrament_model->Register('registrocivil',$data) == TRUE) {
                    $certificateWithCi = $this->Sacrament_model->getCertificate($persona_id,$fecha);
                    $certificado_id = $certificateWithCi->idCertificado;
                    $data = array(
                    'apellidosNombres' => $this->input->post('nombrePadrino'),
                    'certificado_id' => $certificado_id
                    );
                    $data1 = array(
                    'apellidosNombres' => $this->input->post('nombreMadrina'),
                    'certificado_id' => $certificado_id
                    );
                    $data2 = array(
                    'apellidosNombres' => $this->input->post('nombreTestigo'),
                    'certificado_id' => $certificado_id
                    );
                    $data3 = array(
                    'apellidosNombres' => $this->input->post('nombreTestigoseg'),
                    'certificado_id' => $certificado_id
                    );
                        if ( $this->Sacrament_model->Register('padrinofiel',$data)==TRUE && $this->Sacrament_model->Register('padrinofiel',$data1)==TRUE && $this->Sacrament_model->Register('padrinofiel',$data2)==TRUE && $this->Sacrament_model->Register('padrinofiel',$data3)==TRUE) {
                            $this->session->set_flashdata('success','Matrimonio registrado correctamente!');
                            redirect(base_url() . 'matrimonio');
                          }
                  }
                  else{
                  $this->session->set_flashdata('error', 'Ingrese correctamente los datos (Registro Civil)');
                  redirect(base_url().'matrimonio');
                  }
                      
              }
              else{
              $this->session->set_flashdata('error', 'Ingrese correctamente los datos (Libro)');
              redirect(base_url().'matrimonio');
              }
      }
        else
        {
          $this->session->set_flashdata('error', 'Ingrese correctamente los datos (certificado)');
          redirect(base_url().'matrimonio');
        }
      }
      else
        {
          $this->session->set_flashdata('error', 'Ingrese correctamente los datos (certificado)');
          redirect(base_url().'matrimonio');
        }


    }
  }
}