<table class='A' width='100%'>
	<tr>
		<th colspan='7'>Data detail<label style='float:right;'><a href='<?php echo base_url(); ?>C_detail/T_detail'><button>Tambah</button></a></label><label style='float:right;'>
<?php
echo form_open('C_detail/detail',array('method'=>'POST'))
?>
		<input name='src' type='text' placeholder='Search..'><input type='submit' name='submit_src' value='find'/>
<?php
echo form_close();
?>	
		</label></th>
	</tr>
	<tr class=''>
		<td>No</td>
		<td>Id Angsuran</td>
		<td>Tanggal Jatuh Tempo</td>
		<td>Besar Angsuran</td>
		<td>Ket</td>
		<td>Action</td>
	</tr>
<?php
	echo $this->M_detail->msg('msgSukses','msg');
	echo $this->M_detail->msg('msgGagal','msg');
	$no=1;
	foreach($detail as $row):
?>
	<tr class='B'>
		<td><?php echo $no+$this->uri->segment(3); ?></td>
		<td><?php echo $row->id_angsuran; ?></td>
		<td><?php echo $row->tgl_jatuh_tempo; ?></td>
		<td><?php echo $row->besar_angsuran; ?></td>
		<td><?php echo $row->ket; ?></td>
		<td><a href='<?php echo base_url();?>C_detail/E_detail/<?php echo $row->id_angsuran; ?>'><div class='edit'>Edit</div></a> <a href='<?php echo base_url();?>C_detail/H_detail/<?php echo $row->id_angsuran; ?>' onclick="return confirm('Anda yakin ingin menghapus nya..!!')"><div class='edit'>Hapus</div></a></td>
	</tr>
<?php
	$no++;
	endforeach;
?>
</table>
<?php
echo $this->pagination->create_links();
?>