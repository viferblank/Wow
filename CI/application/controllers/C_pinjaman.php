<?php
class C_pinjaman extends CI_Controller{
	function pinjaman(){
		if($this->input->post('submit_src')){
			$this->session->set_userdata('find',$this->input->post('src'));
		}
		$data['page']='pinjaman';
		$data['slider']='off';
		$data['kategori']=$this->M_kategori->kategori();
		$data['anggota']=$this->M_anggota->anggota();
		$data['pinjaman']=$this->M_pinjaman->pinjaman();
		$this->load->view('index',$data);
	}
	function T_pinjaman(){
		$data['page']='T_pinjaman';
		$data['slider']='off';
		$data['kategori']=$this->M_kategori->kategori();
		$data['anggota']=$this->M_anggota->anggota();
		$data['pinjaman']=$this->M_pinjaman->pinjaman();
		$this->load->view('index',$data);
	}
	function T_pinjaman_pr(){
		$query=$this->M_pinjaman->T_pinjaman();
		if($query){
			$this->session->set_userdata('msgSukses','Sukses Menambah data');
			redirect('C_pinjaman/pinjaman');
		}else{
			$this->session->set_userdata('msgGagal','Gagal Menambah data');
			redirect('C_pinjaman/pinjaman');
		}	
	}
	function E_pinjaman(){
		$data['page']='E_pinjaman';
		$id=$this->uri->segment(3);
		$data['kategori']=$this->M_kategori->kategori();
		$data['anggota']=$this->M_anggota->anggota();
		$data['pinjaman']=$this->M_pinjaman->S_pinjaman($id);
		$this->load->view('index',$data);
	}
	function H_pinjaman(){
		$data['slider']='off';
		$id=$this->uri->segment(3);
		$query=$this->M_pinjaman->H_pinjaman($id);
		if($query){
			$this->session->set_userdata('msgSukses','Sukses Menghapus data');
			redirect('C_pinjaman/pinjaman');
		}else{
			$this->session->set_userdata('msgGagal','Gagal Menghapus data');
			redirect('C_pinjaman/pinjaman');
		}
	}
	function E_pinjaman_pr(){
		$data['slider']='off';
		$id=$this->input->post('id');
		$query=$this->M_pinjaman->E_pinjaman($id);
		if($query){
			$this->session->set_userdata('msgSukses','Sukses Mengedit data');
			redirect('C_pinjaman/pinjaman');
		}else{
			$this->session->set_userdata('msgGagal','Gagal Mengedit data');
			redirect('C_pinjaman/E_pinjaman');
		}	
	}
}

?>