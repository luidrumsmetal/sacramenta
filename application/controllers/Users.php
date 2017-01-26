<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('Users_model');
    $this->load->model('Jurisdiccion_model');

  }

  function index()
  {

  }

  function faithfulCreate()
  {
    $data['msj_error'] = '';
    $this->load->view('login/header');
    $this->load->view('users/faithfulCreate',$data);
    $this->load->view('login/footer');
  }

  function listSacerdote($offset = NULL)
  {
    $data['title'] = 'Lista de Sacerdotes';
    $this->load->library('table');
        $this->load->library('pagination');

        $config['base_url'] = base_url().'users/listSacerdote';
        $config['total_rows'] = $this->Users_model->count('sacerdote','persona');
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
    $data['results']= $this->Users_model->listGetSacerdote('persona, sacerdote, tiposacerdote',' id, idSacerdote, ci, nombre, apellido, tipoSacerdote','id = persona_id AND idTipoSacerdote = tipoSacerdote_id',$config['per_page'],$this->uri->segment(3));
    $this->load->view('template/header',$data);
    $this->load->view('users/listSacerdote',$data);
    $this->load->view('template/footer');
  }


  function faithfulRegister()
  {
    $tipoUsuario = 'fiel';
    $this->load->library('form_validation');
    $this->form_validation->set_rules('ci', 'Carnet de Identidad', 'trim|required|min_length[5]|numeric|is_unique[persona.ci]|xss_clean');
    $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[2]|xss_clean');
    $this->form_validation->set_rules('apellido', 'Apellido', 'trim|required|min_length[2]|xss_clean');
    $this->form_validation->set_rules('fechanac', 'Fecha nacimineto', 'trim|required|xss_clean');
    $this->form_validation->set_rules('genero', 'Genero', 'trim|required|xss_clean');
    #$this->form_validation->set_rules('celular', 'Celular', 'trim|required|min_length[5]|max_length[12]|xss_clean');
    #$this->form_validation->set_rules('facebook', 'Facebook', 'trim|required|min_length[5]|max_length[12]|xss_clean');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]|valid_email|is_unique[users.email]|xss_clean');
    $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[5]|max_length[18]|xss_clean');
    $this->form_validation->set_message('required', 'El %s es importante');
    if ($this->form_validation->run()==false)
    {
        $this->session->set_flashdata('error','Ingrese correctamente los datos');
    }
    else {
        $data = array(
          'ci'=> $this->input->post('ci'),
          'nombre' => $this->input->post('nombre'),
          'apellido' => $this->input->post('apellido'),
          'fechanacimiento' => $this->input->post('fechanac'),
          'genero_id' => $this->input->post('genero'),
          'celular' => $this->input->post('celular'),
          'facebook' => $this->input->post('facebook')
        );
        if ($this->Users_model->personRegister('persona',$data) == TRUE)
        {
          $ci = $this->input->post('ci');
          $personWithCi = $this->Users_model->getId($ci);
          $persona_id = $personWithCi->id;
            $data = array(
              'email' => $this->input->post('email'),
              'password' => $this->input->post('password'),
              'tipoUsuario' => $tipoUsuario,
              'persona_id' => $persona_id
            );
            if ($this->Users_model->usersRegister('users', $data) == TRUE) {
              $this->session->set_flashdata('success ','Fiel Registrado correctamente!');
              redirect(base_url() . 'login');
            }
            else
            {
              $this->session->set_flashdata('error ','Error al registrar su informacion de la cuenta');
              redirect(base_url() . 'login/faithfulCreate');
            }
        }
        else
        {
          $this->session->set_flashdata('error ','Error al registrar su informacion personal');
          redirect(base_url() . 'login/faithfulCreate');
        }
    }
    $this->load->view('login/header');
    $this->load->view('users/faithfulCreate');
    $this->load->view('login/footer');
  }

  function priestRegister()
  {
    $tipoUsuario = 'sacerdote';
    #$this->load->library('form_validation');
    $this->form_validation->set_rules('ci', 'Carnet de Identidad', 'trim|required|min_length[5]|numeric|is_unique[persona.ci]|xss_clean');
    $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[2]|xss_clean');
    $this->form_validation->set_rules('apellido', 'Apellido', 'trim|required|min_length[2]|xss_clean');
    $this->form_validation->set_rules('fechanac', 'Fecha nacimineto', 'trim|required|xss_clean');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]|valid_email|is_unique[users.email]|xss_clean');
    $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[5]|max_length[18]|xss_clean');
    $this->form_validation->set_rules('parroquia_id', 'Parroquia', 'trim|required|xss_clean');
    $this->form_validation->set_rules('tipoSacerdote_id', 'Contraseña', 'trim|required|xss_clean');
    $this->form_validation->set_message('required', 'El %s es importante');
    if ($this->form_validation->run() == FALSE)
    {
        $this->session->set_flashdata('error','Ingrese correctamente los datos');
        redirect(base_url() . 'home/priestCreate');
    }
    else {
        $genero = '1'; #masculino
        $data = array(
          'ci'=> $this->input->post('ci'),
          'nombre' => $this->input->post('nombre'),
          'apellido' => $this->input->post('apellido'),
          'fechanacimiento' => $this->input->post('fechanac'),
          'genero_id' => $genero
        );
        if ($this->Users_model->personRegister('persona',$data) ==  TRUE)
        {
            $ci = $this->input->post('ci');
            $personWithCi = $this->Users_model->getId($ci);
            $persona_id = $personWithCi->id;
            $data = array(
              'email' => $this->input->post('email'),
              'password' => $this->input->post('password'),
              'tipoUsuario' => $tipoUsuario,
              'persona_id' => $persona_id
            );
            if ($this->Users_model->usersRegister('users',$data) == TRUE) {
                $tipoSacerdote_id = $this->input->post('tipoSacerdote_id');
                $data = array(
                  'persona_id' => $persona_id,
                  'tipoSacerdote_id' => $tipoSacerdote_id
                );
                if ($this->Users_model->priestRegister('sacerdote', $data) == TRUE) {
                    $this->session->set_flashdata('success','Sacerdote Registrado correctamente!');
                    redirect(base_url() . 'home/priestCreate');
                }
                else {
                    $this->session->set_flashdata('error','Error al registrar su informacion de la cuenta (tipo sacerdote)');
                    redirect(base_url() . 'home/priestCreate');
                }

            }
            else {
                $this->session->set_flashdata('error','Error al registrar su informacion de la cuenta (users)');
                redirect(base_url() . 'home/priestCreate');
            }
        }
        else {
            $this->session->set_flashdata('error','Error al registrar su informacion de la cuenta (persona)');
            redirect(base_url() . 'home/priestCreate');
        }
    }

  }

  function sacerdoteEdit() {
    $kd = $this->uri->segment(3);
    if ($kd == NULL) {
      redirect('users');
    }
     $dt = $this->Users_model->edit($kd);
     $data1['ci'] = $dt->ci;
     $data1['fechanacimiento'] = $dt->fechanacimiento;
     $data1['nombre'] = $dt->nombre;
     $data1['apellido'] = $dt->apellido;
     //$data1['parroquia'] = $dt->parroquia_id;
     $data1['tipoSacerdote'] = $dt->tipoSacerdote;
     $data1['email'] = $dt->email;
     $data1['password'] = $dt->password;
     $data1['id'] = $kd;

        $this->load->view('template/header');
        $this->load->view('users/sacerdoteEdit', $data1);
        $this->load->view('template/footer');

  }

  function update() {

    if ($this->input->post('mit')) {

      $idSacerdote = $this->input->post('idSacerdote');
      $this->Users_model->update($idSacerdote);

      redirect('users');
    } else{
      redirect('users/sacerdoteEdit/'.$idSacerdote);
    }
    
  }

  function autoCompleteCarnetPadre(){
      if (isset($_GET['term'])) {
          $data = strtolower($_GET['term']);
          $this->Users_model->autoCompleteCarnetPadre($data);
      }
  }
  function autoCompleteCarnetMadre(){
      if (isset($_GET['term'])) {
          $data = strtolower($_GET['term']);
          $this->Users_model->autoCompleteCarnetMadre($data);
      }
  }
  function autoCompleteCarnetPadrino(){
      if (isset($_GET['term'])) {
          $data = strtolower($_GET['term']);
          $this->Users_model->autoCompleteCarnetPadre($data);
      }
  }
  function autoCompleteCarnetMadrina(){
      if (isset($_GET['term'])) {
          $data = strtolower($_GET['term']);
          $this->Users_model->autoCompleteCarnetMadre($data);
      }
  }

  function autoCompleteCarnetMatrimonioEsposo(){
      if (isset($_GET['term'])) {
          $data = strtolower($_GET['term']);
          $this->Users_model->autoCompleteCarnetMatrimonioEsposo($data);
      }
  }

  function autoCompleteCarnetMatrimonioEsposa(){
      if (isset($_GET['term'])) {
          $data = strtolower($_GET['term']);
          $this->Users_model->autoCompleteCarnetMatrimonioEsposa($data);
      }
  }

  function autoCompleteCarnetCommunion(){
      if (isset($_GET['term'])) {
          $data = strtolower($_GET['term']);
          $this->Users_model->autoCompleteCarnetCommunion($data);
      }
  }

  function autoCompleteCarnetConfirmacion(){
      if (isset($_GET['term'])) {
          $data = strtolower($_GET['term']);
          $this->Users_model->autoCompleteCarnetConfirmacion($data);
      }
  }

  function testare()
  {
    $this->load->helper('Testare_helper');
    $ci = $this->input->post('ci');
    testare($ci);
  }

}
