<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FirstCommunion extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Sacrament_model','Users_model'));
    if (!$this->session->userdata('nombre')) {
      redirect(base_url().'login');
    }
    if ($this->session->userdata('tipo') != 'administrador' || $this->session->userdata('tipo') != 'parroquia') {
        if ($this->session->userdata('tipo') == 'fiel') {
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

  function listComunion($offset = NULL)
  {
    if (!$this->session->userdata('nombre')) {
      redirect(base_url().'login');
    }
    if ($this->session->userdata('tipo') != 'administrador' || $this->session->userdata('tipo') != 'parroquia') {
        if ($this->session->userdata('tipo') == 'fiel') {
            redirect(base_url().'home');
        }
    }
    $data['title'] = 'Lista de Primera Comunión';
        $idParroquia = $this->session->userdata('id');
    $this->load->library('table');
        $this->load->library('pagination');

        $config['base_url'] = base_url().'baptism/listBaptism';
        $config['total_rows'] = $this->Users_model->count_parroquia('certificado',$idParroquia);
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

    $data['results']= $this->Sacrament_model->listGetSacramento('persona, certificado',' id, idCertificado, fecha, nombres',"id = persona_id AND sacramento_id = 2 AND parroquia_id = $idParroquia",$config['per_page'],$this->uri->segment(3));
    $this->load->view('template/header',$data);
    $this->load->view('sacramentos/baptism/baptismList',$data);
    $this->load->view('template/footer');
  }

  public function autoCompleteFeligres(){
        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->Sacrament_model->autoCompleteFeligres($q);
        }
    }


}
