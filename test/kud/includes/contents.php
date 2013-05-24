<div class="wrapper col4">
	<div id="services">
		<br class="clear" />
		<ul>
			<?php
				$barang = mysql_query("SELECT * FROM barang ORDER BY id_barang DESC LIMIT 3");
				$mulai=1;
				while($b = mysql_fetch_array($barang)){
					if($mulai == 3){ echo "<li class=\"last\">"; }else{ echo "<li>";}
					echo "<div>
					<h2>$b[nama_barang]</h2>
					<p>Jumlah : $b[jumlah_barang]<br>
					Harga : $b[harga_jual]</p>";
					include "functions/isset_link.php";
					echo "</div></li>";
					$mulai++;
				}
			?>
		</ul>
		<br class="clear" />
		<br class="clear" />
	</div>
</div>