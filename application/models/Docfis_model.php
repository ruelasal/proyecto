<?php 
class Docfis_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

		public function listarxmls(){
		$sql="select * from docfis order by idusuario asc";
		$query=$this->db->query($sql);
		foreach($query->result() as $docfis){
			$docfis[] = array(
				'id'            => $docfis->id,
				'upload'        => date('d/m/Y H:i:s', $docfis->upload),
				'download'      => $docfis->download,
				'idusuario'     => $docfis->idusuario,
				'tipo'          => $docfis->tipo,
				'nombre'        => $docfis->nombre,
				'idempresa'     => $docfis->idempresa,
				'ruta'          => $docfis->ruta,
				'fecharegistro' => date('d/m/Y H:i:s', $docfis->fecharegistro),
				);
		}
		return $docfis;
	}


		public function nuevoxml($array){
		$id = 0;
		$this->db->trans_start();
		$this->db->insert('docfis',$array);
		$id = $this->db->insert_id();
		$this->db->trans_complete();
		return $id;
	}


	public function fetch_data($limit, $start, $buscar = '')
	{
		if($buscar != ''){
			$this->db->like('nombre', $buscar);
			$this->db->or_like('ruta', $buscar);
		}
		$this->db->limit($limit, $start);

		$query = $this->db->get('docfis');

		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$data[] = array(
					'id'            => $row->id,
					'idusuario'     => $row->idusuario,
					'tipo'          => $row->tipo,
					'nombre'        => $row->nombre,
					'ruta'          => $row->ruta,
					'idempresa'     => $row->idempresa,
					'fecharegistro' => date('d/m/Y H:i:s', $row->fecharegistro),
					'upload'        => date('d/m/Y H:i:s', $row->upload),
					'download'      => date('d/m/Y H:i:s', $row->download)
					);
			}



			return $data;
		}

		return false;
	}



		public function record_count($buscar = '')
			{
				if($buscar !=''){
					$this->db->like('nombre', $buscar);
					$this->db->or_like('ruta', $buscar);
				}
				return $this->db->count_all_results('docfis');
			}




		public function descargaxml($id){
			$this->db->select('id, nombre, ruta');
			$this->db->from('docfis');
			$this->db->where('id',$id);
			$this->db->limit(1);

			$query=$this->db->get();

			if ($query->num_rows()==1) {
				return $query->result();
			}else{
				return false;
			}
		}




	
}//fin class docfis