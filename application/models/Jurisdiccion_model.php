<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurisdiccion_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  function autoCompleteParroquia($data)
  {
    $this->db->select('*');
    $this->db->limit('10');
    $this->db->like('nombre',$data);
    $consult = $this->db->get('parroquia');
      if ($consult->num_rows > 0) {
        foreach ($consult->result_array() as $row){
              $row_set[] = array('label'=>$row['nombre'],'id'=>$row['idParroquia'], 'jurisdiccion_id'=>$row['jurisdiccion_id']);
          }
          echo json_encode($row_set);
      }
  }

}
