<?php
echo form_open('C_detail/E_detail_pr',array('method'=>'POST'))
?>
	<?php 
		foreach($detail as $sim):
	?>
<table width='100%' class='A'>
			

	<tr>
		<th colspan='4'>Edit detail Angsuran</th>
	</tr>
	<tr class='B'>
		<td>Angsuran</td>
		<td>
			<input name='id_angsuran' type='text' value='<?php echo $sim->id_angsuran?>'/>
		</td>
	</tr>
	<tr class='B'>
		<td>Jatuh Tempo</td>
		<td>
		<?php 
		$kata=$sim->tgl_jatuh_tempo;
		$tahun=substr($kata,0,4);
		$bulan=substr($kata,5,2);
		$tanggal=substr($kata,8,2);
		?>
									<select name='tgl'>
									<option>Tanggal</option>
										<?php
										for($i = 1;$i < 32;$i++) {
											$tgl = ($i < 10)?"0".$i:$i;
												if ($tgl == $tanggal ){
												
													$a = $tgl."\" selected=\"selected";
												}else {
												$a= $tgl;
												}
											?>
											<option value="<?php echo $a; ?>"><?php echo $tgl; ?></option>";
										<?php
											}
										?>
									</select>	
									 
									<select name='bln'>
									<option>Bulan</option>
										<?php
										for($i = 1;$i < 13;$i++) {
											$bln = ($i < 10)?"0".$i:$i;
												if ($bln == $bulan ){										
													$a = $bln."\" selected=\"selected";
												}else {
												$a= $bln;
												}
										?>
											<option value="<?php echo $a; ?>"><?php echo $bln; ?></option>";
										<?php
										}
										?>
									</select>	
									<select name='thn'>
									<option>Tahun</option>
										<?php
										for($i = 2012;$i > 1944;$i--) {
											$thn = ($i < 10)?"0".$i:$i;
												if ($bln == $tahun ){										
													$a = $bln."\" selected=\"selected";
												}else {
												$a= $bln;
												}
											?>
											<option value="<?php echo $a; ?>"><?php echo $thn; ?></option>";
											<?php										
										}
										?>
									</select>
		</td>
	</tr>
	<tr class='B'>
		<td>Besar Angsuran</td>
		<td><input name='besar_angsuran' type='text' value='<?php echo $sim->besar_angsuran;?>'></td>
	</tr>
	<tr class='B'>
		<td>Ket</td>
		<td><textarea name='ket'><?php echo $sim->ket; ?></textarea></td>
	</tr>
	<input type='hidden' name='id' value='<?php echo $sim->id_angsuran; ?>'/>
	<tr class='B'>
		<td></td>
		<td><input name='submit' type='submit' value='Edit'></td>
	</tr>
<?php
echo form_close();
endforeach;
?>
</table>
