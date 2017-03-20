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
			SELECT p.idParroquia as rownum, p.*, c.*
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
}