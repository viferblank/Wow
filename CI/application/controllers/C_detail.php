<?php
class C_detail extends CI_Controller{
	function detail(){
		if($this->input->post('submit_src')){
			$this->session->set_userdata('find',$this->input->post('src'));
		}
		$data['page']='detail';
		$data['slider']='off';
		$data['detail']=$this->M_detail->detail();
		$this->load->view('index',$data);
	}
	function T_detail(){
		$data['page']='T_detail';
		$data['slider']='off';
		$this->load->view('index',$data);
	}
	function T_detail_pr(){
		$query=$this->M_detail->T_detail();
		if($query){
			$this->session->set_userdata('msgSukses','Sukses Menambah data');
			redirect('C_detail/detail');
		}else{
			$this->session->set_userdata('msgGagal','Gagal Menambah data');
			redirect('C_detail/detail');
		}	
	}
	function E_detail(){
		$data['page']='E_detail';
		$id=$this->uri->segment(3);
		$data['detail']=$this->M_detail->S_detail($id);
		$this->load->view('index',$data);
	}
	function H_detail(){
		$data['slider']='off';
		$id=$this->uri->segment(3);
		$query=$this->M_detail->H_detail($id);
		if($query){
			$this->session->set_userdata('msgSukses','Sukses Menghapus data');
			redirect('C_detail/detail');
		}else{
			$this->session->set_userdata('msgGagal','Gagal Menghapus data');
			redirect('C_detail/detail');
		}
	}
	function E_detail_pr(){
		$data['slider']='off';
		$id=$this->input->post('id');
		$query=$this->M_detail->E_detail($id);
		if($query){
			$this->session->set_userdata('msgSukses','Sukses Mengedit data');
			redirect('C_detail/detail');
		}else{
			$this->session->set_userdata('msgGagal','Gagal Mengedit data');
			redirect('C_detail/E_detail');
		}	
	}
}

?>