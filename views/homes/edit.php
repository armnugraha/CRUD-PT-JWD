<?php
    include('connection/connection.php');
    
    $id = $_GET['get_id'];

    $show = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id='$id'");

    if(mysqli_num_rows($show) == 0){
            //jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
        echo '<script>window.history.back()</script>';
        
    }else{
        $data = mysqli_fetch_assoc($show);
    }
?>

<div>

    <form action="controller/PegawaiController.php" method="post">
            
        <input type="hidden" name="get_id" value="<?php echo $data['id']; ?>">

        <div>
            <div>
                <h3>Pegawai</h3>
            </div>

            <div>

                <div>
                    <label>NIP</label>
                    <div>
                        <input type="number" name="nip" placeholder="NIP" required value="<?php echo $data['nip']; ?>"  />
                    </div>
                </div>

                <div>
                    <label>Nama</label>
                    <div>
                        <input type="text" name="nama" placeholder="Nama" required value="<?php echo $data['nama']; ?>"  />
                    </div>
                </div>

                <div>
                    <label>Alamat</label>
                    <div>
                        <input type="text" name="alamat" placeholder="Alamat" required value="<?php echo $data['alamat']; ?>"  />
                    </div>
                </div>

                <div>
                    <label>Tanggal Diterima</label>
                    <div>
                        <input type="date" name="tanggal_diterima" required value="<?php echo $data['tanggal_diterima']; ?>"  />
                    </div>
                </div>

                <div>
                    <button name="edit-perusahaan">Ubah</button>
                </div>

            </div>
        </div>
    </form>
</div>