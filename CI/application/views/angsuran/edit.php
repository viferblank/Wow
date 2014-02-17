<table width='100%' class='A'>
<?php
echo form_open('C_angsuran/E_angsuran_pr',array('method'=>'POST'))
?>
<?php 
	foreach($angsuran as $as):
?>
	<tr>
		<th colspan='4'>Mengedit angsuran</th>
	</tr>
	<tr class='B'>
		<td>Kategori Angsuran </td>
		<td>
			<select name='id_kategori'>
			<?php
				foreach($kategori as $kat):
					if ($kat->id_kategori_pinjaman == $as->id_kategori ){										
						$a = $kat->id_kategori_pinjaman."\" selected=\"selected";
						}else {
						$a= $kat->id_kategori_pinjaman;
					}
			?>

				<option value='<?php echo $a ?>'><?php echo $kat->nama_pinjaman; ?></option>
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
					if ($row->id_anggota == $as->id_anggota ){										
						$a = $row->id_anggota."\" selected=\"selected";
						}else {
						$a= $row->id_anggota;
					}
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
