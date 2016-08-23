<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('usuarios_model');
		$this->load->view('constant');
	}

	public function index(){

		$data=array();

		if(!$this->session->userdata('logeado')){
			redirect('admin/login','refresh');
		}

		$session=$this->session->userdata('logeado');

		$data['usuario']=$session['usuario'];
		$data['grupo']=$session['grupo'];
		$data['perfil']=$session['perfil'];
		$data['id']=$session['id'];

		
		$this->load->view('templates/admin/header');
		$this->load->view('admin/backend',$data);
		$this->load->view('templates/admin/footer');
	}



	public function login(){

	$data=array();

	if($_POST){

		$this->load->library('form_validation');

		$this->form_validation->set_rules('usuario','Usuario','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required|callback_checar');

		if($this->form_validation->run() == true){
			redirect('admin','refresh');
		}

	}
	
			$this->load->view('templates/admin/header');
			$this->load->view('admin/login');
			$this->load->view('templates/admin/footer');		
	}

	

	public function backend(){
		$data=array();


		$this->load->view('templates/admin/header');
		$this->load->view('admin/backend',$data);
		$this->load->view('templates/admin/footer');
	
	}

	public function checar($password){
		$usuario=$this->input->post('usuario');

		$respuesta=$this->usuarios_model->login($usuario, $password);

		

		if($respuesta){
			$sesion=array();

			foreach($respuesta as $fila){
				$sesion=array(
					'id'      => $fila->id,
					'usuario' => $fila->usuario,
					'grupo'   => $fila->grupo,
					'perfil'  => $fila->perfil,
					);
				$this->session->set_userdata('logeado',$sesion);

			}
			return true;
		}else{
			//$this->$this->load->view('admin/login');
			$this->form_validation->set_message('checar','Contraseña o usuario invalido');

		}
	}



	public function cerrar_sesion(){

		$this->session->unset_userdata('logeado');
		session_destroy();
		redirect ('admin', 'refresh');
	}


	public function formalogin(){
		$this->load->view('templates/admin/header');
		$this->load->view('admin/login');
		$this->load->view('templates/admin/footer');
	}

} //termina claindex