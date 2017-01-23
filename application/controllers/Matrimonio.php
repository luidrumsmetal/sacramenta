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
    $this->form_validation->set_rules('lugarNacimiento', 'Lugar de Nacimiento', 'trim|required|xss_clean');
    $this->form_validation->set_rules('libroOne', 'Libro', 'trim|required|xss_clean');
    $this->form_validation->set_rules('paginaOne', 'Pagina', 'trim|required|xss_clean');
    $this->form_validation->set_rules('numeroOne', 'Numero', 'trim|required|xss_clean');
    $this->form_validation->set_rules('carnetPadrino_id', 'Carnet de identidad Padrino', 'trim|required|xss_clean');
    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', 'Ingrese correctamente los datos');
        redirect(base_url().'matrimonio');
    }
    else
    {
      $ci = $this->input->post('carnetEsposo_id');
      $personWithCi = $this->Users_model->getId($ci);
      $persona_id = $personWithCi->id;
      $sacramento = '4';
      $parroquia_id = $this->input->post('parroquia_id');
      $data = array(
        'fecha' => $this->input->post('fechacom'),
        'persona_id' => $persona_id,
        'parroquia_id' => $parroquia_id,
        'sacramento_id' => $sacramento,
        'ciudad_id' => $this->input->post('lugarNacimiento')
      );
        if ($this->Sacrament_model->Register('certificado', $data) ==TRUE) {
          $ci = $this->input->post('carnetEsposa_id');
          $personWithCi = $this->Users_model->getId($ci);
          $persona_id = $personWithCi->id;
          $sacramento = '4';
          $parroquia_id = $this->input->post('parroquia_id');
          $data = array(
            'fecha' => $this->input->post('fechacom'),
            'persona_id' => $persona_id,
            'parroquia_id' => $parroquia_id,
            'sacramento_id' => $sacramento,
            'ciudad_id' => $this->input->post('lugarNacimiento')
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
               $fecha = $this->input->post('fechacom');
               $certificateWithCi = $this->Sacrament_model->getCertificate($persona_id,$fecha);
               $certificado_id = $certificateWithCi->idCertificado;
               $data = array(
                  'oficialia' => $this->input->post('oficialia'),
                  'partida' => $this->input->post('partida'),
                  'numero' => $this->input->post('numeroOf'),
                  'certificado_id' => $certificado_id 
                );

               if ($this->Sacrament_model->Register('registrocivil',$data) == TRUE) {
                  $data = array(
                  'persona_id' => $this->input->post('carnetPadrino_id'),
                  'certificado_id' => $certificado_id
                  );
                    if ($this->Sacrament_model->Register('certificadopadrino',$data) == TRUE) {
                    $data = array(
                    'persona_id' => $this->input->post('carnetMadrina_id'),
                    'certificado_id' => $certificado_id
                    );
                      if ($this->Sacrament_model->Register('certificadopadrino',$data) == TRUE) {
                         $data = array(
                         'persona_id' => $this->input->post('carnetPadrino1_id'),
                         'certificado_id' => $certificado_id
                         );
                           if ($this->Sacrament_model->Register('certificadopadrino',$data) == TRUE) {
                           $data = array(
                           'persona_id' => $this->input->post('carnetMadrina1_id'),
                           'certificado_id' => $certificado_id
                           );
                                if ($this->Sacrament_model->Register('certificadopadrino',$data)==TRUE) {
                                  $this->session->set_flashdata('success','Matrimonio registrado correctamente!');
                                  redirect(base_url() . 'matrimonio');
                                }
                                else {
                                  $this->session->set_flashdata('error', 'Ingrese correctamente los datos (padrino)');
                                  redirect(base_url().'matrimonio');
                                }
                           }   
                          else {
                            $this->session->set_flashdata('error', 'Ingrese correctamente los datos (padrino)');
                            redirect(base_url().'matrimonio');
                          }
                      }
                      else {
                        $this->session->set_flashdata('error', 'Ingrese correctamente los datos (padrino)');
                        redirect(base_url().'matrimonio');
                      }
                    }
                else {
                  $this->session->set_flashdata('error', 'Ingrese correctamente los datos (padrino)');
                  redirect(base_url().'matrimonio');
                }
            }
            else{
              $this->session->set_flashdata('error', 'Ingrese correctamente los datos (libro)');
              redirect(base_url().'matrimonio');
            }
          }
          else{
            $this->session->set_flashdata('error', 'Ingrese correctamente los datos (oficialia)');
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