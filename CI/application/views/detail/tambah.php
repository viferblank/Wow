<table width='100%' class='A'>
<?php
echo form_open('C_detail/T_detail_pr',array('method'=>'POST'))
?>
	<tr>
		<th colspan='4'>Tambah detail Angsuran</th>
	</tr>

	<tr class='B'>
		<td>Angsuran</td>
		<td>
			<select name='id_angsuran'>
			<?php foreach($angsuran as $row): ?>
				<option value='<?php echo $row->id_angsuran; ?>'><?php echo $row->id_angsuran; ?></option>
			<?php endforeach;  ?>
			</select>
		</td>
	</tr>
	<tr class='B'>
		<td>Jatuh Tempo</td>
		<td>
									<select name='tgl'>
									<option>Tanggal</option>
										<?php
										for($i = 1;$i < 32;$i++) {
											$tgl = ($i < 10)?"0".$i:$i;
											echo "<option value='$tgl'>$tgl</option>";
										}
										?>
									</select>	
									 
									<select name='bln'>
									<option>Bulan</option>
										<?php
										for($i = 1;$i < 13;$i++) {
											$bln = ($i < 10)?"0".$i:$i;
											echo "<option value='$bln'>$bln</option>";
										}
										?>
									</select>	
									<select name='thn'>
									<option>Tahun</option>
										<?php
										for($i = 2012;$i > 1944;$i--) {
											$thn = ($i < 10)?"0".$i:$i;
											eho "<option value='$thn' class='span2'>$thn</option>";
										}
										?>
									</select>
		</td>
	</tr>
	<tr class='B'>
		<td>Besar Angsuran</td>
		<td><input name='besar_angsuran' type='text'></td>
	</tr>
	<tr class='B'>
		<td>Ket</td>
		<td><textarea name='ket'></textarea></td>
	</tr>
	<tr class='B'>
		<td></td>
		<td><input name='submit' type='submit' value='Tambah'></td>
	</tr>
<?php
echo form_close();
?>
</table>
