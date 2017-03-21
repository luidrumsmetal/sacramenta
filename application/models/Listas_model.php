<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listas_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }

    function getFieles($start,$length,$search)
    {

        $srch = "";
        if ($search) {
            $srch = "WHERE (p.nombres LIKE '%".$search."%' OR 
							p.apellidoPaterno LIKE '%".$search."%' OR
							p.apellidomaterno LIKE '%".$search."%' OR
							p.ci LIKE '%".$search."%') ";
        }

        $qnr = "
			SELECT count(1) cant
			FROM persona p
		".$srch;

        $qnr = $this->db->query($qnr);
        $qnr = $qnr->row();
        $qnr = $qnr->cant;


        $q = "
			SELECT p.id as rownum, p.*
			FROM persona p
			".$srch." LIMIT $start,$length";

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

    function getBautizados($start,$length,$search)
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

        $qnr = "
			SELECT count(1) cant
			FROM certificado c, persona p
			WHERE c.sacramento_id = 1
			AND p.id = c.persona_id
		".$srch;

        $qnr = $this->db->query($qnr);
        $qnr = $qnr->row();
        $qnr = $qnr->cant;


        $q = "
			SELECT c.idCertificado as rownum, p.*, c.*, a.*
			FROM persona p, certificado c, parroquia a
			WHERE p.id = c.persona_id
			AND a.idParroquia = c.parroquia_id
			".$srch." LIMIT $start,$length";

        $r = $this->db->query($q);

        $retornar = array(
            'numDataTotal' => $qnr,
            'datos' => $r
        );

        return $retornar;
    }
}