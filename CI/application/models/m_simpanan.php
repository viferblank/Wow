<?php
class M_simpanan extends CI_Model{
	function simpanan(){
		if($this->input->post('src')){
			$fint=$this->session->userdata('find');
			$like="SELECT * FROM simpanan,anggota WHERE anggota.id_anggota=simpanan.id_anggota AND anggota.nama LIKE '%$fint%'";
			$src="AND anggota.nama LIKE '%$fint%'";
		}else{
			$fint=$this->session->userdata('find');
			$like="SELECT * FROM simpanan,anggota WHERE anggota.id_anggota=simpanan.id_anggota";
			$src="";
		}
			$config['per_page']=10;
			$config['next_link']='Next >>';
			$config['prev_link']='<< Prev';
			$config['base_url']=base_url().'C_simpanan/simpanan';
			$config['uri_segment']=3;
			$offset=$this->uri->segment(3);
			$config['total_rows']=$this->db->query($like)->num_rows();
			if(empty($offset)){
				$offset=0;
			}
			$page=$config['per_page'];
			$this->pagination->initialize($config);
			$query=$this->db->query("SELECT * FROM simpanan,anggota WHERE anggota.id_anggota=simpanan.id_anggota $src LIMIT $offset,$page");
			if($query->num_rows() < 1){
				$this->session->set_userdata('msg','Data belum ada');
			}
			return $query->result();
	}
	function T_simpanan(){
		$datastring="%Y-%m-%d";
		$time=time();
		$tgl=mdate($datastring,$time);
		$data=array('nm_simpanan'=>$this->input->post('nm_simpanan'),
		'id_anggota'=>$this->input->post('id_anggota'),
		'tgl_simpanan'=>$tgl,
		'besar_simpanan'=>$this->input->post('besar_simpanan'),
		'ket'=>$this->input->post('ket')
		);
		$query=$this->db->insert('simpanan',$data);	
		return $query;
	}
	function H_simpanan($id){
		$this->db->where('id_simpanan',$id);
		return $this->db->delete('simpanan');
	}
	function S_simpanan($id){
		$query="SELECT * FROM simpanan,anggota WHERE simpanan.id_anggota=anggota.id_anggota AND simpanan.id_simpanan='$id'";
		return $this->db->query($query)->result();
		
	}
	function E_simpanan($id){
		$datastring="%Y-%m-%d";
		$time=time();
		$tgl=mdate($datastring,$time);
		$this->db->where('id_simpanan',$id);
		$data=array('nm_simpanan'=>$this->input->post('nm_simpanan'),
		'id_anggota'=>$this->input->post('id_anggota'),
		'tgl_simpanan'=>$tgl,
		'besar_simpanan'=>$this->input->post('besar_simpanan'),
		'ket'=>$this->input->post('ket')
		);
		$query=$this->db->update('simpanan',$data);
		return $query;
	}
	function msg($session,$style){
		if($this->session->userdata($session)){
			echo"<div class=$style>".$this->session->userdata($session)."</di>";
			$this->session->unset_userdata($session);
		}
	}
}

?>