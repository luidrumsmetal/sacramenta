<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		$this->load->view('inicio/header');
		$this->load->view('inicio');
		$this->load->view('inicio/footer');
	}

  function sendEmail()
  {
   
     $config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp-relay.sendinblue.com',
			'smtp_port' => 587,
			'smtp_user' => 'joel.a.rojas.v@gmail.com',
            'smtp_pass' => 'f0XF1JjtwbgzCmd7',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE

        );

			$message = 'Hello Word !';
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('laurapereyra2504@gmail.com'); // change it to yours
			$this->email->to('laurapereyramamani@gmail.com');// change it to yours
			$this->email->subject('Subject : Send Mail');
			$this->email->message($message);
			if($this->email->send())
			{
			echo 'Email sent.';
			}
			else
			{
			show_error($this->email->print_debugger());
			}
        

  }


}
