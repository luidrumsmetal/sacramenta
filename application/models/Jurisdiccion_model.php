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

  function addParroquia($table, $data){
    $this->db->insert($table, $data);
    if ($this->db->affected_rows() == '1')
    {
      return TRUE;
    }
    return FALSE;
  }
  function autoCompleteJurisdiccion($q){
        $this->db->select('*');
        $this->db->limit(10);
        $this->db->like('jurisdiccion', $q);
        $query = $this->db->get('jurisdiccion');
        if($query->num_rows() > 0){
            foreach ($query->result_array() as $row){
                $row_set[] = array('label'=>$row['jurisdiccion'],'id'=>$row['idJurisdiccion']);
            }
            echo json_encode($row_set);
        }
        /*else {
          $row_set = "nada";
          echo json_encode($row_set);
        }*/
    }
    function autoCompleteTipoSacerdote($q){
          $this->db->select('*');
          $this->db->limit(10);
          $this->db->like('tipoSacerdote', $q);
          $query = $this->db->get('tiposacerdote');
          if($query->num_rows() > 0){
              foreach ($query->result_array() as $row){
                  $row_set[] = array('label'=>$row['tipoSacerdote'],'id'=>$row['idTipoSacerdote']);
              }
              echo json_encode($row_set);
          }
          /*else {
            $row_set = "nada";
            echo json_encode($row_set);
          }*/
      }
}
