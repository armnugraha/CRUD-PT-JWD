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

        $no_of_records_per_page = 5;
        $offset = ($page-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(*) FROM pegawai";

        $result = mysqli_query($koneksi, $total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql ="SELECT * FROM pegawai WHERE nip LIKE '%".$get_value."%' OR nama LIKE '%".$get_value."%' LIMIT $offset, $no_of_records_per_page";


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

    <?php
        if ($cek != null && $total_rows >= $no_of_records_per_page) {
        ?>
            <ul class="pagination pagination-sm pull-right push-down-20">
                <?php if($page <= 1){ 

                    } else{
                        echo '<li class=""><a href="index.php?page=views/homes/index&pages=1">First</a></li>';
                    }
                ?>
                <li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
                    <a href="<?php if($page <= 1){ echo '#'; } else { echo "index.php?page=views/homes/index&pages=".($page - 1); } ?>">Prev</a>
                </li>
                <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?>">
                    <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "index.php?page=views/homes/index&pages=".($page + 1); } ?>">Next</a>
                </li>
                <li><a href="index.php?page=views/homes/index&pages=<?php echo $total_pages; ?>">Last</a></li>
            </ul>
    <?php } ?>

</div>