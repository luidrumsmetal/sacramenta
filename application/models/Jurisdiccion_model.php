<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurisdiccion_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function autoCompleteParroquia($q){
        $this->db->select('*');
        $this->db->limit(10);
        $this->db->like('nombre', $q);
        $query = $this->db->get('parroquia');
        if($query->num_rows() > 0){
            foreach ($query->result_array() as $row){
                $row_set[] = array('label'=>$row['nombre'],'id'=>$row['idParroquia'], 'jurisdiccionId'=>$row['jurisdiccion_id']);
            }
            echo json_encode($row_set);
        }
        /*else {
          $row_set = "nada";
          echo json_encode($row_set);
        }*/
    }

}
