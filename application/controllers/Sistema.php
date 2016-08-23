<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->view('constant');
		$this->load->library('pagination');
		if(!$this->session->userdata('logeado')){
            redirect('admin/formalogin');
        }
        $this->load->model('usuarios_model');
	}

	public function index(){
		$session=$this->session->userdata('logeado');

		$data['usuario']=$session['usuario'];

		$this->load->view('templates/admin/header');
		$this->load->view('admin/backend',$data);
		//$this->load->view('admin/usuarios/list');
		$this->load->view('templates/admin/footer');
	}

	public function usuarioslista(){

		$session=$this->session->userdata('logeado');

		$data['usuario']=$session['usuario'];


		$data['usuarios']=$this->usuarios_model->listarusuarios();
		

 

        $config = array();

		$config['base_url']        = base_url().'sistema/usuarioslista';
		$config['total_rows']      = ($_POST) ? $this->usuarios_model->record_count($this->input->post('buscar')) : $this->usuarios_model->record_count();
		$config['per_page']        = 2;//catidad a mostrar
		$config['uri_segment']     = 3;
		//$config['prev_link']     = '<span class="glyphicon glyphicon-chevron-left"></span>';
		//$config['next_link']     = '<span class="glyphicon glyphicon-chevron-right"></span>';
		$config['next_tag_open']   = '<li>';
		$config['next_tag_close']  = '</li>';
		$config['prev_tag_open']   = '<li>';
		$config['prev_tag_close']  = '</li>';
		$config['first_tag_open']  = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open']   = '<li>';
		$config['last_tag_close']  = '</li>';
		$config['cur_tag_open']    = '<li class="disabled"><a href="#">';
		$config['cur_tag_close']   = '</a></li>';
		$config['num_tag_open']    = '<li>';
		$config['num_tag_close']   = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

                if($_POST){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('buscar','buscar','trim|min_length[1]|max_length[100]');
			
			if($this->form_validation->run()==true){
				$data['usuarios'] = $this->usuarios_model->fetch_data($config['per_page'], $page, $this->input->post('buscar'));

			}

		}else{
			$data['usuarios'] = $this->usuarios_model->fetch_data($config['per_page'], $page);

		}

        $data['links'] = $this->pagination->create_links();

		$this->load->view('templates/admin/header');
		$this->load->view('admin/backend',$data);
		$this->load->view('admin/usuarios/list',$data);
		$this->load->view('templates/admin/footer');
	}


	public function addusuario(){

		$data["titulo"] = "Nuevo Usuario";
		$session=$this->session->userdata('logeado');
		$data['mensaje'] = '';
		$data['usuario']=$session['usuario'];

		if($_POST){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('usuario','usuario','trim|required|is_unique[usuarios.usuario]');
			$this->form_validation->set_rules('password','password','trim|required|min_length[4]|max_length[20]');
			$this->form_validation->set_rules('nombre','nombre','trim|required');
			$this->form_validation->set_rules('email','email','trim|required|valid_email|is_unique[usuarios.email]');
			$this->form_validation->set_rules('grupo','grupo','trim|required|numeric');

			if($this->form_validation->run()==true){

				switch ($this->input->post('grupo')) {
					case 100:
						$perfil='Administrador';
						break;
					case 50:
						$perfil='Vendedor';
						break;
					case 25:
						$perfil='cliente antiguo';
						break;
					case 1:
						$perfil='cliente nuevo';
						break;
					default:
						$perfil='desconocido';
						break;
				}

				$fecharegistro=time();

				$usuario=array(
					'id'            => 0,
					'usuario'       => $this->input->post('usuario'),
					'password'      => md5($this->input->post('password')),
					'idnombre'      => $this->input->post('nombre'),
					'email'         => $this->input->post('email'),
					'grupo'         => $this->input->post('grupo'),
					'perfil'        => $perfil,
					'fecharegistro' => $fecharegistro,
					);

				if($this->usuarios_model->nuevousuario($usuario)){
					//$data['mensaje']='Usuarioa agregado ';
					redirect('sistema/usuarioslista','refresh');
				}else{
					$data['mensaje'] = 'No se agrego';
					$data['usuario'] = $this->input->post('usuario');
					$data['nombre']  = $this->input->post('nombre');
					$data['email']   = $this->input->post('email');
					$data['grupo']   = $this->input->post('grupo');
				}

			}
			else{
				$data['mensaje'] = 'No se cumplieron las validaciones del fourmulario';
				$data['usuario'] = $this->input->post('usuario');
				$data['nombre']  = $this->input->post('nombre');
				$data['email']   = $this->input->post('email');
				$data['grupo']   = $this->input->post('grupo');
			}



		}

		$this->load->view('templates/admin/header');
		$this->load->view('admin/backend',$data);
		$this->load->view('admin/usuarios/add',$data);
		$this->load->view('templates/admin/footer');


	
	}


	public function edituser(){
		$data["titulo"] = "Editar Usuario";
		$session=$this->session->userdata('logeado');
		$data['mensaje'] = '';
		$data['usuario']=$session['usuario'];

		







		$this->load->view('templates/admin/header');
		$this->load->view('admin/backend',$data);
		$this->load->view('admin/usuarios/edit',$data);
		$this->load->view('templates/admin/footer');



	
	}


} //termina class
