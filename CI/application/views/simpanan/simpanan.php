<table class='A' width='100%'>
	<tr>
		<th colspan='7'>Data Simpanan<label style='float:right;'><a href='<?php echo base_url(); ?>C_simpanan/T_simpanan'><button>Tambah</button></a></label><label style='float:right;'>
<?php
echo form_open('C_simpanan/simpanan',array('method'=>'POST'))
?>
		<input name='src' type='text' placeholder='Search..'><input type='submit' name='submit_src' value='find'/>
<?php
echo form_close();
?>	
		</label></th>
	</tr>
	<tr class=''>
		<td>No</td>
		<td>Nama Simpanan</td>
		<td>Nama Anggota</td>
		<td>Alamat</td>
		<td>Tanggal Lahir</td>
		<td>Tanggal Simpanan</td>
		<td>Besar Simpanan</td>
		<td>Ket</td>
		<td>Action</td>
	</tr>
<?php
	echo $this->M_simpanan->msg('msgSukses','msg');
	echo $this->M_simpanan->msg('msgGagal','msg');
	$no=1;
	foreach($simpanan as $row):
?>
	<tr class='B'>
		<td><?php echo $no+$this->uri->segment(3); ?></td>
		<td><?php echo $row->nm_simpanan; ?></td>
		<td><?php echo $row->nama; ?></td>
		<td><?php echo $row->alamat; ?></td>
		<td><?php echo $row->tgl_lhr; ?></td>
		<td><?php echo $row->tgl_simpanan; ?></td>
		<td><?php echo $row->besar_simpanan; ?></td>
		<td><?php echo $row->ket; ?></td>
		<td><a href='<?php echo base_url();?>C_simpanan/E_simpanan/<?php echo $row->id_simpanan; ?>'><div class='edit'>Edit</div></a> <a href='<?php echo base_url();?>C_simpanan/H_simpanan/<?php echo $row->id_simpanan; ?>' onclick="return confirm('Anda yakin ingin menghapus nya..!!')"><div class='edit'>Hapus</div></a></td>
	</tr>
<?php
	$no++;
	endforeach;
?>
</table>
<?php
echo $this->pagination->create_links();
?>