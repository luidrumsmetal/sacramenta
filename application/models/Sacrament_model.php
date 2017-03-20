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

    function editBaptism($uri) {
      $this->db->select('*, CONCAT(persona.apellidoPaterno," ",persona.apellidoMaterno," ",persona.nombres) as Fiel, persona.id as idFiel ,CONCAT(C.apellidoPaterno, " ",C.apellidoMaterno," ",C.nombres) as Sacerdote_certificador, A.idSacerdote as sacerdoteCertificador, 
                        C.id as personaCertificador  , CONCAT(D.apellidoPaterno, " ",D.apellidoMaterno," ",D.nombres) as Sacerdote_certificante, B.idSacerdote as sacerdoteCertificante,
                        D.id as personaCertificante, padrinofiel.apellidosNombres as padrino, padrinofiel.idPadrinoFiel as idPadrino');
      $this->db->from('certificado');
      $this->db->join('persona', 'persona.id = certificado.persona_id');
      $this->db->join('sacramento', 'sacramento.idSacramento = certificado.sacramento_id');
      $this->db->join('parroquia', 'parroquia.idParroquia = certificado.parroquia_id');
      $this->db->join('jurisdiccion', 'jurisdiccion.idJurisdiccion = certificado.jurisdiccion_id');
      $this->db->join('sacerdote A', 'A.idSacerdote = certificado.sacerdoteCertificador_id');
      $this->db->join('sacerdote B', 'B.idSacerdote = certificado.sacerdoteCelebrante_id');
      $this->db->join('persona C', 'C.id = A.persona_id');
      $this->db->join('persona D', 'D.id = B.persona_id');
      $this->db->join('libroparroquia','certificado_id=idCertificado');
      $this->db->join('padrinofiel','padrinofiel.certificado_id=idCertificado');
      $this->db->where('certificado.idCertificado', $uri);
      return $this->db->get()->row();
  }

  function editMatrimonio($uri) {
      $this->db->select('*, CONCAT(persona.apellidoPaterno," ",persona.apellidoMaterno," ",persona.nombres) as Esposo, persona.id as esposo_id ,CONCAT(C.apellidoPaterno, " ",C.apellidoMaterno," ",C.nombres) as Sacerdote_certificador, A.idSacerdote as sacerdoteCertificador, 
                        C.id as personaCertificador  , CONCAT(D.apellidoPaterno, " ",D.apellidoMaterno," ",D.nombres) as Sacerdote_certificante, B.idSacerdote as sacerdoteCertificante,
                        D.id as personaCertificante, padrinofiel.apellidosNombres as padrino, padrinofiel.idPadrinoFiel as idPadrino');
      $this->db->from('certificado');
      $this->db->join('persona', 'persona.id = certificado.persona_id');
      $this->db->join('sacramento', 'sacramento.idSacramento = certificado.sacramento_id');
      $this->db->join('parroquia', 'parroquia.idParroquia = certificado.parroquia_id');
      $this->db->join('jurisdiccion', 'jurisdiccion.idJurisdiccion = certificado.jurisdiccion_id');
      $this->db->join('sacerdote A', 'A.idSacerdote = certificado.sacerdoteCertificador_id');
      $this->db->join('sacerdote B', 'B.idSacerdote = certificado.sacerdoteCelebrante_id');
      $this->db->join('persona C', 'C.id = A.persona_id');
      $this->db->join('persona D', 'D.id = B.persona_id');
      $this->db->join('libroparroquia','certificado_id=idCertificado');
      $this->db->join('padrinofiel','padrinofiel.certificado_id=idCertificado');
      $this->db->where('certificado.idCertificado', $uri);
      return $this->db->get()->row();
  }
    function editFirst($uri)
    {
        $this->db->select('certificado.*, CONCAT(persona.apellidoPaterno," ",persona.apellidoMaterno," ",persona.nombres) as Fiel, persona.id as idPersona, 
        parroquia.nombre as parroquia, jurisdiccion.*, libroparroquia.*');
        $this->db->from('certificado');
        $this->db->join('persona', 'persona.id = certificado.persona_id');
        $this->db->join('sacramento', 'sacramento.idSacramento = certificado.sacramento_id');
        $this->db->join('parroquia', 'parroquia.idParroquia = certificado.parroquia_id');
        $this->db->join('jurisdiccion', 'jurisdiccion.idJurisdiccion = certificado.jurisdiccion_id');
        $this->db->join('libroparroquia','certificado_id=certificado.idCertificado');
        $this->db->where('certificado.idCertificado', $uri);
        return $this->db->get()->row();
    }
    function editConfirmacion($uri)
    {
        $this->db->select('*, CONCAT(persona.apellidoPaterno," ",persona.apellidoMaterno," ",persona.nombres) as Fiel, persona.id as idFiel,
         CONCAT(C.apellidoPaterno, " ",C.apellidoMaterno," ",C.nombres) as Sacerdote_certificador, A.idSacerdote as sacerdoteCertificador,  C.id as personaCertificador  , CONCAT(D.apellidoPaterno, " ",D.apellidoMaterno," ",D.nombres) as Sacerdote_certificante, B.idSacerdote as sacerdoteCertificante' );
      $this->db->from('certificado');
      $this->db->join('persona', 'persona.id = certificado.persona_id');
      $this->db->join('sacramento', 'sacramento.idSacramento = certificado.sacramento_id');
      $this->db->join('parroquia', 'parroquia.idParroquia = certificado.parroquia_id');
      $this->db->join('jurisdiccion', 'jurisdiccion.idJurisdiccion = certificado.jurisdiccion_id');
      $this->db->join('sacerdote A', 'A.idSacerdote = certificado.sacerdoteCertificador_id');
      $this->db->join('sacerdote B', 'B.idSacerdote = certificado.sacerdoteCelebrante_id');
      $this->db->join('persona C', 'C.id = A.persona_id');
      $this->db->join('persona D', 'D.id = B.persona_id');
      $this->db->join('libroparroquia','certificado_id=idCertificado');
      $this->db->join('padrinofiel','padrinofiel.certificado_id=idCertificado');
      $this->db->where('certificado.idCertificado', $uri);
      return $this->db->get()->row();
  }


    function update($table,$condicion, $data) {
    $this->db->where($condicion);
    $this->db->update($table, $data);
      if ($this->db->affected_rows() > 0)
      {
          return TRUE;
      }
      else
      {
          return FALSE;
      }
  }
    function delete($a) {
        $sql = "SET foreign_key_checks = 0";
        $this->db->query($sql);
        $this->db->delete('certificado', array('idCertificado' => $a));
        $sql = "SET foreign_key_checks = 1";
        $this->db->query($sql);

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
