<div class="wrapper col4">
	<br class="clear" />
	<div id="services">
			<?php
			if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
				$jumlah = mysql_query("SELECT id_barang FROM barang");
				$jml = mysql_num_rows($jumlah); //9
				$bagi = $jml /3; // 3
				$intbagi = (int)$bagi;// 3
				$kali = $intbagi * 3; //9
				
				$barang = mysql_query("SELECT * FROM barang ORDER BY id_barang DESC LIMIT $kali");
				$mulai= 1;
				$tiga = 3;
				echo "<ul>";
				while($b = mysql_fetch_array($barang)){
					if($mulai == 1){
						echo "<li>";
					}else if($mulai == $tiga){
						echo "<li class=\"last\">";
						$tambah = $mulai + $tiga;
					}else if($mulai == $tambah){
						echo "<li class=\"last\">";
						$tambah = $mulai + $tiga;
					}else{
						echo "<li>";
					}
					echo "<div>
						<h2>$b[nama_barang]</h2>
						<p>Jumlah : $b[jumlah_barang]<br>
						Harga : $b[harga_jual]</p>";
					include "functions/isset_link.php";
					echo "</div></li>";
					$mulai++;
				}
				echo "</ul>";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'pengurus')){
				if(!isset($_GET['proses'])){
					echo "
					<table border=\"1\" style=\"color:#000;\">
					<tr style=\"background:#ccc;\">
						<th width=\"15%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"barang-order-id_barang-desc\"><img src=\"images/top.png\"/></a>ID Barang
							<a style=\"float:right;\" href=\"barang-order-id_barang-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"20%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"barang-order-nama_barang-desc\"><img src=\"images/top.png\"/></a>Nama Barang
							<a style=\"float:right;\" href=\"barang-order-nama_barang-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"20%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"barang-order-jumlah_barang-desc\"><img src=\"images/top.png\"/></a>Jumlah Barang
							<a style=\"float:right;\" href=\"barang-order-jumlah_barang-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"15%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"barang-order-harga_jual-desc\"><img src=\"images/top.png\"/></a>Harga
							<a style=\"float:right;\" href=\"barang-order-harga_jual-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"30%\" style=\"border:1px solid #000;\">Proses</th>
					</tr>";
						if(!isset($_GET['order'])){
							$barang = mysql_query("SELECT * FROM barang ");
						}else{
							$order = addslashes($_GET['order']);
							$sort = addslashes($_GET['sort']);
							$barang = mysql_query("SELECT * FROM barang ORDER BY $order $sort");
						}
						$mulai=1;
						while($b = mysql_fetch_array($barang)){
							if($mulai%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"border:1px solid #000;\">$b[id_barang]</td>
							<td style=\"border:1px solid #000;\">$b[nama_barang]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$b[jumlah_barang]</td>
							<td style=\"text-align:center;border:1px solid #000;\">Rp. $b[harga_jual] ,-</td>
							<td style=\"text-align:center;border:1px solid #000;\">
							<a href=\"barang-$b[id_barang]-edit\">Edit</a> | 
							<a href=\"barang-$b[id_barang]-hapus\">Hapus</a> | 
							<a href=\"barang-$b[id_barang]-titip\">Titip Barang</a>
							</td></tr>";
							$mulai++;
						}
					echo "</table>";
					?>
					<form action="users/pengurus/proses/tambah.barang.php" method="post">
					<style>.input{padding:4px;width:100%;}</style>
						<table border="1" style="color:#000;">
							<tr class='light'>
								<th colspan='2'><center><h1>Masukan Data Barang baru</h1></center></th>
							</tr>
							<tr class='dark'>
								<td>Id Barang</td>
								<td><input class="input" type="text" name="id" /></td>
							</tr>
							<tr class='light'>
								<td>Nama Barang</td>
								<td><input class="input" type="text" name="nama"/></td>
							</tr>
							<tr class='dark'>
								<td>Jumlah Barang</td>
								<td><input class="input" type="text" name="jumlah"/></td>
							</tr>
							<tr class='light'>
								<td>Harga Jual</td>
								<td><input class="input" type="text" name="harga"/></td>
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
						echo "<script>document.location='barang';</script>";
					}else{
						$id= addslashes($_GET['id']);
						$barang = mysql_query("SELECT * FROM barang WHERE id_barang='$id'");
						$jbarang = mysql_num_rows($barang);
						if($jbarang == 1){
							$b = mysql_fetch_array($barang);?>
							<form action="users/pengurus/proses/edit.barang.php" method="post">
							<style>.input{padding:4px;width:100%;}</style>
								<table border="1" style="color:#000;">
									<tr class='light'>
										<th colspan='2'><center><h1>Data Barang</h1></center></th>
									</tr>
									<tr class='dark'>
										<td>Id Barang</td>
										<td><input type="hidden" name="id" value="<?php echo $b['id_barang']?>"/><?php echo $b['id_barang'];?></td>
									</tr>
									<tr class='light'>
										<td>Nama Barang</td>
										<td><input class='input' type="text" name="nama" value="<?php echo $b['nama_barang']?>"/></td>
									</tr>
									<tr class='dark'>
										<td>Jumlah Barang</td>
										<td><input class='input' type="text" name="jumlah" value="<?php echo $b['jumlah_barang']?>"/></td>
									</tr>
									<tr class='light'>
										<td>Harga Jual</td>
										<td><input class='input' type="text" name="harga" value="<?php echo $b['harga_jual']?>"/></td>
									</tr>
									<tr class='dark'>
										<td></td>
										<td><input type="submit" value="Edit" /></td>
									</tr>
								</table>
							</form>
							<br>
							
							<form action="users/pengurus/proses/edit.barang.php" method="post">
							<style>.input{padding:4px;width:100%;}</style>
								<table border="1" style="color:#000;">
									<tr class='light'>
										<th colspan='100%'><center><h1>Anggota yang Menitipkan Barang ini</h1></center></th>
									</tr>
									<tr class='dark'>
										<th>Id Anggota</th>
										<th>Nama Anggota</th>
										<th>Pengurus</th>
										<th>Jumlah Barang</th>
										<th>Harga Beli</th>
										<th>Tanggal Titip</th>
									</tr>
									<?php
										$titip = mysql_query("SELECT p.*,a.*,b.*,tb.* FROM pengurus p,anggota a,barang b,titip_barang tb WHERE p.id_pengurus=tb.id_pengurus AND
										a.id_anggota=tb.id_anggota AND b.id_barang=tb.id_barang AND tb.id_barang='$id'");
										$jtitip = mysql_num_rows($titip);
										if($jtitip == 0){
											echo "<tr class=\"light\"><td colspan=\"100%\"><center><h1>Tidak ada Anggota yang menitipkan barang ini</h1></center></td></tr>";
										}else{
											$mulai=1;
											while($anggota = mysql_fetch_array($titip)){
												if($mulai%2==0){ echo "<tr class=\"dark\">";}else{ echo "<tr class=\"light\">";}
												echo "<td>$anggota[id_anggota]</td>
												<td>$anggota[nama_anggota]</td>
												<td>$anggota[nama_pengurus]</td>
												<td>$anggota[jml_barang]</td>
												<td>Rp. $anggota[harga_beli] ,-</td>
												<td>$anggota[tgl_titip]</td></tr>";
												$mulai++;
											}
										}
									?>
								</table>
							</form>
							<?php
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='barang';</script>";
						}
					}
				}else if($_GET['proses']=='hapus'){
					if(!isset($_GET['id'])){
						echo "<script>document.location='barang';</script>";
					}else{
						$id= addslashes($_GET['id']);
						$barang = mysql_query("SELECT * FROM barang WHERE id_barang='$id'");
						$jbarang = mysql_num_rows($barang);
						if($jbarang == 1){
							$titip = mysql_query("SELECT id_barang FROM titip_barang WHERE id_barang='$id'");
							$jtitip = mysql_num_rows($titip);
							if($jtitip == 0){
								$delete = mysql_query("DELETE FROM barang WHERE id_barang='$id'");
								if($delete){
									echo "<script>alert('Data berhasil dihapus');document.location='barang';</script>";
								}else{
									echo "<script>alert('Data gagal dihapus');document.location='barang';</script>";
								}
							}else{
								echo "<script>alert('Masih ada Anggota yang masih menitipkan barang ini.');document.location='barang';</script>";
							}
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='barang';</script>";
						}
					}
				}else if($_GET['proses']=='titip'){
					if(!isset($_GET['id'])){
						echo "<script>document.location='barang';</script>";
					}else{
						$id= addslashes($_GET['id']);
						$barang = mysql_query("SELECT id_barang FROM barang WHERE id_barang='$id'");
						$jbarang = mysql_num_rows($barang);
						if($jbarang == 1){
							$b = mysql_fetch_array($barang);?>
							<form action="users/pengurus/proses/titip.barang.php" method="post">
							<style>.input{padding:4px;width:100%;}</style>
								<table border="1" style="color:#000;">
									<tr class='light'>
										<th colspan='2'><center><h1>Anggota Titip Barang</h1></center></th>
									</tr>
									<tr class='dark'>
										<td>Id Barang</td>
										<td><input type="hidden" name="idbarang" value="<?php echo $b['id_barang']?>"/><?php echo $b['id_barang'];?></td>
									</tr>
									<tr class='light'>
										<td>Nama Anggota</td>
										<td>
											<select class="input" name="anggota">
												<?php
												$anggota = mysql_query("SELECT * FROM anggota ");
												while($a = mysql_fetch_array($anggota)){
													echo "<option value=\"$a[id_anggota]\">$a[nama_anggota]</option>";
												}
												?>
											</select>
										</td>
									</tr>
									<tr class='dark'>
										<td>Jumlah Titipan</td>
										<td><input class='input' type="text" name="jumlah"/></td>
									</tr>
									<tr class='light'>
										<td>Harga Beli</td>
										<td><input class='input' type="text" name="harga" value="<?php echo $b['harga_jual']?>"/></td>
									</tr>
									<tr class='dark'>
										<td></td>
										<td><input type="submit" value="Titip Barang" /></td>
									</tr>
								</table>
							</form>
							<?php
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='barang';</script>";
						}
					}
				}
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'anggota')){
				$jumlah = mysql_query("SELECT id_barang FROM barang");
				$jml = mysql_num_rows($jumlah); //9
				$bagi = $jml /3; // 3
				$intbagi = (int)$bagi;// 3
				$kali = $intbagi * 3; //9
				
				$barang = mysql_query("SELECT * FROM barang ORDER BY id_barang DESC LIMIT $kali");
				$mulai= 1;
				$tiga = 3;
				echo "<ul>";
				while($b = mysql_fetch_array($barang)){
					if($mulai == 1){
						echo "<li>";
					}else if($mulai == $tiga){
						echo "<li class=\"last\">";
						$tambah = $mulai + $tiga;
					}else if($mulai == $tambah){
						echo "<li class=\"last\">";
						$tambah = $mulai + $tiga;
					}else{
						echo "<li>";
					}
					echo "<div>
						<h2>$b[nama_barang]</h2>
						<p>Jumlah : $b[jumlah_barang]<br>
						Harga : $b[harga_jual]</p>";
					include "functions/isset_link.php";
					echo "</div></li>";
					$mulai++;
				}
				echo "</ul>";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'kasir')){
			echo "<div class=\"wrapper col3\">
				<h2><center>Data Barang</center></h2>";
				   $query=mysql_query("select * from barang");
					echo "<table style='color:#000;' border='1' cellspacing=0 width=50% style=\"font-family:verdana;font-size:9pt\">
								<tr class=\"light\">
									<td align='center' width='10%'> No. </td>
									<td align='center' width='10%'> Id Barang </td>
									<td align='center' width='20%'> Nama Barang </td>
									<td align='center' width='20%'> Jumlah Barang </td>
									<td align='center' width='20%'> Harga Jual </td>
									<td align='center' width='20%'> Transaksi </td>
								</tr>";
								$index=0;
					$mulai=1;//http://localhost/kud/layanan
					while ($data=mysql_fetch_array($query)){
						$index++;
						if($mulai%2==0){echo "<tr class=\"light\" align=\"center\">";}else{echo "<tr class=\"dark\" align=\"center\">";}
							echo "<td>$index</td>
									<td>".$data['id_barang']."</td>
									<td>".$data['nama_barang']."</td>
									<td>".$data['jumlah_barang']."</td>
									<td>".$data['harga_jual']."</td>
									<td><a href=\"transaksi-id-$data[id_barang]\"> Masukan Transaksi</a></td>
								</tr>";
								$mulai++;
					}
					if($index==0){
						echo "<tr>
									<td colspan='5' align='center'>Data Kosong</td>
								</tr>";
					}
					echo "</table>";
				echo "</div>";
			}
			?>
			<br class="clear" />
			<br class="clear" />
	</div>
</div>