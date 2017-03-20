<?php
class Pdf_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf_Library');
        $this->load->model('Pdf_Model');
    }

    public function printCertificado()
    {
        $uri = $this->uri->segment(3);
        $data['get'] = $this->Pdf_Model->getCertificado($uri);
        $this->load->view('certificado/certificado',$data);
               
    }
}