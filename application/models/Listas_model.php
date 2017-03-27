<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listas_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }

    function getFieles($start,$length,$search,$tipo)
    {

        $srch = "";
        if ($search) {
            $srch = "WHERE (p.nombres LIKE '%".$search."%' OR
							p.apellidoPaterno LIKE '%".$search."%' OR
							p.apellidomaterno LIKE '%".$search."%' OR
							p.ci LIKE '%".$search."%') ";
        }
        if ($tipo == 'administrador')
        {
            $qnr = "
			SELECT count(1) cant
			FROM persona p
	    	".$srch;
        }
        else{
            $idParroquia = $this->session->userdata('id');
            $qnr = "
			SELECT count(1) cant
			FROM persona p, parroquia_persona a
			WHERE a.persona_id = p.id
			AND a.parroquia_idParroquia = $idParroquia
	    	".$srch;
        }

        $qnr = $this->db->query($qnr);
        $qnr = $qnr->row();
        $qnr = $qnr->cant;

        if ($tipo == 'administrador')
        {
            $q = "
			SELECT p.id as rownum, p.*
			FROM persona p
			".$srch." LIMIT $start,$length";
        }
        else
        {
            $q = "
			SELECT p.id as rownum, p.*
			FROM persona p, parroquia_persona a
			WHERE p.id = a.persona_id
			AND a.parroquia_idParroquia = $idParroquia
			".$srch." LIMIT $start,$length";
        }

        $r = $this->db->query($q);

        $retornar = array(
            'numDataTotal' => $qnr,
            'datos' => $r
        );

        return $retornar;
    }


    function getParroquias($start,$length,$search)
    {
        $srch = "";
        if ($search) {
            $srch = "AND (p.nombre LIKE '%".$search."%' OR
							p.direccion LIKE '%".$search."%' OR
							c.jurisdiccion LIKE '%".$search."%' OR
							p.telefono LIKE '%".$search."%' OR
							p.email LIKE '%".$search."%') ";
        }

        $qnr = "
			SELECT count(1) cant
			FROM parroquia p, jurisdiccion c
			WHERE p.jurisdiccion_id = c.idJurisdiccion
		".$srch;

        $qnr = $this->db->query($qnr);
        $qnr = $qnr->row();
        $qnr = $qnr->cant;


        $q = "
			SELECT p.idParroquia as rownum, p.*, c.idJurisdiccion, c.jurisdiccion
			FROM parroquia p, jurisdiccion c
			WHERE p.jurisdiccion_id = c.idJurisdiccion
			".$srch." LIMIT $start,$length";

        $r = $this->db->query($q);

        $retornar = array(
            'numDataTotal' => $qnr,
            'datos' => $r
        );

        return $retornar;
    }

    function getBautizados($start,$length,$search,$tipo)
    {
        $srch = "";
        if ($search) {
            $srch = "AND (p.nombres LIKE '%".$search."%' OR
                            p.ci LIKE '%".$search."%' OR
                            p.apellidoPaterno LIKE '%".$search."%' OR
							              p.apellidoMaterno LIKE '%".$search."%' OR
							              p.procedencia LIKE '%".$search."%' OR
							              p.genero LIKE '%".$search."%') ";
        }

        if ($tipo == 'administrador') {
          $qnr = "
          SELECT count(1) cant
          FROM certificado c, persona p
          WHERE c.sacramento_id = 1
          AND p.id = c.persona_id
          ".$srch;
        }
        else {
          $idParroquia = $this->session->userdata('id');
          $qnr = "
          SELECT count(1) cant
          FROM certificado c, persona p
          WHERE c.sacramento_id = 1
          AND p.id = c.persona_id
          AND c.parroquia_id = $idParroquia
          ".$srch;
        }

        $qnr = $this->db->query($qnr);
        $qnr = $qnr->row();
        $qnr = $qnr->cant;

          if ($tipo == 'administrador') {
            $q = "
            SELECT c.idCertificado as rownum, p.*, c.*, a.*
            FROM persona p, certificado c, parroquia a
            WHERE c.sacramento_id = 1
            AND p.id = c.persona_id
            AND a.idParroquia = c.parroquia_id
            ".$srch." LIMIT $start,$length";
          }
          else {
            $q = "
            SELECT c.idCertificado as rownum, p.*, c.*, a.*
            FROM persona p, certificado c, parroquia a
            WHERE c.sacramento_id = 1
            AND p.id = c.persona_id
            AND a.idParroquia = c.parroquia_id
            AND c.parroquia_id = $idParroquia
            ".$srch." LIMIT $start,$length";
          }

        $r = $this->db->query($q);

        $retornar = array(
            'numDataTotal' => $qnr,
            'datos' => $r
        );

        return $retornar;
    }
    function getComunion($start,$length,$search,$tipo)
    {
        $srch = "";
        if ($search) {
            $srch = "AND (p.nombres LIKE '%".$search."%' OR
                            p.ci LIKE '%".$search."%' OR
                            p.apellidoPaterno LIKE '%".$search."%' OR
							              p.apellidoMaterno LIKE '%".$search."%' OR
							              p.procedencia LIKE '%".$search."%' OR
							              p.genero LIKE '%".$search."%') ";
        }

        if ($tipo == 'administrador') {
          $qnr = "
          SELECT count(1) cant
          FROM certificado c, persona p
          WHERE c.sacramento_id = 2
          AND p.id = c.persona_id
          ".$srch;
        }
        else {
          $idParroquia = $this->session->userdata('id');
          $qnr = "
          SELECT count(1) cant
          FROM certificado c, persona p
          WHERE c.sacramento_id = 2
          AND p.id = c.persona_id
          AND c.parroquia_id = $idParroquia
          ".$srch;
        }

        $qnr = $this->db->query($qnr);
        $qnr = $qnr->row();
        $qnr = $qnr->cant;

          if ($tipo == 'administrador') {
            $q = "
            SELECT c.idCertificado as rownum, p.*, c.*, a.*
            FROM persona p, certificado c, parroquia a
            WHERE c.sacramento_id = 2
            AND p.id = c.persona_id
            AND a.idParroquia = c.parroquia_id
            ".$srch." LIMIT $start,$length";
          }
          else {
            $q = "
            SELECT c.idCertificado as rownum, p.*, c.*, a.*
            FROM persona p, certificado c, parroquia a
            WHERE c.sacramento_id = 2
            AND p.id = c.persona_id
            AND a.idParroquia = c.parroquia_id
            AND c.parroquia_id = $idParroquia
            ".$srch." LIMIT $start,$length";
          }

        $r = $this->db->query($q);

        $retornar = array(
            'numDataTotal' => $qnr,
            'datos' => $r
        );

        return $retornar;
    }
    function getConfirmados($start,$length,$search,$tipo)
    {
        $srch = "";
        if ($search) {
            $srch = "AND (p.nombres LIKE '%".$search."%' OR
                            p.ci LIKE '%".$search."%' OR
                            p.apellidoPaterno LIKE '%".$search."%' OR
							              p.apellidoMaterno LIKE '%".$search."%' OR
							              p.procedencia LIKE '%".$search."%' OR
							              p.genero LIKE '%".$search."%') ";
        }

        if ($tipo == 'administrador') {
          $qnr = "
          SELECT count(1) cant
          FROM certificado c, persona p
          WHERE c.sacramento_id = 3
          AND p.id = c.persona_id
          ".$srch;
        }
        else {
          $idParroquia = $this->session->userdata('id');
          $qnr = "
          SELECT count(1) cant
          FROM certificado c, persona p
          WHERE c.sacramento_id = 3
          AND p.id = c.persona_id
          AND c.parroquia_id = $idParroquia
          ".$srch;
        }

        $qnr = $this->db->query($qnr);
        $qnr = $qnr->row();
        $qnr = $qnr->cant;

          if ($tipo == 'administrador') {
            $q = "
            SELECT c.idCertificado as rownum, p.*, c.*, a.*
            FROM persona p, certificado c, parroquia a
            WHERE c.sacramento_id = 3
            AND p.id = c.persona_id
            AND a.idParroquia = c.parroquia_id
            ".$srch." LIMIT $start,$length";
          }
          else {
            $q = "
            SELECT c.idCertificado as rownum, p.*, c.*, a.*
            FROM persona p, certificado c, parroquia a
            WHERE c.sacramento_id = 3
            AND p.id = c.persona_id
            AND a.idParroquia = c.parroquia_id
            AND c.parroquia_id = $idParroquia
            ".$srch." LIMIT $start,$length";
          }

        $r = $this->db->query($q);

        $retornar = array(
            'numDataTotal' => $qnr,
            'datos' => $r
        );

        return $retornar;
    }
}
