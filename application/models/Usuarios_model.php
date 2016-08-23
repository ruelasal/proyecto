<?php 
class Usuarios_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}


	public function login($usuario, $password){
		$this->db->select('id, usuario, grupo, perfil');
		$this->db->from('usuarios');
		$this->db->where('usuario', $usuario);
		$this->db->where('password',md5($password));
		$this->db->limit(1);

		$query=$this->db->get();


		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	
	}

	public function listarusuarios(){
		$sql="select * from usuarios order by usuario asc";
		$query=$this->db->query($sql);
		foreach($query->result() as $usuario){
			$usuarios[] = array(
				'id'            => $usuario->id,
				'usuario'       => $usuario->usuario,
				'idnombre'      => $usuario->idnombre,
				'email'         => $usuario->email,
				'grupo'         => $usuario->grupo,
				'perfil'        => $usuario->perfil,
				'fecharegistro' => date('d/m/Y H:i:s', $usuario->fecharegistro),
				);
		}
		return $usuarios;
	}

	public function buscarusuario($id){
		$sql="select * from usuarios where id='".$id."' limit 1 ";
		$query=$this->db->query($slq);
		return $query->result();
	}

	public function eliminausuario($id){
		$this->db->where('id',$id);
		return $this->db->delete('usuarios');
	}

	public function actualizausuario($array,$id){
		$this->db->trans_start();
		$this->db->where('id',$id);
		$this->db->update('usuarios',$array);
		$this->db->trans_complete();
		return true;

	}


	public function nuevousuario($array){
		$id = 0;
		$this->db->trans_start();
		$this->db->insert('usuarios',$array);
		$id = $this->db->insert_id();
		$this->db->trans_complete();
		return $id;
	}


		public function record_count($buscar = '')
		{
		if($buscar !=''){
			$this->db->like('usuario', $buscar);
			$this->db->or_like('email', $buscar);
		}
		return $this->db->count_all_results('usuarios');
	}
	


	public function fetch_data($limit, $start, $buscar = '')
		{
		if($buscar != ''){
			$this->db->like('usuario', $buscar);
			$this->db->or_like('email', $buscar);
		}
		$this->db->limit($limit, $start);

		$query = $this->db->get('usuarios');

		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$data[] = array(
					'id'            => $row->id,
					'usuario'       => $row->usuario,
					'idnombre'      => $row->idnombre,
					'email'         => $row->email,
					'grupo'         => $row->grupo,
					'perfil'        => $row->perfil,
					'fecharegistro' => date('d/m/Y H:i:s', $row->fecharegistro)
					);
			}



			return $data;
		}

		return false;
	}


	public function obtener($id){
		$this->db->where('id',$id);
		$query=$this->db->get('usuarios');
		$fila=$query->row();
		return $fila;

	}


/*	public function registro(){
		$usuario = array(
			'id' => 1,
			'usuario' => 'carlos',
			'password' => md5('password'),
			'email' => 'cruelas@sajor.mx',
			'grupo' => 100,
			);
		$this->db->insert('usuarios',$usuario);
	}*/

}//fin class Usuriarios