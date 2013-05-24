<div class="wrapper col4">
	<br class="clear" />
	<div id="services">
		<h2><center>Transaksi</center></h2>
		<form action="functions/savetransaksi.php" method="POST"> 
		<input type="hidden" name="no" value="<?php print $baris[no]?>">
		<table align="center" width="35"> 
		<tr class="light">
		 <td colspan="2"><span style='color:#000;'>No</span></td>
		 <td style="color:#000;">
			<?php
				$max = mysql_query("SELECT MAX(no) AS no FROM transaksi");
				$m = mysql_fetch_array($max);
				$no = $m[no] + 1;
			?>
			<input name="no" type="hidden" value="<?php echo "$no";?>"><?php echo "$no";?></td>
		 </tr> 
		 <tr class="dark"> 
		 <td colspan="2"><span style='color:#000;'>Id Transaksi</span></td> 
		 <td>
		 <input name="id_transaksi" type="text" value="">
			<?php
				if(isset($_GET['id_barang'])){
					echo "Masukan ID";
				}
			?>
		 </td> 
		 </tr>
		 <tr class="light"> 
		 <td colspan="2" valign="top"><span style='color:#000;'>Id Barang</span></td>
		<td><select name="id_barang">
			<?php
				$barang = mysql_query("SELECT * FROM barang");
				while($b = mysql_fetch_array($barang)){
					if(!isset($_GET['id_barang'])){
						echo "<option value=\"$b[id_barang]\">$b[nama_barang]</option>";
					}else{
						if($b['id_barang']==$_GET['id_barang']){
							echo "<option value=\"$b[id_barang]\" selected>$b[nama_barang]</option>";
						}else{
							echo "<option value=\"$b[id_barang]\">$b[nama_barang]</option>";
						}
					}
				}
			?>
		</select></td>
		 </tr>
		  <tr class="dark"> 
		 <td colspan="2" valign="top"><span style='color:#000;'>Id Kasir</span></td>
		 <td style="color:#000;">
			<?php
				$kasir = mysql_query("SELECT * FROM kasir WHERE nama_kasir='$_SESSION[nama]' AND password='$_SESSION[pass]'");
				$jumlahkasir = mysql_num_rows($kasir);
				if($jumlahkasir==1){
					$k = mysql_fetch_array($kasir);
					$idkasir=$k[id_kasir];
				}else{
					$idkasir="Anda belum Login";
				}
			?>
		 <input name="id_kasir" type="hidden" value="<?php echo "$idkasir";?>"><?php echo "$idkasir";?></td>
		 </tr>
		 <tr class="light"> 
		 <td colspan="3" align="center"><input type=submit value="input"></td>
		 </tr>
		 </form>
		<?php
		include "configurasi/conn.php"; 
		//session_start();
		if(isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		   $query=mysql_query("select * from transaksi");
			echo "<table style='color:#000;' border='1' cellspacing=0 width=50% style=\"font-family:verdana;font-size:9pt\">
						<tr class=\"dark\">
							<td align='center' width='10%'> No. </td>
							<td align='center' width='15%'> Id Transaksi </td>
							<td align='center' width='25%'> Id Barang </td>
							<td align='center' width='20%'> Id Kasir </td>
							<td align='center' width='30%'> Tanggal Transaksi </td>
						</tr>";
						$index=0;
						$mulai=1;
			while ($data=mysql_fetch_array($query)){
				$index++;
				if($mulai%2==0){echo "<tr class=\"light\" align=\"center\">";}else{echo "<tr class=\"dark\" align=\"center\">";}
							echo "<td>".$data['no']."</td>
							<td>".$data['id_transaksi']."</td>
							<td>".$data['id_barang']."</td>
							<td>".$data['id_kasir']."</td>
							<td>".$data['tgl_transaksi']."</td>
						</tr>";
						$mulai++;
			}
			if($index==0){
				echo "<tr>
							<td colspan='5' align='center'>Data Kosong</td>
						</tr>";
			}
			echo "</table>";
		} 
		?>
		<br class="clear" />
		<br class="clear" />
	</div>
</div>