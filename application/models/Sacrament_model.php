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

  function editBaptism($a,$one=false) {
      $query = $this->db->query("SELECT *
                             FROM persona a, certificado b, parroquia c, jurisdiccion d, sacerdote e, libroparroquia f
                             WHERE a.id = b.idCertificado
                             AND c.idParroquia = b.parroquia_id
                             AND d.idJurisdiccion = b.jurisdiccion_id
                             AND e.idSacerdote = b.sacerdoteCelebrante_id
                             AND e.idSacerdote = b.sacerdoteCertificador_id
                             AND f.idLibroParroquia = b.certificado_id");
                             $query = $this->db->get();
                             $result =  !$one  ? $query->result() : $query->row();
                               return $result;
  }

  function update_bautizo($idCertificado) {

    $idCertificado = $this->input->post('idCertificado');
    $nombres = $this->input->post('feligres');
    $persona_id = $this->input->post('feligres_id');
    $parroquia = $this->input->post('parroquia');
    $parroquia_id = $this->input->post('parroquia_id');
    $jurisdiccion = $this->input->post('jurisdiccion');
    $jurisdiccion_id = $this->input->post('jurisdiccion_id');
    $fecha = $this->input->post('fecha');
    $sacerdoteCelebrante_id = $this->input->post('sacerdoteCelebrante');
    $sacerdoteCertificador_id = $this->input->post('sacerdoteCertificador');
    $libro = $this->input->post('libroOne');
    $pagina = $this->input->post('paginaOne');
    $numero = $this->input->post('numeroOne');
    $apellidosNombres = $this->input->post('apellidoNombrePadrino');
    $apellidosNombres = $this->input->post('apellidoNombreMadrina');

    $data = array(
      'fecha' => $fecha,
      'persona_id' => $persona_id,
      'parroquia_id' => $parroquia_id,
      'jurisdiccion_id' => $jurisdiccion_id,
      'sacerdoteCelebrante_id' => $sacerdoteCelebrante_id,
      'sacerdoteCertificador_id' => $sacerdoteCertificador_id
    );
    $this->db->where('idCertificado', $idCertificado);
    $this->db->update('certificado', $data);

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

  function listGetSacramento($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array')
    {
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('idCertificado','asc');
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        $query = $this->db->get();
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

  function autoCompleteFeligres($q)
  {
    $query = $this->db->query("SELECT * FROM persona a, certificado b, sacramento c
                            WHERE c.idSacramento = '1'
                            AND a.id = b.persona_id
                            AND b.sacramento_id = c.idSacramento
                            AND (a.nombres LIKE '%$q%' OR a.apellidoPaterno LIKE '%$q%' OR a.apellidoMaterno LIKE '%$q%')
                            GROUP BY a.nombres  LIMIT 5");
    if ($query->num_rows() > 0 ) {
      foreach ($query->result_array() as $row){
          $row_set[] = array('label'=>'Nombre: '.$row['apellidoPaterno'].' '.$row['apellidoMaterno'].' '.$row['nombres'],'id'=>$row['id'], 'ci'=>$row['ci']);
      }
      echo json_encode($row_set);
    }
    else {
      $row_set[] = array('label'=>'Nombre no encontrado');
      echo json_encode($row_set);
    }
  }
}
