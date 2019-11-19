<?php

// error_reporting(0);

include('../connection/connection.php');

// Function FOR EDIT PEGAWAI

if(isset($_POST['save']) && !empty($_POST["nip"]) && !empty($_POST["nama"]) && !empty($_POST["alamat"] && !empty($_POST["tanggal_diterima"]) )){

  $nip = mysqli_real_escape_string($koneksi,$_POST['nip']);
  $nama = mysqli_real_escape_string($koneksi,$_POST['nama']);
  $alamat = mysqli_real_escape_string($koneksi,$_POST['alamat']);
  $tgl_diterima = mysqli_real_escape_string($koneksi,$_POST['tanggal_diterima']);


   
    //melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
    $input = mysqli_query($koneksi, "INSERT INTO pegawai VALUES(NULL, '$nip', '$nama', '$alamat', '$tgl_diterima')");
    
	if($input){
    	echo "Berhasil Disimpan";
	    header("Refresh:1; url= ../index.php");
    
	}else{
		echo 'Gagal menambahkan data! ';    //Pesan jika proses tambah gagal
		header("Refresh:1; url= ../index.php?page=views/homes/create");
  	}

}else if(isset($_POST['edit-perusahaan'])){

	$id = mysqli_real_escape_string($koneksi, $_POST['get_id']);
	$nip = mysqli_real_escape_string($koneksi,$_POST['nip']);
	$nama = mysqli_real_escape_string($koneksi,$_POST['nama']);
	$alamat = mysqli_real_escape_string($koneksi,$_POST['alamat']);
	$tgl_diterima = mysqli_real_escape_string($koneksi,$_POST['tanggal_diterima']);

	$update = mysqli_query($koneksi, "UPDATE pegawai SET nip='$nip', nama='$nama', alamat='$alamat', tanggal_diterima='$tgl_diterima' WHERE id='$id'");


	//jika query update sukses
	if($update){
		echo "Berhasil Diubah";
		header("Refresh:1; url= ../index.php");
		
	}else{
		
		echo 'Gagal menyimpan data!';
		header("Refresh:1; url= ../index.php?page=views/homes/edit&get_id='.$id.'");
		
	}


//Function For Delete PEGAWAI
}else if (isset($_GET['get_id'])){
	
	$id = $_GET['get_id'];
	
	$cek = mysqli_query($koneksi,"SELECT id FROM pegawai WHERE id='$id'");
	
	if(mysqli_num_rows($cek) == 0){
		
		echo '<script>window.history.back()</script>';
	
	}else{
		
		$del = mysqli_query($koneksi, "DELETE FROM pegawai WHERE id='$id'");

		if($del){
			echo "Berhasil Dihapus";
			header("Refresh:1; url= ../index.php");
			
		}else{
			
			echo 'Gagal menghapus data! ';
			header("Refresh:1; url= ../index.php");
		}
		
	}

}else{

	echo '<script>window.history.back()</script>';

}

?>