<?php
class C_kategori extends CI_Controller{
	function kategori(){
		if($this->input->post('submit_src')){
			$this->session->set_userdata('find',$this->input->post('src'));
		}
		$data['page']='kategori';
		$data['slider']='off';
		$data['kategori']=$this->M_kategori->kategori();
		$this->load->view('index',$data);
	}
	function T_kategori(){
		$data['page']='T_kategori';
		$data['slider']='off';
		$this->load->view('index',$data);
	}
	function T_kategori_pr(){
		$query=$this->M_kategori->T_kategori();
		if($query){
			$this->session->set_userdata('msgSukses','Sukses Menambah data');
			redirect('C_kategori/kategori');
		}else{
			$this->session->set_userdata('msgGagal','Gagal Menambah data');
			redirect('C_kategori/kategori');
		}	
	}
	function E_kategori(){
		$data['page']='E_kategori';
		$id=$this->uri->segment(3);
		$data['kategori']=$this->M_kategori->S_kategori($id);
		$this->load->view('index',$data);
	}
	function H_kategori(){
		$data['slider']='off';
		$id=$this->uri->segment(3);
		$query=$this->M_kategori->H_kategori($id);
		if($query){
			$this->session->set_userdata('msgSukses','Sukses Menghapus data');
			redirect('C_kategori/kategori');
		}else{
			$this->session->set_userdata('msgGagal','Gagal Menghapus data');
			redirect('C_kategori/kategori');
		}
	}
	function E_kategori_pr(){
		$data['slider']='off';
		$id=$this->input->post('id');
		$query=$this->M_kategori->E_kategori($id);
		if($query){
			$this->session->set_userdata('msgSukses','Sukses Mengedit data');
			redirect('C_kategori/kategori');
		}else{
			$this->session->set_userdata('msgGagal','Gagal Mengedit data');
			redirect('C_kategori/E_kategori');
		}	
	}
}

?>