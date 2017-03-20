<?php
class Pdf_Model extends CI_Model
{
    function getCertificado($uri)
    {
      $this->db->select('*');
      $this->db->from('certificado');
      $this->db->join('persona', 'persona.id = certificado.persona_id');
      $this->db->where('certificado.idCertificado', $uri);
      return $this->db->get()->row();
  
      

    }
}