<?php
class C_angsuran extends CI_Controller{
	function angsuran(){
		if($this->input->post('submit_src')){
			$this->session->set_userdata('find',$this->input->post('src'));
		}
		$data['page']='angsuran';
		$data['slider']='off';
		$data['kategori']=$this->M_kategori->kategori();
		$data['anggota']=$this->M_anggota->anggota();
		$data['angsuran']=$this->M_angsuran->angsuran();
		$this->load->view('index',$data);
	}
	function T_angsuran(){
		$data['page']='T_angsuran';
		$data['slider']='off';
		$data['kategori']=$this->M_kategori->kategori();
		$data['anggota']=$this->M_anggota->anggota();
		$data['angsuran']=$this->M_angsuran->angsuran();
		$this->load->view('index',$data);
	}
	function T_angsuran_pr(){
		$query=$this->M_angsuran->T_angsuran();
		if($query){
			$this->session->set_userdata('msgSukses','Sukses Menambah data');
			redirect('C_angsuran/angsuran');
		}else{
			$this->session->set_userdata('msgGagal','Gagal Menambah data');
			redirect('C_angsuran/angsuran');
		}	
	}
	function E_angsuran(){
		$data['page']='E_angsuran';
		$id=$this->uri->segment(3);
		$data['kategori']=$this->M_kategori->kategori();
		$data['anggota']=$this->M_anggota->anggota();
		$data['angsuran']=$this->M_angsuran->angsuran();
		$data['angsuran']=$this->M_angsuran->S_angsuran($id);
		$this->load->view('index',$data);
	}
	function H_angsuran(){
		$data['slider']='off';
		$id=$this->uri->segment(3);
		$query=$this->M_angsuran->H_angsuran($id);
		if($query){
			$this->session->set_userdata('msgSukses','Sukses Menghapus data');
			redirect('C_angsuran/angsuran');
		}else{
			$this->session->set_userdata('msgGagal','Gagal Menghapus data');
			redirect('C_angsuran/angsuran');
		}
	}
	function E_angsuran_pr(){
		$data['slider']='off';
		$id=$this->input->post('id');
		$query=$this->M_angsuran->E_angsuran($id);
		if($query){
			$this->session->set_userdata('msgSukses','Sukses Mengedit data');
			redirect('C_angsuran/angsuran');
		}else{
			$this->session->set_userdata('msgGagal','Gagal Mengedit data');
			redirect('C_angsuran/E_angsuran');
		}	
	}
}

?>