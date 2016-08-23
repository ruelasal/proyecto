<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilerias extends CI_Controller {


		public function __construct(){
		parent::__construct();
		$data=array();
		$this->load->view('constant');
        $this->load->library('pagination');
		$this->load->library('form_validation');
		if(!$this->session->userdata('logeado')){
            redirect('admin/formalogin');
        }
        $this->load->helper('download');
        $this->load->model('usuarios_model');
        $this->load->model('docfis_model');

        
	}


	public function index(){

		$session=$this->session->userdata('logeado');

		$data['usuario']=$session['usuario'];

		$this->load->view('templates/admin/header');
		$this->load->view('admin/backend',$data);
		$this->load->view('templates/admin/footer');

	}


	public function formxml(){
		
		$data = array();
		$data['error'] = '';

		$session=$this->session->userdata('logeado');

		$data['usuario']=$session['usuario'];



			$this->load->view('templates/admin/header');
			$this->load->view('admin/backend',$data);	
            $this->load->view('admin/sistema/validarxml',$data);
            $this->load->view('templates/admin/footer');

	}

	public function validaxml(){
		$data = array();
		$data['error'] = '';
		$session=$this->session->userdata('logeado');

		$data['usuario']=$session['usuario'];

                 $xml                     ='xml';
                 $config['upload_path']   = './uploads/';
                 $config['allowed_types'] = 'xml';
                 $config['max_size']      = 9999999;
                 

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload($xml))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('templates/admin/header');
						$this->load->view('admin/backend',$data);	
                        $this->load->view('admin/sistema/validarxml', $error);
                        $this->load->view('templates/admin/footer');
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $data['usuario']=$session['usuario'];
                        $data['id']=$session['id'];
        				

                        $upload=time();
                        $ruta='/uploads/';
                        $xml = array(
                            'id'            => 0,
                            'upload'        => $upload,
                            'idusuario'     => $session['id'],
                            'ruta'          => $ruta,
                            'fecharegistro' => $upload,
                            'download'      => $upload,
                            'nombre'        => $this->upload->data('file_name'),
                        	 );
                        $this->docfis_model->nuevoxml($xml);

                        $this->load->view('templates/admin/header');
						$this->load->view('admin/backend',$data);	
                        $this->load->view('admin/sistema/xmlcorrecto', $data);
                        $this->load->view('templates/admin/footer');
                }
       	}



       	public function verxmls(){

        $data = array();

        $session=$this->session->userdata('logeado');

        $data['usuario']=$session['usuario'];

        $config = array();

        $config['base_url']        = base_url().'utilerias/verxmls';
        $config['total_rows']      = ($_POST) ? $this->docfis_model->record_count($this->input->post('buscar')) : $this->docfis_model->record_count();
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
                $data['docfis'] = $this->docfis_model->fetch_data($config['per_page'], $page, $this->input->post('buscar'));

            }

        }else{
            $data['docfis'] = $this->docfis_model->fetch_data($config['per_page'], $page);

        }

        $data['links'] = $this->pagination->create_links();


            $this->load->view('templates/admin/header');
            $this->load->view('admin/backend',$data);   
            $this->load->view('admin/sistema/listxml',$data);
            $this->load->view('templates/admin/footer');


       	}


        public function descargarxml($id){
        
        $data = array();

        $session=$this->session->userdata('logeado');

        $data['usuario']=$session['usuario'];


        
       

      



        $data = file_get_contents("/path/my-image.jpg");
        force_download('my-today-day.jpg', 'data');

        }





//archivos

        public function forarchiv(){
        
        $data = array();
        $data['error'] = '';

        $session=$this->session->userdata('logeado');

        $data['usuario']=$session['usuario'];



            $this->load->view('templates/admin/header');
            $this->load->view('admin/backend',$data);   
            $this->load->view('admin/sistema/subirarchivo',$data);
            $this->load->view('templates/admin/footer');

    }


        public function subirarchivo(){
        $data = array();
        $data['error'] = '';
        $session=$this->session->userdata('logeado');

        $data['usuario']=$session['usuario'];

                 $xml                     ='xml';
                 $config['upload_path']   = './uploads/';
                 $config['max_size']      = 9999999;
                 

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload($xml))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('templates/admin/header');
                        $this->load->view('admin/backend',$data);   
                        $this->load->view('admin/sistema/subirarchivo', $error);
                        $this->load->view('templates/admin/footer');
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $data['usuario']=$session['usuario'];
                        $data['id']=$session['id'];
                        

                        $upload=time();
                        $ruta='/uploads/';
                        $xml = array(
                            'id'            => 0,
                            'upload'        => $upload,
                            'idusuario'     => $session['id'],
                            'ruta'          => $ruta,
                            'fecharegistro' => $upload,
                            'download'      => $upload,
                            'nombre'        => $this->upload->data('file_name'),
                             );
                        $this->docfis_model->nuevoxml($xml);

                        $this->load->view('templates/admin/header');
                        $this->load->view('admin/backend',$data);   
                        $this->load->view('admin/sistema/xmlcorrecto', $data);
                        $this->load->view('templates/admin/footer');
                }
        }  


}//class