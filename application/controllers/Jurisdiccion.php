<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurisdiccion extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('Jurisdiccion_model');
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

  }

  function parroquiaCreate()
  {
    $data['msj_error'] = '';
    $data['title'] = 'Registrar Parroquia';
    $this->load->view('template/header',$data);
    $this->load->view('parroquia/alta_parroquia');
    $this->load->view('template/footer');
  }
  function parroquiaAccount()
  {
    $data['title'] = 'Registro Cuenta Parroquia';
    $this->load->view('template/header', $data);
    $this->load->view('parroquia/create');
    $this->load->view('template/footer');
  }
  function createAccount(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'Correo Electronico', 'trim|required|min_length[2]|is_unique[users.email]|xss_clean');
    $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[2]|xss_clean');
    $this->form_validation->set_rules('parroquia_id', 'Parroquia', 'trim|required|xss_clean');
    if ($this->form_validation->run()==false)
    {
        $this->session->set_flashdata('error','Ingrese correctamente los datos');
        redirect(base_url().'jurisdiccion/parroquiaAccount');
    }
    else {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $tipoUsuario = 'parroquia';
        $parroquia_id = $this->input->post('parroquia_id');
        $data = array(
            'email' => $email,
            'password' => $password,
            'tipoUsuario' => $tipoUsuario,
            'parroquia_id' => $parroquia_id
        );
        if ($this->Jurisdiccion_model->addParroquia('users',$data)) {
          $this->session->set_flashdata('success','La cuenta se registro correctamente');
          redirect(base_url().'jurisdiccion/parroquiaAccount');
        }
        else {
          $this->session->set_flashdata('error','Ingrese correctamente los datos (datos)');
          redirect(base_url().'jurisdiccion/parroquiaAccount');
        }
    }
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
    $data['results']= $this->Jurisdiccion_model->listGet('parroquia','idParroquia,nombre,direccion,telefono, email','',$config['per_page'],$this->uri->segment(3));
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
          'telefono' => $this->input->post('telefono'),
          'email'=> $this->input->post('email'),
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

  function edit() {
    $kd = $this->uri->segment(3);
    if ($kd == NULL) {
      redirect('Jurisdiccion/listParroquia');
    }
    if ($this->form_validation->run('ParroquiaCrud') == false) {
           $data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
       } else {
           $idParroquia = $this->session->userdata('idParroquia');
           $idParroquia = $this->input->post('idParroquia');
           $data = array(
             'idParroquia' => $idParroquia,
           );
       }
    $dt = $this->Jurisdiccion_model->edit_parroquia($kd);
    $data['idParroquia'] = $dt->idParroquia;
    $data['nombre'] = $dt->nombre;
    $data['direccion'] = $dt->direccion;
    $data['telefono'] = $dt->telefono;
    $data['email'] = $dt->email;
    $data['jurisdiccion_id']=$dt->jurisdiccion_id;
    $data['jurisdiccion']=$dt->jurisdiccion;
    $this->load->view('template/header');
    $this->load->view('parroquia/edit_parroquia', $data);
    $this->load->view('template/footer');
  }

    function update() {

      $idParroquia = $this->input->post('idParroquia');
      $nombre = $this->input->post('nombre');
      $direccion = $this->input->post('direccion');
      $telefono = $this->input->post('telefono');
      $email = $this->input->post('email');
      $jurisdiccion_id = $this->input->post('jurisdiccion_id');
      $data = array(
        'idParroquia' => $idParroquia,
      'nombre' => $nombre,
      'direccion' => $direccion,
      'telefono' => $telefono,
      'email' => $email,
      'jurisdiccion_id'=>$jurisdiccion_id
        );

      if ($this->Jurisdiccion_model->update_parroquia($idParroquia,$data) == TRUE) {
        redirect(base_url().'jurisdiccion/listParroquia');
      }
      else
      {
       redirect(base_url().'jurisdiccion/listParroquia#error');
      }

  /// FIN -->
  }

    function delete() {
    $u = $this->uri->segment(3);
    $this->Jurisdiccion_model->delete($u);
    redirect('Jurisdiccion/listParroquia');
  }
}
