<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function getAllSacrament($sacramento)
  {
    $query = $this->db->query("SELECT a.ci, a.nombre, a.apellido,  b.ciudad_id, d.email, d.tipoUsuario FROM persona a, certificado b, sacramento c, users d WHERE  a.id = b.persona_id AND a.id = d.persona_id AND b.sacramento_id = c.idSacramento AND c.idSacramento = '$sacramento'");
      if ($query->num_rows() > 0 )
      {
        return $query->result();
      }
      else
      {
        return false;
      }
  }

}
