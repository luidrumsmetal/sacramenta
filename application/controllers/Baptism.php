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
    #$this->load->library('form_validation');
    $this->form_validation->set_rules('feligres_id', 'Nombre o Apellido', 'trim|required|xss_clean');
    $this->form_validation->set_rules('fechabautismo', 'Fecha Bautizo', 'trim|required|xss_clean');
    $this->form_validation->set_rules('parroquia_id', 'Parroquia', 'trim|required|xss_clean');
    $this->form_validation->set_rules('jurisdiccion_id', 'jurisdiccion', 'trim|required|xss_clean');
    $this->form_validation->set_rules('sacerdoteCelebrante_id', 'Sacerdote Celebrante', 'trim|required|xss_clean');
    $this->form_validation->set_rules('sacerdoteCertificador_id', 'Sacerdote Certificante', 'trim|required|xss_clean');
    $this->form_validation->set_rules('libroOne', 'Libro', 'trim|required|xss_clean');
    $this->form_validation->set_rules('paginaOne', 'Pagina', 'trim|required|xss_clean');
    $this->form_validation->set_rules('numeroOne', 'Numero', 'trim|required|xss_clean');
    if ($this->form_validation->run() == FALSE)
    {
      $this->session->set_flashdata('error', 'Ingrese correctamente los datos');
      redirect(base_url().'baptism/baptismCreate');
    }
    else {
          $persona_id = $this->input->post('feligres_id');
          $sacramento = '1';
          $parroquia_id = $this->input->post('parroquia_id');
          $data = array(
            'fecha' => $this->input->post('fechabautismo'),
            'persona_id' => $persona_id,
            'parroquia_id' => $parroquia_id,
            'sacramento_id' => $sacramento,
            'sacerdoteCertificador_id' => $this->input->post('sacerdoteCertificador_id'),
            'sacerdoteCelebrante_id' => $this->input->post('sacerdoteCelebrante_id'),
            'idJurisdiccion_id' => $this->input->post('jurisdiccion_id')
          );
          //registramos el certificado
            if ($this->Sacrament_model->Register('certificado', $data) == TRUE) {
              $fecha = $this->input->post('fechabautismo');
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
                    $padrino = $this->input->post('apellidoNombrePadrino');
                    $madrina = $this->input->post('apellidoNombreMadrina');
                    if ($padrino != null ) {
                        $data = array(
                            'apellidosNombres' => $padrino,
                            'certificado_id' => $certificado_id
                        );
                        $this->Users_model->personRegister('padrinofiel',$data);
                    }
                    if ($madrina != null ) {
                        $data = array(
                            'apellidosNombres' => $madrina,
                            'certificado_id' => $certificado_id
                        );
                        $this->Users_model->personRegister('padrinofiel',$data);
                    }
                    $this->session->set_flashdata('success','Bautizo Registrado correctamente!');
                    redirect(base_url() . 'baptism/baptismCreate');
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

  }

}
