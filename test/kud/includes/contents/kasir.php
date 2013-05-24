<div class="wrapper col4">
	<br class="clear" />
	<div id="services">
			<?php
			if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
				echo "Maaf, anda tidak punya izin untuk melihat menu ini.";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'pengurus')){
				if(!isset($_GET['proses'])){
					echo "
					<table border=\"1\" style=\"color:#000;\">
					<tr style=\"background:#ccc;\">
						<th width=\"20%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"kasir-order-id_kasir-desc\"><img src=\"images/top.png\"/></a>ID Kasir
							<a style=\"float:right;\" href=\"kasir-order-id_kasir-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"25%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"kasir-order-nama_kasir-desc\"><img src=\"images/top.png\"/></a>Username
							<a style=\"float:right;\" href=\"kasir-order-nama_kasir-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"15%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"kasir-order-alamat-desc\"><img src=\"images/top.png\"/></a>Alamat
							<a style=\"float:right;\" href=\"kasir-order-alamat-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"15%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"kasir-order-telepon-desc\"><img src=\"images/top.png\"/></a>Telepon
							<a style=\"float:right;\" href=\"kasir-order-telepon-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"25%\" style=\"border:1px solid #000;\">Proses</th>
					</tr>";
						if(!isset($_GET['order'])){
							$kasir = mysql_query("SELECT * FROM kasir ");
						}else{
							$order = addslashes($_GET['order']);
							$sort = addslashes($_GET['sort']);
							$kasir = mysql_query("SELECT * FROM kasir ORDER BY $order $sort");
						}
						$mulai=1;
						while($a = mysql_fetch_array($kasir)){
							if($mulai%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"border:1px solid #000;\">$a[id_kasir]</td>
							<td style=\"border:1px solid #000;\">$a[nama_kasir]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[alamat]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[telepon]</td>
							<td style=\"text-align:center;border:1px solid #000;\">
							<a href=\"kasir-$a[id_kasir]-edit\">Edit</a> | <a href=\"kasir-$a[id_kasir]-hapus\">Hapus</a>
							</td></tr>";
							$mulai++;
						}
					echo "</table>";
					?>
					<form action="users/pengurus/proses/tambah.kasir.php" method="post">
					<style>.input{padding:4px;width:100%;}</style>
						<table border="1" style="color:#000;">
							<tr class='light'>
								<th colspan='2'><center><h1>Masukan Data Kasir baru</h1></center></th>
							</tr>
							<tr class='dark'>
								<td>Id Kasir</td>
								<td><input class="input" type="text" name="id" /></td>
							</tr>
							<tr class='light'>
								<td>Username</td>
								<td><input class="input" type="text" name="nama"/></td>
							</tr>
							<tr class='dark'>
								<td>Alamat Kasir</td>
								<td><input class="input" type="text" name="alamat"/></td>
							</tr>
							<tr class='light'>
								<td>Telepon</td>
								<td><input class="input" type="text" name="telepon"/></td>
							</tr>
							<tr class='dark'>
								<td></td>
								<td><input type="submit" name="submit" value="Tambah" /></td>
							</tr>
						</table>
					</form>
					<?php
				}else if($_GET['proses']=='edit'){
					if(!isset($_GET['id'])){
						echo "<script>document.location='kasir';</script>";
					}else{
						$id= addslashes($_GET['id']);
						$kasir = mysql_query("SELECT * FROM kasir WHERE id_kasir='$id'");
						$jkasir = mysql_num_rows($kasir);
						if($jkasir == 1){
							$a = mysql_fetch_array($kasir);?>
							<form action="users/pengurus/proses/edit.kasir.php" method="post">
							<style>.input{padding:4px;width:100%;}</style>
								<table border="1" style="color:#000;">
									<tr class='light'>
										<th colspan='2'><center><h1>Data Kasir</h1></center></th>
									</tr>
									<tr class='dark'>
										<td>Id Kasir</td>
										<td><input type="hidden" name="id" value="<?php echo $a['id_kasir']?>"/><?php echo $a['id_kasir'];?></td>
									</tr>
									<tr class='light'>
										<td>Username</td>
										<td><input class='input' type="text" name="nama" value="<?php echo $a['nama_kasir']?>"/></td>
									</tr>
									<tr class='dark'>
										<td>Alamat Kasir</td>
										<td><input class='input' type="text" name="alamat" value="<?php echo $a['alamat']?>"/></td>
									</tr>
									<tr class='light'>
										<td>Telepon</td>
										<td><input class='input' type="text" name="telepon" value="<?php echo $a['telepon']?>"/></td>
									</tr>
									<tr class='dark'>
										<td></td>
										<td><input type="submit" value="Edit" /></td>
									</tr>
								</table>
							</form>
							<?php
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='kasir';</script>";
						}
					}
				}else if($_GET['proses']=='hapus'){
					if(!isset($_GET['id'])){
						echo "<script>document.location='kasir';</script>";
					}else{
						$id= addslashes($_GET['id']);
						$kasir = mysql_query("SELECT * FROM kasir WHERE id_kasir='$id'");
						$jkasir = mysql_num_rows($kasir);
						if($jkasir == 1){
							$delete = mysql_query("DELETE FROM kasir WHERE id_kasir='$id'");
							if($delete){
								echo "<script>alert('Data berhasil dihapus');document.location='kasir';</script>";
							}else{
								echo "<script>alert('Data gagal dihapus');document.location='kasir';</script>";
							}
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='kasir';</script>";
						}
					}
				}
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'kasir')){
				//echo "<p class=\"readmore\"><a href=\"register\">Pesan Barang</a></p>";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'kasir')){
				//echo "<p class=\"readmore\"><a href=\"register\">Masukan kekeranjang</a></p>";
			}
			?>
			<br class="clear" />
			<br class="clear" />
	</div>
</div>