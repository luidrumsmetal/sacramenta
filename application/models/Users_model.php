<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }
  function checkLogin($email, $password)
  {

    $this->db->where('email', $email);
    $this->db->where('password', $password);
    $consult = $this->db->get('users');
      if ($consult->num_rows()>0) {
        #$dato = array('tipo' => $usuario->tipoUsuario, 'id' => $usuario->idUsuarios,'permissao' => $usuario->permissoes_id , 'logado' => TRUE);
        #$this->session->set_userdata($datos);
        return true;
      }
      else
      {
        return false;
      }
  }

}
