<?php
	if(file_exists("functions/proses.register.php")){
		$register = "functions/proses.register.php";
	}else if(file_exists("../functions/proses.register.php")){
		$register = "../functions/proses.register.php";
	}else if(file_exists("../../functions/proses.register.php")){
		$register = "../../functions/proses.register.php";
	}else if(file_exists("../../../functions/proses.register.php")){
		$register = "../../../functions/proses.register.php";
	}
?>
<div class="wrapper col4">
	<br class="clear" />
	<div id="services">
		<form action="<?php echo "$register";?>" method="post">
			<table border="1" style="color:#000;">
				<tr class='dark'>
					<th colspan='2'><center><h1>Daftar Anggota Koperasi Unit Desa (K.U.D)</h1></center></th>
				</tr>
				<tr class='light'>
					<td>Nama</td>
					<td><input type="text" name="nama" size="30"/></td>
				</tr>
				<tr class='dark'>
					<td>Email</td>
					<td><input type="text" name="email" size="30" /></td>
				</tr>
				<tr class='light'>
					<td>Kelamin</td>
					<td><input type="radio" name="kelamin" value="pria" />Pria 
					<input type="radio" name="kelamin" value="wanita" />Wanita</td>
				</tr>
				<tr class='dark'>
					<td>Username</td>
					<td><input type="text" name="username" size="30" /></td>
				</tr>
				<tr class='light'>
					<td>Password</td>
					<td><input type="password" name="password" size="30" /></td>
				</tr>
				<tr class='dark'>
					<td></td>
					<td><input type="submit" value="Daftar" /></td>
				</tr>
			</table>
		</form>
		<br class="clear" />
	</div>
</div>