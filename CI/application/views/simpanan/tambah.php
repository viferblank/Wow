<table width='100%' class='A'>
<?php
echo form_open('C_simpanan/T_simpanan_pr',array('method'=>'POST'))
?>
	<tr>
		<th colspan='4'>Tambah Simpanan</th>
	</tr>
	<tr class=''>
		<td>Nama Simpanan</td>
		<td><input name='nm_simpanan' type='text' ></td>
	</tr>
	<tr class='B'>
		<td>Anggota</td>
		<td>
			<select name='id_anggota'>
	<?php foreach($anggota as $row):
	?>			
		<option value='<?php echo $row->id_anggota; ?>'><?php echo $row->nama; ?></option>
	<?php
	endforeach;
	?>
			</select>
		</td>
	</tr>

	<tr class='B'>
		<td>Besar Simpanan</td>
		<td><input name='besar_simpanan' type='text' ></td>
	</tr>
	<tr class='B'>
		<td></td>
		<td><input name='submit' type='submit' value='Tambah'></td>
	</tr>
<?php
echo form_close();
?>
</table>
