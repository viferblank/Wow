<?php
class M_detail extends CI_Model{
	function detail(){
			$config['per_page']=10;
			$config['next_link']='Next >>';
			$config['prev_link']='<< Prev';
			$config['base_url']=base_url().'C_detail/detail';
			$config['uri_segment']=3;
			$offset=$this->uri->segment(3);
			$config['total_rows']=$this->db->count_all('detail_angsuran');
			if(empty($offset)){
				$offset=0;
			}
			$page=$config['per_page'];
			$this->pagination->initialize($config);
			$query=$this->db->query("SELECT * FROM detail_angsuran LIMIT $offset,$page");
			if($query->num_rows() < 1){
				$this->session->set_userdata('msg','Data belum ada');
			}
			return $query->result();
	}
	function T_detail(){
		$tanggal=$this->input->post('tgl');
		$bln=$this->input->post('bln');
		$thn=$this->input->post('thn');
		$tgl=$thn.$bln.$tanggal;
		$data=array('id_angsuran'=>$this->input->post('id_angsuran'),
		'tgl_jatuh_tempo'=>$tgl,
		'besar_angsuran'=>$this->input->post('besar_angsuran'),
		'ket'=>$this->input->post('ket')
		);
		$query=$this->db->insert('detail_angsuran',$data);	
		return $query;
	}
	function H_detail($id){
		$this->db->where('id_angsuran',$id);
		return $this->db->delete('detail_angsuran');
	}
	function S_detail($id){
		$query="SELECT * FROM detail_angsuran WHERE id_angsuran='$id'";
		return $this->db->query($query)->result();
		
	}
	function E_detail($id){
		$this->db->where('id_angsuran',$id);
		$data=array('id_angsuran'=>'',
		'tgl_jatuh_tempo'=>'',
		'besar_angsuran'=>$this->input->post('ket'),
		'ket'=>$this->input->post('ket')
		);
		$query=$this->db->update('detail_angsuran',$data);
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