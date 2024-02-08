<?php
include 'header.php';
require 'function.php';
?>

<div class="container">

<h1>Fitur Pencarian</h1>
    
    <form class="mt-5" action="cari.php" method="post">
        <div class="w-25">
            <label for="search" class="text-style form-label">Cari berdasarkan UID atau Plat</label>
            <input type="text" class="form-control border border-primary" name="search" id="search" aria-describedby="emailHelp" />
        </div>
        <button type="submit" name="cari" class="btn btn-primary mt-3">Cari</button>
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") :
    $search = $_POST['search'];

    $sql_masuk = "SELECT * FROM log_masuk WHERE uid = '$search' OR plat = '$search'";
    $result_masuk = $conn->query($sql_masuk);

    $sql_keluar = "SELECT * FROM log_keluar WHERE uid = '$search' OR plat = '$search'";
    $result_keluar = $conn->query($sql_keluar);

?>

    <?php
    if ($result_masuk->num_rows > 0 || $result_keluar->num_rows > 0) { ?>
       <div class="col-lg-12 mt-5">
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th>No. UID</th>
                    <th>No. Plat</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                </tr>
                </thead>
        
    <?php 
        while ($row_masuk = $result_masuk->fetch_assoc()) : 
                    $uid_masuk = $row_masuk['uid'];
                    $plat_masuk = $row_masuk['plat'];
                    $waktu_masuk = $row_masuk['waktu_masuk'];
    ?>
                    
                <tr>
                    <td><?=$uid_masuk;?></td>
                    <td><?=$plat_masuk;?></td>
                    <td><?=$waktu_masuk;?></td>
    <?php  endwhile; 

        while ($row_keluar = $result_keluar->fetch_assoc()) :
                    $uid_keluar = $row_keluar['uid'];
                    $plat_keluar = $row_keluar['plat'];
                    $waktu_keluar = $row_keluar['waktu_keluar'];
    ?>
                    <td><?=$waktu_keluar?></td>
                </tr>
            </table>
        </div>
    <?php   endwhile;

    } else {
        echo "Data tidak ditemukan.";
    }

endif;
    ?>

</body>
</html>

</div>

<?php 
include 'footer.php';
?>
