<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sacrament_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  protected function Register($table, $data)
  {
    $this->db->insert($table, $data);
    if ($this->db->affected_rows() == '1')
    {
      return TRUE;
    }
    return FALSE;
  }
  public function getCertificate($persona_id,$fecha)
  {
    $this->db->select('*');
    $this->db->where('fecha', $fecha);
    $this->db->where('persona_id', $persona_id);
    $consult = $this->db->get('certificado');
      if ($consult->num_rows()>0) {
        return $query->row();
      }
      else
      {
        return false;
      }
  }

}
