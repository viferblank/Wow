<?php
include "config.php";

?>
<form action='' method='POST' enctype='multipart/form-data'>
	<table width='100%' border='1'>
		<tr>
			<td>Username</td>
			<td><input name='user' type='text' value='<?php echo $_POST['user'];?>'/></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input name='pass' type='password' value=''/></td>
		</tr>
		<tr>
			<td>Fullname</td>
			<td><input name='full' type='text' value='<?php echo $_POST['full'];?>'/></td>
		</tr>
		<tr>
			<td>foto</td>
			<td><input type='file' name='foto' value='<?php echo $_POST['file'];?>'></td>
		</tr>
		<tr>
			<td></td>
			<td><input name='submit' type='submit' value='Submit'/></td>
		</tr>
	</table>
</form>