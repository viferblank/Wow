<table width='100%' class='A'>
<?php
echo form_open('C_angsuran/T_angsuran_pr',array('method'=>'POST'))
?>
	<tr>
		<th colspan='4'>Tambah angsuran</th>
	</tr>
	<tr class='B'>
		<td>Kategori Angsuran </td>
		<td>
			<select name='id_kategori'>
			<?php
				foreach($kategori as $kat):
			?>
				<option value='<?php echo $kat->id_kategori_pinjaman ?>'><?php echo $kat->nama_pinjaman; ?></option>
			<?php
				endforeach;
			?>
			</select>
		</td>
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
		<td>Angsuran Ke</td>
		<td><input name='angsuran_ke' type='text' ></td>
	</tr>
	<tr class='B'>
		<td>Besar angsuran</td>
		<td><input name='besar_angsuran' type='text' ></td>
	</tr>
	<tr class='B'>
		<td></td>
		<td><input name='submit' type='submit' value='Tambah'></td>
	</tr>
<?php
echo form_close();
?>
</table>
