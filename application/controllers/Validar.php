<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validar extends CI_Controller {


	public function __construct(){
		parent::__construct();
		//$this->load->helper('form');
		//$this->load->model('usuarios_model');
		$this->load->view('constant');
	}


	public function index(){

		$session=$this->session->userdata('logeado');

		$data['usuario']=$session['usuario'];


		$this->load->view('templates/admin/header');
		$this->load->view('admin/backend',$data);
		$this->load->view('templates/admin/footer');

	}


}//class