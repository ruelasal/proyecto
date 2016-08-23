<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->view('constant');
	}

	public function index()
	{
		
		$this->load->view('templates/hospital/header');
		$this->load->view('inicio/index');
		$this->load->view('templates/hospital/footer');
	}
} //termina class
