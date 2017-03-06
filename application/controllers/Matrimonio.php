<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matrimonio extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Users_model','Sacrament_model'));
    if (!$this->session->userdata('nombre')) {
      redirect(base_url().'login');
    }
    if ($this->session->userdata('tipo') != 'administrador' || $this->session->userdata('tipo') != 'parroquia') {
        if ($this->session->userdata('tipo') == 'fiel') {
            redirect(base_url().'home');
        }
    }
    /*if ($this->session->userdata('tipo') != 'administrador') {
        if (!$this->session->userdata('nombre')) {
            redirect(base_url().'login');
        }
        else{
          redirect(base_url().'home');
        }
    }*/
  }

  function index()
  {
    $data['title'] = 'Registro Matrimonio';
    $this->load->view('template/header',$data);
    $this->load->view('sacramentos/matrimonio/matrimonioCreate');
    $this->load->view('template/footer');
  }
    function listMarried($offset = NULL)
    {
        if (!$this->session->userdata('nombre')) {
            redirect(base_url().'login');
        }
        if ($this->session->userdata('tipo') != 'administrador' || $this->session->userdata('tipo') != 'parroquia') {
            if ($this->session->userdata('tipo') == 'fiel') {
                redirect(base_url().'home');
            }
        }
        $data['title'] = 'Lista de Matrimonios';
        $idParroquia = $this->session->userdata('id');
        $sacramento = 4;
        $this->load->library('table');
        $this->load->library('pagination');
        $config['base_url'] = base_url().'matrimonio/listMarried';
        if($this->session->userdata('tipo') == 'administrador')
        {
            $config['total_rows'] = $this->Users_model->count_administrador('certificado',$sacramento);
        }
        else
        {
            $config['total_rows'] = $this->Users_model->count_parroquia('certificado',$idParroquia);
        }
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
        $config['first_link'] = 'Primera';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        if($this->session->userdata('tipo') == 'administrador')
        {
            $data['results']= $this->Sacrament_model->listGetSacramento('persona, certificado',' id, idCertificado, fecha, nombres, apellidoPaterno,apellidoMaterno, genero',"id = persona_id AND sacramento_id = 4",$config['per_page'],$this->uri->segment(3));

        }
        else
        {
            $data['results']= $this->Sacrament_model->listGetSacramento('persona, certificado',' id, idCertificado, fecha, nombres, apellidoPaterno,apellidoMaterno, genero',"id = persona_id AND sacramento_id = 4 AND parroquia_id = $idParroquia",$config['per_page'],$this->uri->segment(3));
        }
        $this->load->view('template/header',$data);
        $this->load->view('sacramentos/matrimonio/matrimonioList',$data);
        $this->load->view('template/footer');
    }
    public function edit() {
        $uri = $this->uri->segment(3);
        $data['title'] = 'Matrimonio';
        $data['get'] = $this->Sacrament_model->editBaptism($uri); //cambiar
        #echo $data['get'].'<br>';
        # print_r($data['get']);
        $this->load->view('template/header',$data);
        $this->load->view('sacramentos/matrimonio/matrimonioEdit', $data);
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
      $persona_id = $this->input->post('esposo_id');
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
          $persona_id = $this->input->post('esposa_id');
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
                    $padrino = $this->input->post('nombrePadrino');
                    $madrina = $this->input->post('nombreMadrina');
                    $testigo = $this->input->post('nombreTestigo');
                    $testigoseg = $this->input->post('nombreTestigoseg');
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
                    if ($testigo != null ) {
                        $data = array(
                            'apellidosNombres' => $testigo,
                            'certificado_id' => $certificado_id
                        );
                        $this->Users_model->personRegister('padrinofiel',$data);
                    }
                    if ($testigoseg != null ) {
                        $data = array(
                            'apellidosNombres' => $testigoseg,
                            'certificado_id' => $certificado_id
                        );
                        $this->Users_model->personRegister('padrinofiel',$data);
                    }

                    $this->session->set_flashdata('success','Matrimonio Registrado correctamente!');
                    redirect(base_url() . 'matrimonio');
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
