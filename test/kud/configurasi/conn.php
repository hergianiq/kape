<?php
	$host="localhost";
	$user="root";
	$pass="";
	$db="kud";
	
	$koneksi=mysql_connect($host,$user,$pass);
	if($koneksi){
		$dbName= mysql_select_db($db);
		if(!$dbName){
			echo"Gagal Koneksi kedatabase";
		}
	}else{
		echo"Gagal Koneksi keserver";
	}
	
?>