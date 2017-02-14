<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Baptism extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Users_model','Sacrament_model'));
    #Verifica si se inicio la session
    #si no es asi lo redirecciona a login
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

  }
  public function baptismCreate()
  {
    $data['title'] = 'Registro Bautizo';
    $this->load->view('template/header',$data);
    $this->load->view('sacramentos/baptism/baptismCreate');
    $this->load->view('template/footer');
  }

  function listBaptism($offset = NULL)
  {
    if (!$this->session->userdata('nombre')) {
      redirect(base_url().'login');
    }
    if ($this->session->userdata('tipo') != 'administrador' || $this->session->userdata('tipo') != 'parroquia') {
        if ($this->session->userdata('tipo') == 'fiel') {
            redirect(base_url().'home');
        }
    }
    $data['title'] = 'Lista de Bautizados';
        $idParroquia = $this->session->userdata('id');
    $this->load->library('table');
        $this->load->library('pagination');

        $config['base_url'] = base_url().'baptism/listBaptism';
        $config['total_rows'] = $this->Users_model->count_parroquia('certificado',$idParroquia);
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

    $data['results']= $this->Sacrament_model->listGetSacramento('persona, certificado',' id, idCertificado, fecha, nombres, apellidoPaterno,apellidoMaterno, genero',"id = persona_id AND sacramento_id = 1 AND parroquia_id = $idParroquia",$config['per_page'],$this->uri->segment(3));
    $this->load->view('template/header',$data);
    $this->load->view('sacramentos/baptism/baptismList',$data);
    $this->load->view('template/footer');
  }

  public function baptismRegister()
  {
    #$this->load->library('form_validation');
    $this->form_validation->set_rules('feligres_id', 'Nombre o Apellido', 'trim|required|xss_clean');
    $this->form_validation->set_rules('fechabautismo', 'Fecha Bautizo', 'trim|required|xss_clean');
    $this->form_validation->set_rules('parroquia_id', 'Parroquia', 'trim|required|xss_clean');
    $this->form_validation->set_rules('jurisdiccion_id', 'jurisdiccion', 'trim|required|xss_clean');
    $this->form_validation->set_rules('sacerdoteCelebrante_id', 'Sacerdote Celebrante', 'trim|required|xss_clean');
    $this->form_validation->set_rules('sacerdoteCertificador_id', 'Sacerdote Certificante', 'trim|required|xss_clean');
    $this->form_validation->set_rules('libroOne', 'Libro', 'trim|required|xss_clean');
    $this->form_validation->set_rules('paginaOne', 'Pagina', 'trim|required|xss_clean');
    $this->form_validation->set_rules('numeroOne', 'Numero', 'trim|required|xss_clean');
    if ($this->form_validation->run() == FALSE)
    {
      $this->session->set_flashdata('error', 'Ingrese correctamente los datos');
      redirect(base_url().'baptism/baptismCreate');
    }
    else {
          $persona_id = $this->input->post('feligres_id');
          $sacramento = '1';
          $parroquia_id = $this->input->post('parroquia_id');
          $data = array(
            'fecha' => $this->input->post('fechabautismo'),
            'persona_id' => $persona_id,
            'parroquia_id' => $parroquia_id,
            'sacramento_id' => $sacramento,
            'sacerdoteCertificador_id' => $this->input->post('sacerdoteCertificador_id'),
            'sacerdoteCelebrante_id' => $this->input->post('sacerdoteCelebrante_id'),
            'jurisdiccion_id' => $this->input->post('jurisdiccion_id')
          );
          //registramos el certificado
            if ($this->Sacrament_model->Register('certificado', $data) == TRUE) {
              $fecha = $this->input->post('fechabautismo');
              $certificateWithCi = $this->Sacrament_model->getCertificate($persona_id,$fecha);
              #echo $certificateWithCi;
              #print_r($certificateWithCi);
              $certificado_id = $certificateWithCi->idCertificado;
                $data = array(
                  'libro' => $this->input->post('libroOne'),
                  'pagina' => $this->input->post('paginaOne'),
                  'numero' => $this->input->post('numeroOne'),
                  'parroquia_id' => $parroquia_id,
                  'certificado_id' => $certificado_id
                );
                if ($this->Sacrament_model->Register('libroparroquia',$data)) {
                    $padrino = $this->input->post('apellidoNombrePadrino');
                    $madrina = $this->input->post('apellidoNombreMadrina');
                    if ($padrino != null ) {
                        $data = array(
                            'apellidosNombres' => $padrino,
                            'certificado_id' => $certificado_id
                        );
                        $this->Users_model->personRegister('padrinofiel',$data);
                    }
                    if ($madrina != null ) {
                        $data = array(
                            'apellidosNombres' => $madrina,
                            'certificado_id' => $certificado_id
                        );
                        $this->Users_model->personRegister('padrinofiel',$data);
                    }
                    $this->session->set_flashdata('success','Bautizo Registrado correctamente!');
                    redirect(base_url() . 'baptism/baptismCreate');
                }
                else {
                  $this->session->set_flashdata('error','Error al registrar su informacion de la cuenta (libro)');
                  redirect(base_url() . 'baptism/baptismCreate');
                }
            }
            else
            {
              $this->session->set_flashdata('error','Error al registrar su informacion de la cuenta (certificado)');
              redirect(base_url() . 'baptism/baptismCreate');
            }

    }

  }

  function edit() {
    $kd = $this->uri->segment(3);
    if ($kd == NULL) {
      redirect('Jurisdiccion/listParroquia');
    }
    

     $dt = $this->Sacrament_model->editBaptism($kd);
     $data1['feligres'] = $dt->nombres;
     $data1['feligres_id'] = $dt->persona_id;
     $data1['parroquia'] = $dt->nombre;
     $data1['parroquia_id'] = $dt->parroquia_id;
     $data1['jurisdiccion'] = $dt->jurisdiccion_id;
     $data1['jurisdiccion_id'] = $dt->jurisdiccion_id;
     $data1['fecha'] = $dt->fecha;
     $data1['sacerdoteCelebrante'] = $dt->sacerdoteCelebrante_id;
     $data1['sacerdoteCertificador'] = $dt->sacerdoteCertificador_id;
     $data1['libroOne'] = $dt->libro;
     $data1['paginaOne'] = $dt->pagina;
     $data1['numeroOne'] = $dt->numero;
     $data1['apellidoNombrePadrino'] = $dt->apellidosNombres;
     $data1['apellidoNombreMadrina'] = $dt->apellidosNombres;
     $data1['idCertificado'] = $kd;
    

        $this->load->view('template/header');
        $this->load->view('sacramentos/baptism/baptismEdit', $data1);
        $this->load->view('template/footer');

  }

  function update() {
    if ($this->input->post('mit')) {

      $idCertificado = $this->input->post('idCertificado');
      $this->Sacrament_model->update_bautizo($idCertificado);

      redirect('Jurisdiccion/listParroquia');
    } else{
      redirect('Jurisdiccion/edit/'.$idCertificado);
    }
  /// FIN -->
  }

}
