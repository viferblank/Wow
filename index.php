<?php
include"library/config.php";

?>
<form action='' method='POST'>
<table width='100%' border='1'>
	<tr>
		<th colspan='8'>Data_Teu_Nyaho</th>
	</tr>
	<tr>
		<td>No</td>
		<td>Username</td>
		<td>Password</td>
		<td>Fullname</td>
		<td>Foto</td>
		<td>Akses</td>
		<td>Status</td>
		<td>Aksi</td>
	</tr>
<?php
	$no=1;
	
	$sql = get('login');
	while($row=mysql_fetch_array($sql) or die("".mysql_error())){
?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['username']; ?></td>
		<td><?php echo "*****"; ?></td>
		<td><?php echo $row['fullname']; ?></td>
		<td><img src="file/<?php echo $row['foto']; ?>" width='20px' height='20px'></img></td>
		<td><?php echo $row['akses']; ?></td>
		<td><?php echo $row['status']; ?></td>
		<td><a onclick="return confirm('Apakah anda yakin .. !')" href='delete.php?id=<?php echo $row['id_login']; ?>'>Delete</a> | <a href='edit.php?id=<?php echo $row['id_login']; ?>'>Edit</a></td>
	</tr>
<?php
$no++;
}
?>
</table>
</form>