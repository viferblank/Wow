<?php
class M_first extends CI_Model{
	function student(){
		$data=$this->db->get('student');
		return $data->result();
	}
	function id_student(){
		$id=1;
		$this->db->where('id_student',$id);
		$data=$this->db->get('student');
		return $data->result();	
	}
	function h_student(){
		$id=$this->uri->segment(3);
		$this->db->where('id_student',$id);
		$this->db->delete('student');
	}
	function U_student(){
		$id=1;
		$datestring="%Y-%m-%d";
		$time=time();
		$tgl=mdate($datestring,$time);
		$data=array('nis'=>$this->input->post('nis'),
		'nama'=>$this->input->post('nama'),
		'kelas'=>$this->input->post('kelas'),
		'inspirasi'=>$this->input->post('inspirasi'),
		'tgl'=>$this->input->post('tgl'),
		'tgl_sekarang'=>$tgl,
		);
		$this->db->where('id_student',$id);
		return $this->db->update('student',$data);
	}
	function A_student(){
		$datestring="%Y-%m-%d";
		$time=time();
		$tgl=mdate($datestring,$time);
		$data=array('nis'=>$this->input->post('nis'),
		'nama'=>$this->input->post('nama'),
		'kelas'=>$this->input->post('kelas'),
		'inspirasi'=>$this->input->post('inspirasi'),
		'tgl'=>$this->input->post('tgl'),
		'tgl_sekarang'=>$tgl,
		);
		return $this->db->insert('student');
	}
	function msg($session){
		if($this->session->userdata($session)){
			echo "Gagal Loh";
			$this->session->unset_userdata($session);
		}
	}
}

?>