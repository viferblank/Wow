<?php
class M_pinjaman extends CI_Model{
	function pinjaman(){
		if($this->input->post('src')){
			$fint=$this->session->userdata('find');
			$like="SELECT * FROM pinjaman,anggota WHERE anggota.id_anggota=pinjaman.id_anggota AND anggota.nama LIKE '%$fint%'";
			$src="AND anggota.nama LIKE '%$fint%'";
		}else{
			$fint=$this->session->userdata('find');
			$like="SELECT * FROM pinjaman,anggota WHERE anggota.id_anggota=pinjaman.id_anggota";
			$src="";
		}
			$config['per_page']=10;
			$config['next_link']='Next >>';
			$config['prev_link']='<< Prev';
			$config['base_url']=base_url().'C_pinjaman/pinjaman';
			$config['uri_segment']=3;
			$offset=$this->uri->segment(3);
			$config['total_rows']=$this->db->query($like)->num_rows();
			if(empty($offset)){
				$offset=0;
			}
			$page=$config['per_page'];
			$this->pagination->initialize($config);
			$query=$this->db->query("SELECT * FROM pinjaman,anggota WHERE anggota.id_anggota=pinjaman.id_anggota $src LIMIT $offset,$page");
			if($query->num_rows() < 1){
				$this->session->set_userdata('msg','Data belum ada');
			}
			return $query->result();
	}
	function T_pinjaman(){
		$datastring="%Y-%m-%d";
		$time=time();
		$tgl=mdate($datastring,$time);
		$data=array('nm_pinjaman'=>$this->input->post('nm_pinjaman'),
		'id_anggota'=>$this->input->post('id_anggota'),
		'tgl_pinjaman'=>$tgl,
		'besar_pinjaman'=>$this->input->post('besar_pinjaman'),
		'ket'=>$this->input->post('ket')
		);
		$query=$this->db->insert('pinjaman',$data);	
		return $query;
	}
	function H_pinjaman($id){
		$this->db->where('id_pinjaman',$id);
		return $this->db->delete('pinjaman');
	}
	function S_pinjaman($id){
		$query="SELECT * FROM pinjaman,anggota WHERE pinjaman.id_anggota=anggota.id_anggota AND pinjaman.id_pinjaman='$id'";
		return $this->db->query($query)->result();
		
	}
	function E_pinjaman($id){
		$datastring="%Y-%m-%d";
		$time=time();
		$tgl=mdate($datastring,$time);
		$this->db->where('id_pinjaman',$id);
		$data=array('nm_pinjaman'=>$this->input->post('nm_pinjaman'),
		'id_anggota'=>$this->input->post('id_anggota'),
		'tgl_pinjaman'=>$tgl,
		'besar_pinjaman'=>$this->input->post('besar_pinjaman'),
		'ket'=>$this->input->post('ket')
		);
		$query=$this->db->update('pinjaman',$data);
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