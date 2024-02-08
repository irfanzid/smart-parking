<?php
include 'header.php';
?>

<div class="container">
    <h1>Data Parkir Hari Ini</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>No. UID</th>
                <th>No. Plat</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php'; // Sertakan file koneksi yang berisi kode koneksi ke database

            // Dapatkan tanggal hari ini dalam format yyyy-mm-dd
            $today = date("Y-m-d");

            // Query untuk mengambil data hanya untuk hari ini
            $sql = "SELECT * FROM plat WHERE DATE(waktu) = '$today'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["kartu"] . "</td>";
                    echo "<td>" . $row["plat"] . "</td>";
                    echo "<td>" . $row["waktu"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data untuk hari ini.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<?php
include 'footer.php';
?>
