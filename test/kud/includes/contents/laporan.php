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
					<tr class='light'>
						<th colspan=\"100%\"><center><h1>Laporan Transaksi</h1></center></th>
					</tr>
					<tr style=\"background:#ccc;\">
						<th width=\"10%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"laporan-order-no-desc\"><img src=\"images/top.png\"/></a>No
							<a style=\"float:right;\" href=\"laporan-order-no-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"20%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"laporan-order-id_transaksi-desc\"><img src=\"images/top.png\"/></a>Id Transaksi
							<a style=\"float:right;\" href=\"laporan-order-id_transaksi-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"25%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"laporan-order-id_barang-desc\"><img src=\"images/top.png\"/></a>Nama Barang
							<a style=\"float:right;\" href=\"laporan-order-id_barang-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"15%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"laporan-order-id_kasir-desc\"><img src=\"images/top.png\"/></a>Nama Kasir
							<a style=\"float:right;\" href=\"laporan-order-id_kasir-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"30%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"laporan-order-tgl_transaksi-desc\"><img src=\"images/top.png\"/></a>Tanggal Transaksi
							<a style=\"float:right;\" href=\"laporan-order-tgl_transaksi-asc\"><img src=\"images/down.png\"/></a>
						</th>
					</tr>";
						if(!isset($_GET['order'])){
							$transaksi = mysql_query("SELECT t.*,b.*,k.* FROM transaksi t,kasir k,barang b WHERE t.id_barang=b.id_barang AND t.id_kasir=k.id_kasir ORDER BY t.no DESC");
						}else{
							$order = addslashes($_GET['order']);
							$sort = addslashes($_GET['sort']);
							$transaksi = mysql_query("SELECT t.*,b.*,k.* FROM transaksi t,kasir k,barang b WHERE t.id_barang=b.id_barang AND t.id_kasir=k.id_kasir ORDER BY t.$order $sort");
						}$mulai=1;
							while($t = mysql_fetch_array($transaksi)){
								if($mulai%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
								echo "<td style=\"border:1px solid #000;\">$t[no]</td>
								<td style=\"border:1px solid #000;\">$t[id_transaksi]</td>
								<td style=\"text-align:center;border:1px solid #000;\">$t[nama_barang]</td>
								<td style=\"text-align:center;border:1px solid #000;\">$t[nama_kasir]</td>
								<td style=\"text-align:center;border:1px solid #000;\">$t[tgl_transaksi]</td></tr>";
								$mulai++;
							}
					echo "</table>";
				}
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'anggota')){
				//echo "<p class=\"readmore\"><a href=\"register\">Pesan Barang</a></p>";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'kasir')){
				//echo "<p class=\"readmore\"><a href=\"register\">Masukan kekeranjang</a></p>";
			}
			?>
			<br class="clear" />
			<br class="clear" />
	</div>
</div>