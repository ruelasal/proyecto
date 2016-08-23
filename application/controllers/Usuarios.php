<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->view('constant');
		if(!$this->session->userdata('logeado')){
            redirect('admin/formalogin');
        }
	}

	public function index()
	{
		$data=array();
		$session=$this->session->userdata('logeado');
		$data['usuario']=$session['usuario'];

		
		

		$this->load->view('templates/admin/header');
		$this->load->view('admin/backend',$data);
		$this->load->view('templates/admin/footer');
	}
} //termina class
