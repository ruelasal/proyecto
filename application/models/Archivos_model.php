<?php 
class Archivos_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}




public function nuevoarchiv($array){
		$id = 0;
		$this->db->trans_start();
		$this->db->insert('archivos',$array);
		$id = $this->db->insert_id();
		$this->db->trans_complete();
		return $id;
	}




}//class