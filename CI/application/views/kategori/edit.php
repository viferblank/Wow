<?php
echo form_open('C_kategori/E_kategori_pr',array('method'=>'POST'))
?>
	<?php 
		foreach($kategori as $sim):
	?>
<table width='100%' class='A'>
			

	<tr>
		<th colspan='4'>Edit Kategori Pinjaman</th>
	</tr>
	<tr class='B'>
		<td>Nama Pinjaman</td>
		<td><input name='nama_pinjaman' type='text' value='<?php echo $sim->nama_pinjaman; ?>'></td>
	</tr>
	<input type='hidden' name='id' value='<?php echo $sim->id_kategori_pinjaman; ?>'/>
	<tr class='B'>
		<td></td>
		<td><input name='submit' type='submit' value='Edit'></td>
	</tr>
<?php
echo form_close();
endforeach;
?>
</table>
