<?php
class M_kategori extends CI_Model{
	function kategori(){
		if($this->input->post('src')){
			$fint=$this->session->userdata('find');
			$like="SELECT * FROM kategori_pinjaman nama_pinjaman LIKE '%$fint%'";
			$src="where nama_pinjaman LIKE '%$fint%'";
		}else{
			$fint=$this->session->userdata('find');
			$like="SELECT * FROM kategori";
			$src="";
		}
			$config['per_page']=10;
			$config['next_link']='Next >>';
			$config['prev_link']='<< Prev';
			$config['base_url']=base_url().'C_kategori/kategori';
			$config['uri_segment']=3;
			$offset=$this->uri->segment(3);
			$config['total_rows']=$this->db->query($like)->num_rows();
			if(empty($offset)){
				$offset=0;
			}
			$page=$config['per_page'];
			$this->pagination->initialize($config);
			$query=$this->db->query("SELECT * FROM kategori_pinjaman $src LIMIT $offset,$page");
			if($query->num_rows() < 1){
				$this->session->set_userdata('msg','Data belum ada');
			}
			return $query->result();
	}
	function T_kategori(){
		$datastring="%Y-%m-%d";
		$time=time();
		$tgl=mdate($datastring,$time);
		$data=array('nama_pinjaman'=>$this->input->post('nama_pinjaman'),
		);
		$query=$this->db->insert('kategori_pinjaman',$data);	
		return $query;
	}
	function H_kategori($id){
		$this->db->where('id_kategori_pinjaman',$id);
		return $this->db->delete('kategori_pinjaman');
	}
	function S_kategori($id){
		$query="SELECT * FROM kategori_pinjaman where id_kategori_pinjaman='$id'";
		return $this->db->query($query)->result();
		
	}
	function E_kategori($id){
		$datastring="%Y-%m-%d";
		$time=time();
		$tgl=mdate($datastring,$time);
		$this->db->where('id_kategori_pinjaman',$id);
		$data=array('nama_pinjaman'=>$this->input->post('nama_pinjaman'),
		);
		$query=$this->db->update('kategori_pinjaman',$data);
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