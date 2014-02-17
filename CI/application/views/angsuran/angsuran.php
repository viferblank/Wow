<table class='A' width='100%'>
	<tr>
		<th colspan='8'>Data angsuran<label style='float:right;'><a href='<?php echo base_url(); ?>C_angsuran/T_angsuran'><button>Tambah</button></a></label><label style='float:right;'>
<?php
echo form_open('C_angsuran/angsuran',array('method'=>'POST'))
?>
		<input name='src' type='text' placeholder='Search..'><input type='submit' name='submit_src' value='find'/>
<?php
echo form_close();
?>	
		</label></th>
	</tr>
	<tr class=''>
		<td>No</td>
		<td>Nama Pinjaman</td>
		<td>Nama Anggota</td>
		<td>Tanggal Pembayaran</td>
		<td>Angsuran Ke</td>
		<td>Besar angsuran</td>
		<td>Ket</td>
		<td>Action</td>
	</tr>
<?php
	echo $this->M_angsuran->msg('msgSukses','msg');
	echo $this->M_angsuran->msg('msgGagal','msg');
	$no=1;
	foreach($angsuran as $row):
?>
	<tr class='B'>
		<td><?php echo $no+$this->uri->segment(3); ?></td>
		<td><?php echo $row->nama_pinjaman; ?></td>
		<td><?php echo $row->nama; ?></td>
		<td><?php echo $row->tgl_pembayaran; ?></td>
		<td><?php echo $row->angsuran_ke; ?></td>
		<td><?php echo $row->besar_angsuran; ?></td>
		<td><?php echo $row->ket; ?></td>
		<td><a href='<?php echo base_url();?>C_angsuran/E_angsuran/<?php echo $row->id_angsuran; ?>'><div class='edit'>Edit</div></a> <a href='<?php echo base_url();?>C_angsuran/H_angsuran/<?php echo $row->id_angsuran; ?>' onclick="return confirm('Anda yakin ingin menghapus nya..!!')"><div class='edit'>Hapus</div></a></td>
	</tr>
<?php
	$no++;
	endforeach;
?>
</table>
<?php
echo $this->pagination->create_links();
?>