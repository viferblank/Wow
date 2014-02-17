<table class='A' width='100%'>
	<tr>
		<th colspan='7'>Data kategori<label style='float:right;'><a href='<?php echo base_url(); ?>C_kategori/T_kategori'><button>Tambah</button></a></label><label style='float:right;'>
<?php
echo form_open('C_kategori/kategori',array('method'=>'POST'))
?>
		<input name='src' type='text' placeholder='Search..'><input type='submit' name='submit_src' value='find'/>
<?php
echo form_close();
?>	
		</label></th>
	</tr>
	<tr class=''>
		<td>No</td>
		<td>Nama Kategori Pinjaman</td>
		<td>Action</td>
	</tr>
<?php
	echo $this->M_kategori->msg('msgSukses','msg');
	echo $this->M_kategori->msg('msgGagal','msg');
	$no=1;
	foreach($kategori as $row):
?>
	<tr class='B'>
		<td><?php echo $no+$this->uri->segment(3); ?></td>
		<td><?php echo $row->nama_pinjaman; ?></td>
		<td><a href='<?php echo base_url();?>C_kategori/E_kategori/<?php echo $row->id_kategori_pinjaman; ?>'><div class='edit'>Edit</div></a> <a href='<?php echo base_url();?>C_kategori/H_kategori/<?php echo $row->id_kategori_pinjaman; ?>' onclick="return confirm('Anda yakin ingin menghapus nya..!!')"><div class='edit'>Hapus</div></a></td>
	</tr>
<?php
	$no++;
	endforeach;
?>
</table>
<?php
echo $this->pagination->create_links();
?>