<?php
	if(!isset($_GET['act'])){
		echo "Selamat Datang di ";
	}else if($_GET['act']=='home'){
		echo "Home | ";
	}else if($_GET['act']=='barang'){
		echo "Barang | ";
	}else if($_GET['act']=='register'){
		echo "Daftar Anggota KUD | ";
	}else if($_GET['act']=='layanan'){
		echo "Pelayanan KUD | ";
	}else if($_GET['act']=='cari'){
		echo "Pencarian | ";
	}else if($_GET['act']=='anggota'){
		echo "Anggota | ";
	}else if($_GET['act']=='kasir'){
		echo "Kasir | ";
	}else if($_GET['act']=='laporan'){
		echo "Laporan Transaksi | ";
	}else if($_GET['act']=='transaksi'){
		echo "Transaksi | ";
	}
?>