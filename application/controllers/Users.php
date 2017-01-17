<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }

  function faithfulCreate()
  {
    $this->load->view('login/header');
    $this->load->view('users/faithfulCreate');
    $this->load->view('login/footer');
  }
  function faithfulRegister()
  {
    $tipoUsuario = 'fiel';
    $this->load->library('form_validation');
    $this->form_validation->set_rules('ci', 'Carnet de Identidad', 'trim|required|min_length[5]|max_length[12]|numeric|is_unique[persona.ci]|xss_clean');
    $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[2]|xss_clean');
    $this->form_validation->set_rules('apellido', 'Apellido', 'trim|required|min_length[2]|xss_clean');
    $this->form_validation->set_rules('fechanac', 'Fechanac', 'trim|required|xss_clean');
    $this->form_validation->set_rules('genero', 'Genero', 'trim|required|xss_clean');
    #$this->form_validation->set_rules('celular', 'Celular', 'trim|required|min_length[5]|max_length[12]|xss_clean');
    #$this->form_validation->set_rules('facebook', 'Facebook', 'trim|required|min_length[5]|max_length[12]|xss_clean');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[25]|valid_email|is_unique[users.email]|xss_clean');
    $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[5]|max_length[12]|xss_clean');
    $data['msj_error'] = '';
    if ($this->form_validation->run()==false)
    {
        $data['msj_error'] = (validation_error() ? '<div class="form_error">'. validation_error() . '</div>': false);
    }
    else {
        $data = array(
          'ci'=> $this->input->post('ci'),
          'nombre' => $this->input->post('nombre'),
          'apellido' => $this->input->post('apellido'),
          'fechanac' => $this->input->post('fechanac'),
          'genero' => $this->input->post('genero'),
          'celular' => $this->input->post('celular'),
          'facebook' => $this->input->post('facebook')
        );
        if ($this->Users_model->personRegister('persona',$data) == TRUE)
        {
          $data = array(
            'email' => $this->input->post('email');
            'password' => $this->input->post('password');
            'tipoUsuario' => $tipoUsuario;
            'persona_id' => $persona_id;
          );
          if ($this->Users_model->usersRegister('users', $data) == TRUE) {
            $this->session->set_flashdata('éxito ',' Fiel Registrado correctamente!');
            redirect(base_url() . 'login');
          }
          else
          {
            $this->session->set_flashdata('fallo ','Error al registrar!#users');
            redirect(base_url() . 'login/faithfulCreate');
          }

        }
        else
        {
          $this->session->set_flashdata('fallo ','Error al registrar!#persona');
          redirect(base_url() . 'login/faithfulCreate');
        }
    }
  }

}
