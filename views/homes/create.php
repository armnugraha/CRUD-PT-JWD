<?php
    // error_reporting(0);
    include('connection/connection.php');
?>

<div>
    <h2>Tambah Pegawai</h2>
</div>

<div>

    <form action="controller/PegawaiController.php" method="post">

	    <div>
	        <div>
	            <h3>Pegawai</h3>
	        </div>

	        <div>

	            <div>
	                <label>NIP</label>
	                <div>
	                    <input type="number" name="nip" placeholder="NIP" required />
	                </div>
	            </div>

	            <div>
	                <label>Nama</label>
	                <div>
	                    <input type="text" name="nama" placeholder="Nama" required />
	                </div>
	            </div>

	            <div>
	                <label>Alamat</label>
	                <div>
	                    <input type="text" name="alamat" placeholder="Alamat" required />
	                </div>
	            </div>

	            <div>
	                <label>Tanggal Diterima</label>
	                <div>
	                    <input type="date" name="tanggal_diterima" required />
	                </div>
	            </div>

	            <div>
	            	<button name="save">Simpan</button>
	            </div>


	        </div>
	    </div>

    </form>

</div>