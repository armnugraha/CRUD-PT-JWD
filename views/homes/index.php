<div>

    <h2>Data Pegawai</h2>

    <?php

        $get_value = "";

        if (!empty($_GET["key"])) {
            $get_value = $_GET["key"];
        }

    ?>

    <form method="get">
        cari:<input type="text" 
            name="key" 
            placeholder="Nip atau Nama" 
            value="<?php echo $get_value; ?>">
        <input type="submit" name="cari">
    </form>

</div>

<div>
    
    <?php

        include 'connection/connection.php';

        if (isset($_GET['pages'])) {
            $page = $_GET['pages'];
        } else {
            $page = 1;
        }

        $sql ="SELECT * FROM pegawai WHERE nip LIKE '%".$get_value."%' OR nama LIKE '%".$get_value."%' ";

        //untuk menyeleksi data error
        $query =mysqli_query($koneksi,$sql);

        $cek=mysqli_num_rows($query);

        if ($cek == null) {
            echo "Data ".$city." Tidak ditemukan";
        }else{
    ?>
    <table border="1">
        <thead>
            <tr>
                <td>ID</td>
                <td>NIP</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>Tanggal Diterima</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
    <?php
        while($record =mysqli_fetch_assoc($query)){
    ?>
        <tr>
            <td><?php echo $record['id']; ?></td>
            <td><?php echo $record['nip']; ?></td>
            <td><?php echo $record['nama']; ?></td>
            <td><?php echo $record['alamat']; ?></td>
            <td><?php echo $record['tanggal_diterima']; ?></td>
            <td>
                <a href="index.php?page=views/homes/edit&get_id=<?php echo $record['id']; ?>">Edit</a>
                <span> | </span>
                <a href="controller/PegawaiController.php?get_id=<?php echo $record['id']; ?>">Hapus</a>
            </td>
        </tr>
    <?php } } ?>
        </tbody>
    </table>

</div>