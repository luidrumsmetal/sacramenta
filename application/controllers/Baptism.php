<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baptism extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Users_model','Sacrament_model'));
  }

  function index()
  {

  }
  public function baptismCreate()
  {
    $data['title'] = 'Registro Bautizo';
    $this->load->view('template/header',$data);
    $this->load->view('sacramentos/baptism/baptismCreate');
    $this->load->view('template/footer');
  }

  public function baptismRegister()
  {
    $tipoUsuario = 'fiel';
    #$this->load->library('form_validation');
    $this->form_validation->set_rules('ci', 'Carnet de Identidad', 'trim|required|min_length[4]|numeric|is_unique[persona.ci]|xss_clean');
    $this->form_validation->set_rules('genero', 'Genero', 'trim|required|xss_clean');
    $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[2]|xss_clean');
    $this->form_validation->set_rules('apellido', 'Apellido', 'trim|required|min_length[2]|xss_clean');
    $this->form_validation->set_rules('fechanac', 'Fecha nacimiento', 'trim|required|xss_clean');
    $this->form_validation->set_rules('fechabat', 'Fecha Bautizo', 'trim|required|xss_clean');
    #$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]|valid_email|is_unique[users.email]|xss_clean');
    #$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[5]|max_length[18]|xss_clean');
    $this->form_validation->set_rules('parroquia_id', 'Parroquia', 'trim|required|xss_clean');
    $this->form_validation->set_rules('lugarNacimiento', 'Lugar de Nacimiento', 'trim|required|xss_clean');
    $this->form_validation->set_rules('libroOne', 'Libro', 'trim|required|xss_clean');
    $this->form_validation->set_rules('paginaOne', 'Pagina', 'trim|required|xss_clean');
    $this->form_validation->set_rules('numeroOne', 'Numero', 'trim|required|xss_clean');
    $this->form_validation->set_rules('carnetPadre_id', 'Carnet de identidad Padre', 'trim|required|xss_clean');
    $this->form_validation->set_rules('carnetMadre_id', 'Carnet de identidad Madre', 'trim|required|xss_clean');
    $this->form_validation->set_rules('carnetPadrino_id', 'Carnet de identidad Padrino', 'trim|required|xss_clean');
    if ($this->form_validation->run() == FALSE)
    {
      $this->session->set_flashdata('error', 'Ingrese correctamente los datos');
      redirect(base_url().'baptism/baptismCreate');
    }
    else {
      $data = array(
        'ci'=> $this->input->post('ci'),
        'nombre' => $this->input->post('nombre'),
        'apellido' => $this->input->post('apellido'),
        'fechanacimiento' => $this->input->post('fechanac'),
        'genero_id' => $this->input->post('genero')
      );
        if ($this->Users_model->personRegister('persona',$data) == TRUE)
        {
          $ci = $this->input->post('ci');
          $personWithCi = $this->Users_model->getId($ci);
          $persona_id = $personWithCi->id;
          $sacramento = '1';
          $parroquia_id = $this->input->post('parroquia_id');
          $data = array(
            'fecha' => $this->input->post('fechabat'),
            'persona_id' => $persona_id,
            'parroquia_id' => $parroquia_id,
            'sacramento_id' => $sacramento,
            'ciudad_id' => $this->input->post('lugarNacimiento')
          );
          //registramos el certificado
            if ($this->Sacrament_model->Register('certificado', $data) == TRUE) {
              $fecha = $this->input->post('fechabat');
              $certificateWithCi = $this->Sacrament_model->getCertificate($persona_id,$fecha);
              #echo $certificateWithCi;
              #print_r($certificateWithCi);
              $certificado_id = $certificateWithCi->idCertificado;
                $data = array(
                  'libro' => $this->input->post('libroOne'),
                  'pagina' => $this->input->post('paginaOne'),
                  'numero' => $this->input->post('numeroOne'),
                  'parroquia_id' => $parroquia_id,
                  'certificado_id' => $certificado_id
                );
                if ($this->Sacrament_model->Register('libroparroquia',$data)) {
                    $tipoPadre = 'Padre';
                    $data = array(
                      'tipoPadre' => $tipoPadre,
                      'persona_id' => $this->input->post('carnetPadre_id'),
                      'certificado_id' => $certificado_id
                    );
                    //registramos al padre
                      if ($this->Sacrament_model->Register('certificadopadre',$data) == TRUE ) {
                          $tipoPadre = 'Madre';
                          $data = array(
                            'tipoPadre' => $tipoPadre,
                            'persona_id' => $this->input->post('carnetMadre_id'),
                            'certificado_id' => $certificado_id
                          );
                          //registramos a la madre
                          if ($this->Sacrament_model->Register('certificadopadre',$data) == TRUE) {
                            $data = array(
                              'persona_id' => $this->input->post('carnetPadrino_id'),
                              'certificado_id' => $certificado_id
                            );
                              if ($this->Sacrament_model->Register('certificadopadrino',$data) == TRUE) {
                                $this->session->set_flashdata('success','Bautizo registrado correctamente!');
                                redirect(base_url() . 'baptism/baptismCreate');
                              }
                              else
                              {
                                $this->session->set_flashdata('error','Error al registrar su informacion de la cuenta (padrino)');
                                redirect(base_url() . 'baptism/baptismCreate');
                              }

                          }
                          else
                          {
                            $this->session->set_flashdata('error','Error al registrar su informacion de la cuenta (madre)');
                            redirect(base_url() . 'baptism/baptismCreate');
                          }
                      }
                      else
                      {
                        $this->session->set_flashdata('error','Error al registrar su informacion de la cuenta (padre)');
                        redirect(base_url() . 'baptism/baptismCreate');
                      }
                }
                else {
                  $this->session->set_flashdata('error','Error al registrar su informacion de la cuenta (libro)');
                  redirect(base_url() . 'baptism/baptismCreate');
                }
            }
            else
            {
              $this->session->set_flashdata('error','Error al registrar su informacion de la cuenta (certificado)');
              redirect(base_url() . 'baptism/baptismCreate');
            }
        }
        else
        {
          $this->session->set_flashdata('error','Error al registrar su informacion de la cuenta (persona)');
          redirect(base_url() . 'baptism/baptismCreate');
        }
    }

  }

}
