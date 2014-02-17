<?php
class M_anggota extends CI_Model{
	function anggota(){
		return $this->db->get('anggota')->result();
	}
}

?>