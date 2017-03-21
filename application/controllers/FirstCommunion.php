<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FirstCommunion extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
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
    $data['title'] = 'Registro Primera Comunion';
    $this->load->view('template/header',$data);
    $this->load->view('sacramentos/firstCommunion/firstCommunionCreate');
    $this->load->view('template/footer');
  }
  function FirstCommunionRegister()
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
    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', 'Ingrese correctamente los datos');
        redirect(base_url().'firstCommunion');
    }
    else
    {
      $persona_id = $this->input->post('feligres_id');
      $sacramento = '2';
      $celebrante = '1';
      $certificador='1';
      $parroquia_id = $this->input->post('parroquia_id');
      $data = array(
        'fecha' => $this->input->post('fechacom'),
        'persona_id' => $persona_id,
        'parroquia_id' => $parroquia_id,
        'sacramento_id' => $sacramento,
        'sacerdoteCelebrante_id'=>$celebrante,
        'sacerdoteCertificador_id'=>$certificador,
        'jurisdiccion_id' => $this->input->post('jurisdiccion_id')
      );
        if ($this->Sacrament_model->Register('certificado', $data) ==TRUE) {
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
            if ($this->Sacrament_model->Register('libroparroquia',$data) == TRUE) {
                $this->session->set_flashdata('success','Primera Comunion registrado correctamente!');
                redirect(base_url() . 'firstCommunion');
            }
            else
            {
              $this->session->set_flashdata('error', 'Ingrese correctamente los datos (libro)');
              redirect(base_url().'firstCommunion');
            }
        }
        else
        {
          $this->session->set_flashdata('error', 'Ingrese correctamente los datos (certificado)');
          redirect(base_url().'firstCommunion');
        }
    }
  }

  function listComunion($offset = NULL)
  {
    if (!$this->session->userdata('nombre')) {
      redirect(base_url().'login');
    }
    if ($this->session->userdata('tipo') != 'administrador' || $this->session->userdata('tipo') != 'parroquia') {
        if ($this->session->userdata('tipo') == 'fiel') {
            redirect(base_url().'home');
        }
    }
        $data['title'] = 'Lista de Primera Comunión';
        $idParroquia = $this->session->userdata('id');
        $sacramento = 2;
        $this->load->library('table');
        $this->load->library('pagination');
        $config['base_url'] = base_url().'firstCommunion/listComunion';
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
        $config['first_link'] = 'Primera';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

    $this->pagination->initialize($config);
      if($this->session->userdata('tipo') == 'administrador')
      {
          $data['results']= $this->Sacrament_model->listGetSacramento('persona, certificado',' id, idCertificado, fecha, nombres, apellidoPaterno,apellidoMaterno, genero',"id = persona_id AND sacramento_id = 2",$config['per_page'],$this->uri->segment(3));

      }
      else
      {
          $data['results']= $this->Sacrament_model->listGetSacramento('persona, certificado',' id, idCertificado, fecha, nombres, apellidoPaterno,apellidoMaterno, genero',"id = persona_id AND sacramento_id = 2 AND parroquia_id = $idParroquia",$config['per_page'],$this->uri->segment(3));
      }
    $this->load->view('template/header',$data);
    $this->load->view('sacramentos/firstCommunion/firstCommunionList',$data);
    $this->load->view('template/footer');
  }

    public function edit() {
        $uri = $this->uri->segment(3);
        $data['title'] = 'Primera Comunión';
        $data['get']= $this->Sacrament_model->editFirst($uri);
        #echo $data['get'].'<br>';
        #print_r($data['get']);
        #var_dump($data['get']);
        #echo $get['parroquia'];
       $this->load->view('template/header',$data);
        $this->load->view('sacramentos/firstCommunion/firstCommunionEdit', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $this->form_validation->set_rules('parroquia_id', 'Parroquia', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fecha', 'Fecha Confirmacion', 'trim|required|xss_clean');
        $this->form_validation->set_rules('jurisdiccion_id', 'jurisdiccion', 'trim|required|xss_clean');
        $this->form_validation->set_rules('libro', 'Libro', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pagina', 'Pagina', 'trim|required|xss_clean');
        $this->form_validation->set_rules('numero', 'Numero', 'trim|required|xss_clean');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url().'firstCommunion/listComunion');
        }
        else
        {
            $sacramento = 2;
            $idCertificado = $this->input->post('idCertificado');
            $persona_id = $this->input->post('feligres_id');
            $parroquia_id = $this->input->post('parroquia_id');
            $jurisdiccion_id = $this->input->post('jurisdiccion_id');
            $fecha = $this->input->post('fecha');
            $celebrante = '1';
            $certificador='1';
            $data = array(
                'fecha' => $fecha,
                'persona_id' => $persona_id,
                'parroquia_id' => $parroquia_id,
                'sacramento_id' => $sacramento,
                'sacerdoteCertificador_id' => $certificador,
                'sacerdoteCelebrante_id' => $celebrante,
                'jurisdiccion_id' => $jurisdiccion_id
            );
            if($this->Sacrament_model->update('certificado',['idCertificado'=>$idCertificado],$data) == TRUE)
            {
                $idLibroParroquia = $this->input->post('idLibro');
                $libro = $this->input->post('libro');
                $pagina = $this->input->post('pagina');
                $numero = $this->input->post('numero');
                $parroquia_id = $this->input->post('parroquia_id');
                $idCertificado = $this->input->post('idCertificado');
                $data = array(
                    'libro' => $libro,
                    'pagina' => $pagina,
                    'numero' => $numero,
                    'parroquia_id' => $parroquia_id,
                    'certificado_id' => $idCertificado
                );
                if($this->Sacrament_model->update('libroparroquia',['idLibroParroquia'=>$idLibroParroquia],$data) == TRUE )
                {
                    $this->session->set_flashdata('success','DATOS ACTUALIZADOS CORRECTAMENTE');
                    redirect(base_url() . 'firstCommunion/listComunion');
                }
                else
                {
                    $this->session->set_flashdata('success','no se actualizo datos del certificado');
                    redirect(base_url() . 'firstCommunion/listComunion');
                }
            }
            else
            {
                $this->session->set_flashdata('error','Error al actualizar datos del libro');
                redirect(base_url() . 'firstCommunion/listComunion');
            }
        }
    }
    function delete() {
        $u = $this->input->post('id');
        $this->Sacrament_model->delete($u);

        $this->session->set_flashdata('success','Se elimino correctamente');
        redirect(base_url() .'firstCommunion/listComunion');
    }

  public function autoCompleteFeligres(){
        if (isset($_GET['term'])){
            $q = strtolower($_GET['term']);
            $this->Sacrament_model->autoCompleteFeligres($q);
        }
    }


}
