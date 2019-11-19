<?php

// error_reporting(0);

include('../connection/connection.php');

// Function FOR EDIT PEGAWAI

if(isset($_POST['save'])){

  $nip = mysqli_real_escape_string($koneksi,$_POST['nip']);
  $nama = mysqli_real_escape_string($koneksi,$_POST['nama']);
  $alamat = mysqli_real_escape_string($koneksi,$_POST['alamat']);
  $tgl_diterima = mysqli_real_escape_string($koneksi,$_POST['tanggal_diterima']);


   
    //melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
    $input = mysqli_query($koneksi, "INSERT INTO pegawai VALUES(NULL, '$nip', '$nama', '$alamat', '$tgl_diterima')");
    
	if($input){
    
	    echo 'Data berhasil di tambahkan!';    //Pesan jika proses tambah sukses
	    echo '<a href="../index.php">Kembali</a>';  //membuat Link untuk kembali ke halaman tambah
    
	}else{
		echo 'Gagal menambahkan data! ';    //Pesan jika proses tambah gagal
		echo '<a href="../index.php?page=views/homes/create">Kembali</a>';  //membuat Link untuk kembali ke halaman tambah
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
		
		echo 'Data berhasil di simpan! ';
		echo '<a href="../index.php">Kembali</a>';
		
	}else{
		
		echo 'Gagal menyimpan data!';
		echo '<a href="../index.php?page=views/homes/edit&get_id='.$id.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
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

			echo 'Data berhasil di hapus! ';
			echo '<a href="../index.php">Kembali</a>';
			
		}else{
			
			echo 'Gagal menghapus data! ';
			echo '<a href="../index.php">Kembali</a>';
		
		}
		
	}

}else{

	echo '<script>window.history.back()</script>';

}

?>