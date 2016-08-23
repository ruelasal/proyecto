<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->view('constant');
		$this->load->library('pagination');
		$this->load->model('productos_model');
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


	public function verproductos(){
		$data=array();
		$session=$this->session->userdata('logeado');

		$data['usuario']=$session['usuario'];

		 $config = array();

		$config['base_url']        = base_url().'productos/verproductos';
		$config['total_rows']      = ($_POST) ? $this->productos_model->record_count($this->input->post('buscar')) : $this->productos_model->record_count();
		$config['per_page']        = 20;//catidad a mostrar
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
				$data['productos'] = $this->productos_model->fetch_data($config['per_page'], $page, $this->input->post('buscar'));

			}

		}else{
			$data['productos'] = $this->productos_model->fetch_data($config['per_page'], $page);

		}

        $data['links'] = $this->pagination->create_links();

		$this->load->view('templates/admin/header');
		$this->load->view('admin/backend',$data);
		$this->load->view('admin/productos/list',$data);
		$this->load->view('templates/admin/footer');

	}


	
} //termina class

