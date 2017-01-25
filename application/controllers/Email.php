<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Email_model'));
  }

  function index()
  {
    $data['title'] = 'Enviar Email';
    $this->load->view('template/header', $data);
    $this->load->view('email/email');
    $this->load->view('template/footer');
  }

  function sendEmail()
  {
    $baptism = $this->input->post('bautizados');
    $withFirstCommunion = $this->input->post('conPrimeraComunion');
    $confirmed = $this->input->post('confirmados');
    $married = $this->input->post('casados');
    $placeSacrament = $this->input->post('lugar');
    $date = $this->input->post('fecha');
    $to= '';
    $toBaptism = '';
    $toFirstCommunion = '';
    $toConfirmed = '';
    $toMarried = '';
    $toPlaceSacrament = '';
    /*echo $to.'<br>';
    echo $this->input->post('fecha');
    echo '<br>Lugar<br>';
    echo $this->input->post('lugar');*/
    /*  PRUEBAS!! T_T
    echo 'Id lugar = '.$placeSacrament.'<br>';
    echo 'sacramento = '.$baptism.'<br>';
    echo 'date ='.$date.'<br>';
    if ($date != null) {
      echo 'existe<br>';
    }
    else {
      echo 'no existe<br>';
    }*/
   if ($baptism =="si") {
      $token = 1;
        if ($getAllBaptism = $this->Email_model->getAllSacrament(1,$placeSacrament,$date)) {
          foreach ($getAllBaptism as $dataBaptism) {
          #  echo $dataBaptism->email.'<br>';
            if ($token==1) $toBaptism = $dataBaptism->email;
            else $toBaptism = $toBaptism.','.$dataBaptism->email;
            $token++;
          }
            $to = $toBaptism;
        }
        else echo 'no hay bautizados';
    }

    if ($withFirstCommunion=="si") {
      $token = 1;
        if ($getAllFirstCommunion = $this->Email_model->getAllSacrament(2,$placeSacrament,$date)) {
          foreach ($getAllFirstCommunion as $dataFirstCommunion) {
            #echo $dataFirstCommunion->nombre.'<br>';
            if ($token==1) $toFirstCommunion = $dataFirstCommunion->email;
            else $toFirstCommunion = $toFirstCommunion.','.$dataFirstCommunion->email;
            $token++;
          }
          if ($baptism == "si" || $confirmed == "si" || $married == "si") $to = $to.','.$toFirstCommunion;
          else $to = $toFirstCommunion;
        }
        else echo 'no hay con primera comunion';
    }
    if ($confirmed=="si") {
      $token = 1;
      if ($getAllConfirmed = $this->Email_model->getAllSacrament(3,$placeSacrament,$date) == true) {
        foreach ($getAllConfirmed as $dataCommunion) {
          $dataCommunion->nombre;
          if ($token==1) $toConfirmed = $dataCommunion->email;
          else $toConfirmed = $toConfirmed.','.$dataCommunion->email;
          $token++;
        }
        if ($baptism == "si" || $withFirstCommunion == "si" || $married == "si") $to = $to.','.$toConfirmed;
        else $to = $toConfirmed;
      }
      else echo 'no hay confirmados';
    }
    if ($married=="si") {
      $token = 1;
      if ($getAllMarried = $this->Email_model->getAllSacrament(3,$placeSacrament,$date)) {
        foreach ($getAllMarried as $dataMarried) {
          $dataMarried->nombre;
          if ($token==1) $toMarried = $dataMarried->email;
          else $toMarried = $toMarried.','.$dataMarried->email;
          $token++;
        }
        if ($baptism == "si" || $withFirstCommunion == "si" || $confirmed == "si") $to = $to.','.$toMarried;
        else $to = $toMarried;
      }
      else echo 'no hay casados';
    }
    //$this->security->sanitize_filename($this->input->post('variable'));
    #echo $to;
     $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp-relay.sendinblue.com',
            'smtp_port' => 587,
            'smtp_user' => 'joel.a.rojas.v@gmail.com',
            'smtp_pass' => 'f0XF1JjtwbgzCmd7',
            'mailtype'  => 'html'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('joel.a.rojas.v@gmail.com', 'Joel Andy Rojas Valencia');
        $this->email->to($to);
        $this->email->cc('jhoel.rojas.valencia@gmail.com');
        #$this->email->bcc('them@their-example.com');
          $this->email->subject($this->input->post('asunto'));
          $this->email->message($this->input->post('mensaje'));

          if ($this->email->send()) {
            $this->session->set_flashdata('success', 'Email enviado correctamente');
          }
          else {
            $this->session->set_flashdata('error', 'No se a enviado el email');
          }
          redirect(base_url("email"));
  }

}
