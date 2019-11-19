<?php
	// error_reporting(0);

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db   = "perusahaan";
	$koneksi  = mysqli_connect($host,$user,$pass,$db);

	if (!$koneksi) {
        die("koneksi db tidak berhasil: ".mysqli_connect_error());
    }
?>