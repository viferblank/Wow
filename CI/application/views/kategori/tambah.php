<table width='100%' class='A'>
<?php
echo form_open('C_kategori/T_kategori_pr',array('method'=>'POST'))
?>
	<tr>
		<th colspan='4'>Tambah kategori</th>
	</tr>

	<tr class='B'>
		<td>Nama Pinjaman</td>
		<td><input name='nama_pinjaman' type='text' ></td>
	</tr>
	<tr class='B'>
		<td></td>
		<td><input name='submit' type='submit' value='Tambah'></td>
	</tr>
<?php
echo form_close();
?>
</table>
