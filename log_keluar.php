<?php
include 'header.php';
?>

<div class="container">
    <h1>Data Parkir Keluar Hari Ini</h1>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>No. UID</th>
                <th>No. Plat</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require 'function.php';
            echo data_keluar();
            ?>
        </tbody>
    </table>
</div>

<?php
include 'footer.php';
?>
