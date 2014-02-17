<?php
echo form_open('C_simpanan/E_simpanan_pr',array('method'=>'POST'))
?>
	<?php 
		foreach($simpanan as $sim):
	?>
<table width='100%' class='A'>
			

	<tr>
		<th colspan='4'>Tambah Simpanan</th>
	</tr>
	<tr class='B'>
		<td>Nama Simpanan</td>
		<td><input name='nm_simpanan' type='text' value='<?php echo $sim->nm_simpanan ?>'></td>
	</tr>
	<tr class='B'>
		<td>Anggota</td>
		<td>
			<select name='id_anggota'>
					<option value='<?php echo $sim->id_anggota; ?>'><?php echo $sim->nama; ?></option>
			</select>
		</td>
	</tr>

	<tr class='B'>
		<td>Besar Simpanan</td>
		<td><input name='besar_simpanan' type='text' value='<?php echo $sim->besar_simpanan ?>'></td>
	</tr>
	<input type='hidden' name='id' value='<?php echo $sim->id_simpanan; ?>'/>
	<tr class='B'>
		<td></td>
		<td><input name='submit' type='submit' value='Edit'></td>
	</tr>
<?php
echo form_close();
endforeach;
?>
</table>
