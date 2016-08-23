<?php 
class Productos_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}


		public function verproductos(){
	

		$productos_info=array();
		$query = $this->db->get_where('productos', array());
			
		foreach ($query->result_array() as $q) {
			$productos_info[] = array(
				'id'            => $q['id'],
				'codigo'        => $q['codigo'],
				'descripcion'   => $q['descripcion'],
				'unidad'        => $q['unidad'],
				'existencia'    => $q['existencia'],
				'precio'        => $q['precio'],
				'idimagen'      => $q['idimagen'],
				'miniatura'     => $q['miniatura'],
				'idfamilia'     => $q['idfamilia'],
				'idmarca'       => $q['idmarca'],
				'fecharegistro' => $q['fecharegistro'],
				'idusuario'     => $q['idusuario'],
			);
		}


		return $productos_info;
	
	}

	public function record_count($buscar = '')
		{
			if ($buscar != '') {
				$this->db->like('descripcion',$buscar);
			}
			return $this->db->count_all_results('productos');
		}

	public function fetch_data($limit,$start,$buscar = '')
		{
			if ($buscar != '') {
				$this->db->like('descripcion',$buscar);
			}
			$this->db->limit($limit,$start);
			$query= $this->db->get('productos');

			if($query->num_rows() > 0)
			{
				foreach($query->result() as $row)
				{
					$data[] = array (
						'id' => $row->id,
						'descripcion' => $row->descripcion,
						'codigo' => $row->codigo,
						'unidad' => $row->unidad,
						'existencia' => $row->existencia,
						'precio' => $row->precio,
						'idimagen' => $row->idimagen,
						'miniatura' => $row->miniatura,
						'idfamilia' => $row->idfamilia,
						'idmarca' => $row->idmarca,
						'idusuario' => $row->idusuario,
						'fecharegistro' => date('d/m/Y H:i:s', $row->fecharegistro)
						);
				}
				return $data;
			}
			return false;
		}

		public function buscarproducto($id){
			$sql="select - from productos where='".$id."' limit 1";
			$query=$this->db->query($sql);
			return $query->result();
		}


}//termina
