<?php
class M_angsuran extends CI_Model{
	function angsuran(){
		if($this->input->post('src')){
			$fint=$this->session->userdata('find');
			$like="SELECT * FROM angsuran,kategori_pinjaman,anggota WHERE anggota.id_anggota=angsuran.id_anggota AND angsuran.id_kategori=kategori_pinjaman.id_kategori_pinjaman AND anggota.nama LIKE '%$fint%'";
			$src="AND anggota.nama LIKE '%$fint%'";
		}else{
			$fint=$this->session->userdata('find');
			$like="SELECT * FROM angsuran,kategori_pinjaman,anggota WHERE anggota.id_anggota=angsuran.id_anggota AND angsuran.id_kategori=kategori_pinjaman.id_kategori_pinjaman";
			$src="";
		}
			$config['per_page']=10;
			$config['next_link']='Next >>';
			$config['prev_link']='<< Prev';
			$config['base_url']=base_url().'C_angsuran/angsuran';
			$config['uri_segment']=3;
			$offset=$this->uri->segment(3);
			$config['total_rows']=$this->db->query($like)->num_rows();
			if(empty($offset)){
				$offset=0;
			}
			$page=$config['per_page'];
			$this->pagination->initialize($config);
			$query=$this->db->query("SELECT * FROM angsuran,kategori_pinjaman,anggota WHERE anggota.id_anggota=angsuran.id_anggota AND angsuran.id_kategori=kategori_pinjaman.id_kategori_pinjaman $src LIMIT $offset,$page");
			if($query->num_rows() < 1){
				$this->session->set_userdata('msg','Data belum ada');
			}
			return $query->result();
	}
	function T_angsuran(){
		$datastring="%Y-%m-%d";
		$time=time();
		$tgl=mdate($datastring,$time);
		$data=array(
		'id_kategori'=>$this->input->post('id_kategori'),
		'id_anggota'=>$this->input->post('id_anggota'),
		'tgl_pembayaran'=>$tgl,
		'angsuran_ke'=>$this->input->post('angsuran_ke'),
		'besar_angsuran'=>$this->input->post('besar_angsuran'),
		'ket'=>$this->input->post('ket')
		);
		$query=$this->db->insert('angsuran',$data);	
		return $query;
	}
	function H_angsuran($id){
		$this->db->where('id_angsuran',$id);
		return $this->db->delete('angsuran');
	}
	function S_angsuran($id){
		$query="SELECT * FROM angsuran,kategori_pinjaman,anggota WHERE anggota.id_anggota=angsuran.id_anggota AND angsuran.id_kategori=kategori_pinjaman.id_kategori_pinjaman AND angsuran.id_angsuran='$id'";
		return $this->db->query($query)->result();
		
	}
	function E_angsuran($id){
		$tanggal=$this->input->post('tgl');
		$bln=$this->input->post('bln');
		$thn=$this->input->post('thn');
		$tgl=$thn.$bln.$tanggal;
		$this->db->where('id_angsuran',$id);
		$data=array('id_angsuran'=>$this->input->post('id_angsuran'),
		'id_kategori'=>$this->input->post('id_kategori'),
		'id_anggota'=>$this->input->post('id_anggota'),
		'tgl_pembayaran'=>$tgl,
		'angsuran_ke'=>$this->input->post('angsuran_ke'),
		'besar_angsuran'=>$this->input->post('besar_angsuran'),
		'ket'=>$this->input->post('ket')
		);
		$query=$this->db->update('angsuran',$data);
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