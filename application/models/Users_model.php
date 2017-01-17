<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  # Verificamos si un usuario esta registrado en el sistema
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
  function personRegister($table, $data){
    $this->db->insert($table, $data);
    if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE;
  }
  function getID($ci)
  {
        $query = $this->db->get_where('persona',array('ci' => $ci));
        if($query->num_rows() > 0 )
        {
            //veamos que sólo retornamos una fila con row(), no result()
            return $query->row();
        }
  }
  function usersRegister($table, $data)
  {
    $this->db->insert($table, $data);
    if ($this->db->affected_rows() == '1') {
      return TRUE;
    }
    return FALSE;
  }

}
