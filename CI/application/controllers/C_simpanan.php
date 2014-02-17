<?php
class C_simpanan extends CI_Controller{
	function simpanan(){
		if($this->input->post('submit_src')){
			$this->session->set_userdata('find',$this->input->post('src'));
		}
		$data['page']='simpanan';
		$data['slider']='off';
		$data['simpanan']=$this->M_simpanan->simpanan();
		$this->load->view('index',$data);
	}
	function T_simpanan(){
		$data['page']='T_simpanan';
		$data['slider']='off';
		$data['anggota']=$this->M_anggota->anggota();
		$this->load->view('index',$data);
	}
	function T_simpanan_pr(){
		$query=$this->M_simpanan->T_simpanan();
		if($query){
			$this->session->set_userdata('msgSukses','Sukses Menambah data');
			redirect('C_simpanan/simpanan');
		}else{
			$this->session->set_userdata('msgGagal','Gagal Menambah data');
			redirect('C_simpanan/simpanan');
		}	
	}
	function E_simpanan(){
		$data['page']='E_simpanan';
		$id=$this->uri->segment(3);
		$data['simpanan']=$this->M_simpanan->S_simpanan($id);
		$this->load->view('index',$data);
	}
	function H_simpanan(){
		$data['slider']='off';
		$id=$this->uri->segment(3);
		$query=$this->M_simpanan->H_simpanan($id);
		if($query){
			$this->session->set_userdata('msgSukses','Sukses Menghapus data');
			redirect('C_simpanan/simpanan');
		}else{
			$this->session->set_userdata('msgGagal','Gagal Menghapus data');
			redirect('C_simpanan/simpanan');
		}
	}
	function E_simpanan_pr(){
		$data['slider']='off';
		$id=$this->input->post('id');
		$query=$this->M_simpanan->E_simpanan($id);
		if($query){
			$this->session->set_userdata('msgSukses','Sukses Mengedit data');
			redirect('C_simpanan/simpanan');
		}else{
			$this->session->set_userdata('msgGagal','Gagal Mengedit data');
			redirect('C_simpanan/E_simpanan');
		}	
	}
}

?>