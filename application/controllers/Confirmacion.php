<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmacion extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->load->model(array('Sacrament_model','Users_model'));
    if (!$this->session->userdata('nombre')) {
      redirect(base_url().'login');
    }
    if ($this->session->userdata('tipo') != 'administrador' || $this->session->userdata('tipo') != 'parroquia') {
        if ($this->session->userdata('tipo') == 'fiel') {
            redirect(base_url().'home');
        }
    }
  }

  function index()
  {
    $data['title'] = 'Registro Confirmacion';
    $this->load->view('template/header',$data);
    $this->load->view('sacramentos/confirmacion/confirmacionCreate');
    $this->load->view('template/footer');
  }

  function listConfirmacion($offset = NULL)
  {
    if (!$this->session->userdata('nombre')) {
      redirect(base_url().'login');
    }
    if ($this->session->userdata('tipo') != 'administrador' || $this->session->userdata('tipo') != 'parroquia') {
        if ($this->session->userdata('tipo') == 'fiel') {
            redirect(base_url().'home');
        }
    }
    $data['title'] = 'Lista de Confirmados';
        $idParroquia = $this->session->userdata('id');
        $sacramento = 3;
        $this->load->library('table');
        $this->load->library('pagination');

        $config['base_url'] = base_url().'confirmacion/listConfirmacion';
          if($this->session->userdata('tipo') == 'administrador')
          {
              $config['total_rows'] = $this->Users_model->count_administrador('certificado',$sacramento);
          }
          else
          {
              $config['total_rows'] = $this->Users_model->count_parroquia('certificado',$idParroquia);
          }
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
         if($this->session->userdata('tipo') == 'administrador')
          {
              $data['results']= $this->Sacrament_model->listGetSacramento('persona, certificado',' id, idCertificado, fecha, nombres, apellidoPaterno,apellidoMaterno, genero',"id = persona_id AND sacramento_id = 3",$config['per_page'],$this->uri->segment(3));

          }
          else
          {
              $data['results']= $this->Sacrament_model->listGetSacramento('persona, certificado',' id, idCertificado, fecha, nombres, apellidoPaterno,apellidoMaterno, genero',"id = persona_id AND sacramento_id = 3 AND parroquia_id = $idParroquia",$config['per_page'],$this->uri->segment(3));
          }
        $this->load->view('template/header',$data);
        $this->load->view('sacramentos/confirmacion/confirmacionList',$data);
        $this->load->view('template/footer');
      }


  function confirmacionRegister()
  {
    $this->load->library('form_validation');
    #$this->form_validation->set_rules('ci_id', 'Carnet de Identidad', 'trim|required|min_length[4]|numeric|xss_clean');
    #$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[2]|xss_clean');
    #$this->form_validation->set_rules('apellido', 'Apellido', 'trim|required|min_length[2]|xss_clean');
    #$this->form_validation->set_rules('fechanac', 'Fecha nacimiento', 'trim|required|xss_clean');
    $this->form_validation->set_rules('fechacom', 'Fecha Primera Confirmacion', 'trim|required|xss_clean');
    $this->form_validation->set_rules('parroquia_id', 'Parroquia', 'trim|required|xss_clean');
    $this->form_validation->set_rules('libroOne', 'Libro', 'trim|required|xss_clean');
    $this->form_validation->set_rules('paginaOne', 'Pagina', 'trim|required|xss_clean');
    $this->form_validation->set_rules('numeroOne', 'Numero', 'trim|required|xss_clean');
    if ($this->form_validation->run() == FALSE) 
    {
        $this->session->set_flashdata('error', 'Ingrese correctamente los datos');
        redirect(base_url().'confirmacion');
    }
    else
    {
      $persona_id = $this->input->post('persona_id');
      $sacramento = '3';
      $parroquia_id = $this->input->post('parroquia_id');
      $jurisdiccion_id = $this->input->post('jurisdiccion_id');
      $sacerdoteCelebrante_id = $this->input->post('sacerdoteCelebrante_id');
      $sacerdoteCertificador_id = $this->input->post('sacerdoteCertificador_id');
      $data = array(
        'fecha' => $this->input->post('fechacom'),
        'persona_id' => $persona_id,
        'parroquia_id' => $parroquia_id,
        'sacramento_id' => $sacramento,
        'jurisdiccion_id' => $jurisdiccion_id,
        'sacerdoteCelebrante_id' => $sacerdoteCelebrante_id,
        'sacerdoteCertificador_id' => $sacerdoteCertificador_id
      );

          //registramos el certificado
            if ($this->Sacrament_model->Register('certificado', $data) == TRUE) {
              $fecha = $this->input->post('fechacom');
              $certificateWithCi = $this->Sacrament_model->getCertificate($persona_id,$fecha);
              $certificado_id = $certificateWithCi->idCertificado;
                $data = array(
                  'libro' => $this->input->post('libroOne'),
                  'pagina' => $this->input->post('paginaOne'),
                  'numero' => $this->input->post('numeroOne'),
                  'parroquia_id' => $parroquia_id,
                  'certificado_id' => $certificado_id
                );
                if ($this->Sacrament_model->Register('libroparroquia',$data)) {


                  $apellidosNombrePadrino = $this->input->post('apellidosNombrePadrino');
                    $apellidosNombreMadrina = $this->input->post('apellidosNombreMadrina');
                        $data = array(
                            'apellidosNombrePadrino' => $apellidosNombrePadrino,
                            'apellidosNombreMadrina' => $apellidosNombreMadrina,
                            'certificado_id' => $certificado_id
                        );
                    if ($this->Users_model->personRegister('padrinofiel',$data)== TRUE) {
                  
                    $this->session->set_flashdata('success','Confirmacion Registrado correctamente!');
                    redirect(base_url() . 'confirmacion');
                      }
                     else {
                     $this->session->set_flashdata('error','Error al registrar a sus padrinos');
                     redirect(base_url() . 'confirmacion');
                    }


                }
                else {
                  $this->session->set_flashdata('error','Error al registrar su informacion de la cuenta (libro)');
                  redirect(base_url() . 'confirmacion');
                }
            }
            else
            {
              $this->session->set_flashdata('error','Error al registrar su informacion de la cuenta (certificado)');
              redirect(base_url() . 'confirmacion');
            }


    }
  }

  function edit()
  {
      $uri = $this->uri->segment(3);
      $data['title'] = 'Confirmación';
      $data['get'] = $this->Sacrament_model->editConfirmacion($uri);
      #echo $data['get'].'<br>';
       #print_r($data['get']);
      $this->load->view('template/header',$data);
      $this->load->view('sacramentos/confirmacion/confirmacionEdit', $data);
      $this->load->view('template/footer');
  }
    function update() {

        /*echo 'Certificado '.$idCertificado = $this->input->post('idCertificado').'<br>';
        echo  'persona '.$persona_id = $this->input->post('feligres_id').'<br>';
        echo  'parroquia '.$parroquia_id = $this->input->post('parroquia_id').'<br>';
        echo 'jurisdiccion '.$jurisdiccion_id = $this->input->post('jurisdiccion_id').'<br>';
        echo 'fecha '.$fecha = $this->input->post('fecha').'<br>';
        echo 'cerlebrante '.$sacerdoteCelebrante_id = $this->input->post('sacerdoteCelebrante_id').'<br>';
        echo 'certificador '.$sacerdoteCertificador_id = $this->input->post('sacerdoteCertificador_id').'<br>';
        echo 'IDLIBRO '.$idLibroParroquia = $this->input->post('idLibro').'<br>';
        echo 'libro '.$libro = $this->input->post('libro').'<br>';
        echo 'pagina '.$pagina = $this->input->post('pagina').'<br>';
        echo 'numero '.$numero = $this->input->post('numero').'<br>';
        echo $apellidosNombresPadrino = $this->input->post('apellidoNombrePadrino').'<br>';
        echo $apellidosNombresMadrina = $this->input->post('apellidoNombreMadrina').'<br>';*/

        $this->form_validation->set_rules('feligres_id', 'Nombre o Apellido', 'trim|required|xss_clean');
        $this->form_validation->set_rules('parroquia_id', 'Parroquia', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fecha', 'Fecha Bautizo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('jurisdiccion_id', 'jurisdiccion', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sacerdoteCelebrante_id', 'Sacerdote Celebrante', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sacerdoteCertificador_id', 'Sacerdote Certificante', 'trim|required|xss_clean');
        $this->form_validation->set_rules('libro', 'Libro', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pagina', 'Pagina', 'trim|required|xss_clean');
        $this->form_validation->set_rules('numero', 'Numero', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE)
        {
          $this->session->set_flashdata('error', validation_errors());
          redirect(base_url().'confirmacion/listConfirmacion');
        }
        else
        {
            $sacramento = 3;
            $idCertificado = $this->input->post('idCertificado');
            $persona_id = $this->input->post('feligres_id');
            $parroquia_id = $this->input->post('parroquia_id');
            $jurisdiccion_id = $this->input->post('jurisdiccion_id');
            $fecha = $this->input->post('fecha');
            $sacerdoteCelebrante_id = $this->input->post('sacerdoteCelebrante_id');
            $sacerdoteCertificador_id = $this->input->post('sacerdoteCertificador_id');
            $idLibroParroquia = $this->input->post('idLibro');
            $idPadrinoFiel = $this->input->post('idPadrinoFiel');
            $libro = $this->input->post('libro');
            $pagina = $this->input->post('pagina');
            $numero = $this->input->post('numero');
            $apellidosNombrePadrino = $this->input->post('apellidosNombrePadrino');
            $apellidosNombreMadrina = $this->input->post('apellidosNombreMadrina');

            $data = array(
                'fecha' => $fecha,
                'persona_id' => $persona_id,
                'parroquia_id' => $parroquia_id,
                'sacramento_id' => $sacramento,
                'sacerdoteCertificador_id' => $sacerdoteCertificador_id,
                'sacerdoteCelebrante_id' => $sacerdoteCelebrante_id,
                'jurisdiccion_id' => $jurisdiccion_id
            );
            $this->Sacrament_model->update('certificado',['idCertificado'=>$idCertificado],$data);
            
            $data = array(
                'libro' => $libro,
                'pagina' => $pagina,
                'numero' => $numero,
                'parroquia_id' => $parroquia_id,
                'certificado_id' => $idCertificado
            );
            $this->Sacrament_model->update('libroparroquia',['idLibroParroquia'=>$idLibroParroquia],$data);

            $data = array(
                    'apellidosNombrePadrino' => $apellidosNombrePadrino,
                    'apellidosNombreMadrina' => $apellidosNombreMadrina,
                    'certificado_id' => $idCertificado
              );

          $this->Sacrament_model->update('padrinofiel',['idPadrinoFiel'=>$idPadrinoFiel],$data);
                
            $this->session->set_flashdata('success','DATOS ACTUALIZADOS CORRECTAMENTE');
            redirect(base_url() . 'confirmacion/listConfirmacion');
                
                
            
        }
        /// FIN -->
    }
    function delete() {
        $uri = $this->uri->segment(3);
        $this->Sacrament_model->deleteBaptism($uri);
        $this->session->set_flashdata('success','Eliminacion completada');
        redirect(base_url() .'confirmacion/listConfirmacion');


    }
}
