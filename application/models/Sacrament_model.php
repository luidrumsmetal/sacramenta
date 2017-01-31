<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sacrament_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function Register($table, $data)
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
        return $consult->row();
      }
      else
      {
        return false;
      }
  }

  public function autoCompleteFeligres($q){
        $this->db->select('*');
        $this->db->limit(10);
        $this->db->like('nombres', $q);
        $query = $this->db->get('persona');
        if($query->num_rows() > 0){
            foreach ($query->result_array() as $row){
                $row_set[] = array('label'=>$row['nombres'].' '.$row['apellidoPaterno'].' '.$row['apellidoMaterno'],'apellidop'=>$row['apellidoPaterno'], 'apellidom'=>$row['apellidoMaterno']);
            }
            echo json_encode($row_set);
        }
        /*else {
          $row_set = "nada";
          echo json_encode($row_set);
        }*/
    } 



}
