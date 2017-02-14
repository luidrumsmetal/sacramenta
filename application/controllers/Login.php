<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('Users_model');

  }

  public function index(){
  $this->load->view('login/header');
  $this->load->view('login/index');
  $this->load->view('login/footer');
  }

  function checkLogin(){
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'Email', 'valid_email|required|xss_clean|trim');
    $this->form_validation->set_rules('password', 'Contraseña', 'required|xss_clean|trim');
    $ajax = $this->input->get('ajax');
        if ($this->form_validation->run() == false)
        {
            if($ajax == true){
                $json = array('result' => false);
                echo json_encode($json);
            }
            else{
                $this->session->set_flashdata('error','los datos de acceso son incorretos.');
                redirect($this->login);
            }
        }
        else {
          $email = $this->input->post('email');
          $password = $this->input->post('password');
          #$this->load->library('encrypt');
          #$senha = $this->encrypt->sha1($senha);
          if (!$this->Users_model->checkLogin($email,$password)==False)
          {
              if($ajax == true){
                    $json = array('result' => true);
                    echo json_encode($json);
                }
                else{
                    redirect(base_url().'home');
                }
          }
          else
          {
                if($ajax == true){
                    $json = array('result' => false);
                    echo json_encode($json);
                }
                else{
                    $this->session->set_flashdata('error','Los datos son incorrectos.');
                    redirect($this->index);
                }
            }
        }
  }

    function logout(){
    $this->session->sess_destroy();
    redirect(base_url(''));
  }
}
