<?php
	if(!isset($_GET['act'])){
		include "includes/intro.php";
		include "includes/contents.php";
	}else if($_GET['act']=='home'){
		include "includes/intro.php";
		include "includes/contents.php";
	}else if($_GET['act']=='barang'){
		include "includes/contents/barang.php";
	}else if($_GET['act']=='anggota'){
		include "includes/contents/anggota.php";
	}else if($_GET['act']=='kasir'){
		include "includes/contents/kasir.php";
	}else if($_GET['act']=='layanan'){
		include "includes/contents/pelayanan.php";
	}else if($_GET['act']=='laporan'){
		include "includes/contents/laporan.php";
	}else if($_GET['act']=='cari'){
		include "functions/cari.php";
	}else if($_GET['act']=='transaksi'){
		include "includes/contents/data_transaksi.php";
	}else if($_GET['act']=='logout'){
		include "functions/logout.php";
	}
?>