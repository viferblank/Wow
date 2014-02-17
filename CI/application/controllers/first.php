<?php
 class First extends CI_Controller{
	function index(){
		$data['student']=$this->m_first->student();
		$this->load->view('index',$data);
	}
	function H_student(){
		$query=$this->m_first->h_student();
		if($query){
			$this->session->set_userdata('sukses','Sukses Delete');
			echo"<script>location='".base_url()."'</script>";
		}else{
			$this->session->set_userdata('gagal','Gagal Delete');
			echo"<script>location='".base_url()."'</script>";		
		}
	}
 }
?>