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
  function autoCompleteCarnetPadre($data)
  {
    $this->db->select('*');
    $this->db->limit(5);
    $this->db->like('ci',$data);
    $this->db->where('genero_id','1');
    $query = $this->db->get('persona');
    if ($query->num_rows() > 0) {
      foreach ($query->result_array() as $row){
          $row_set[] = array('label'=>'Carnet de Identidad: '.$row['ci'],'id'=>$row['id'], 'ci'=>$row['ci'], 'nombre'=>$row['nombre'].' '.$row['apellido']);
      }
      echo json_encode($row_set);
    }
  }
  function autoCompleteCarnetMadre($data)
  {
    $this->db->select('*');
    $this->db->limit(5);
    $this->db->like('ci',$data);
    $this->db->where('genero_id','2');
    $query = $this->db->get('persona');
    if ($query->num_rows() > 0) {
      foreach ($query->result_array() as $row){
          $row_set[] = array('label'=>'Carnet de Identidad: '.$row['ci'],'id'=>$row['id'], 'ci'=>$row['ci'], 'nombre'=>$row['nombre'].' '.$row['apellido']);
      }
      echo json_encode($row_set);
    }
  }
  function autoCompleteCarnetPadrino($data)
  {
    $this->db->select('*');
    $this->db->limit(5);
    $this->db->like('ci',$data);
    $this->db->where('genero_id','1');
    $query = $this->db->get('persona');
    if ($query->num_rows() > 0) {
      foreach ($query->result_array() as $row){
          $row_set[] = array('label'=>'Carnet de Identidad: '.$row['ci'],'id'=>$row['id'], 'ci'=>$row['ci'], 'nombre'=>$row['nombre'].' '.$row['apellido']);
      }
      echo json_encode($row_set);
    }
  }
  function autoCompleteCarnetCommunion($data)
  {
    $query = $this->db->query("SELECT * FROM persona a, certificado b, sacramento c WHERE a.ci = '$data' AND c.sacramento = 'bautizo' AND a.id = b.persona_id AND b.sacramento_id = c.idSacramento");
    if ($query->num_rows() > 0 ) {
      foreach ($query->result_array() as $row){
          $row_set[] = array('label'=>'Carnet de Identidad: '.$row['ci'],'id'=>$row['id'], 'ci'=>$row['ci'], 'nombre'=>$row['nombre'], 'apellido'=>$row['apellido'],'fechanac'=>$row['fechanacimiento']);
      }
      echo json_encode($row_set);
    }
    else {
      $row_set[] = array('label'=>'Carnet de identidad no valido');
      echo json_encode($row_set);
    }

  }

  function autoCompleteCarnetConfirmacion($data)
  {
    $query = $this->db->query("SELECT * FROM persona a, certificado b, sacramento c WHERE a.ci = '$data' AND c.idSacramento = '2' AND a.id = b.persona_id AND b.sacramento_id = c.idSacramento");
    if ($query->num_rows() > 0 ) {
      foreach ($query->result_array() as $row){
          $row_set[] = array('label'=>'Carnet de Identidad: '.$row['ci'],'id'=>$row['id'], 'ci'=>$row['ci'], 'nombre'=>$row['nombre'], 'apellido'=>$row['apellido'],'fechanac'=>$row['fechanacimiento']);
      }
      echo json_encode($row_set);
    }
    else {
      $row_set[] = array('label'=>'Carnet de identidad no valido');
      echo json_encode($row_set);
    }

  }


}
