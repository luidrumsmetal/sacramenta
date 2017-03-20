<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
        $this->load->model('Listas_model');

    }

    function getFieles()
    {
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $search = $this->input->post('search')['value'];

        $result = $this->Listas_model->getFieles($start,$length,$search);

        $resultado = $result['datos'];

        $totalDatos = $result['numDataTotal'];;

        $datos = array();

        foreach ($resultado->result_array() as $row) {
            $array = array();
            $array['rownum'] = $row['rownum'];
            $array['apellidoPaterno'] = $row['apellidoPaterno'];
            $array['apellidoMaterno'] = $row['apellidoMaterno'];
            $array['nombres'] = $row['nombres'];
            $array['fechaNacimiento'] = $row['fechanacimiento'];
            $array['genero'] = $row['genero'];

            $datos[] = $array;
        }

        $totalDatoObtenido = $resultado->num_rows();

        $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalDatoObtenido),
            "recordsFiltered" => intval($totalDatos),
            "data"            => $datos
        );
        echo json_encode($json_data);
    }

    function getParroquias()
    {
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $search = $this->input->post('search')['value'];

        $result = $this->Listas_model->getParroquias($start,$length,$search);

        $resultado = $result['datos'];

        $totalDatos = $result['numDataTotal'];;

        $datos = array();

        foreach ($resultado->result_array() as $row) {
            $array = array();
            $array['rownum'] = $row['rownum'];
            $array['nombre'] = $row['nombre'];
            $array['direccion'] = $row['direccion'];
            $array['telefono'] = $row['telefono'];
            $array['email'] = $row['email'];
            $array['jurisdiccion'] = $row['jurisdiccion'];

            $datos[] = $array;
        }

        $totalDatoObtenido = $resultado->num_rows();

        $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalDatoObtenido),
            "recordsFiltered" => intval($totalDatos),
            "data"            => $datos
        );
        echo json_encode($json_data);
    }
    function getBautizados()
    {
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $search = $this->input->post('search')['value'];

        $result = $this->Listas_model->getBautizados($start,$length,$search);

        $resultado = $result['datos'];

        $totalDatos = $result['numDataTotal'];;

        $datos = array();

        foreach ($resultado->result_array() as $row) {
            $array = array();
            $array['rownum'] = $row['rownum'];
            $array['apellidoPaterno'] = $row['apellidoPaterno'];
            $array['apellidoMaterno'] = $row['apellidoMaterno'];
            $array['nombres'] = $row['nombres'];
            $array['fecha'] = $row['fecha'];
            $array['procedencia'] = $row['procedencia'];
            $array['genero'] = $row['genero'];
            $array['nombre'] = $row['nombre'];

            $datos[] = $array;
        }

        $totalDatoObtenido = $resultado->num_rows();

        $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalDatoObtenido),
            "recordsFiltered" => intval($totalDatos),
            "data"            => $datos
        );
        echo json_encode($json_data);
    }


}
