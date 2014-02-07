<?php
	$no=array(1,2,3);
	$nama=array('aldis','galih','vifer');


?>
	<table width='200px' border='1'>
		<tr>
			<td>No</td>
			<td>Nama</td>
		</tr>

<?php
?>
	<tr>
		<td><?php echo implode ($no); ?></td>
		<td><?php echo implode ($nama); ?></td>
	</tr>

	</table>

<?php
	include ("library/library.php");
	$lib = new library('motor');
	if(isset($_POST['simpan'])){
			$a['nama']=$_POST['nama'];
			$a['kelas']=$_POST['kelas'];
		$table='siswa';
		echo $lib->insert($table,$a);
	}
?>

<form method='POST'>
<input type='text' name='nama'><br>
<input type='text' name='kelas'><br>
<input type='submit' name='simpan'>
</form>

