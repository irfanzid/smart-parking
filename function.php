<?php
require 'koneksi.php';

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if ( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('username sudah terdaftar')
            </script>";
        return false;
    }

    // cek konfirmasi password
    if ( $password !== $password2 ) {
        echo "<script>
                alert('konfirmasi password tidak sesuai')
             </script>";
        return false;
    }

    //enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

function data_masuk() {
    global $conn;
    // Dapatkan tanggal hari ini dalam format yyyy-mm-dd
    $today = date("Y-m-d");

    // Query untuk mengambil data hanya untuk hari ini
    $sql = "SELECT * FROM log_masuk WHERE DATE(waktu_masuk) = '$today'";
    $result = $conn->query($sql);

    // Inisialisasi nomor urut
    $counter = 1;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $counter . "</td>";  // Gunakan nomor urut biasa
            echo "<td>" . $row["uid"] . "</td>";
            echo "<td>" . $row["plat"] . "</td>";
            echo "<td>" . $row["waktu_masuk"] . "</td>";
            echo "</tr>";

            // Tingkatkan nomor urut
            $counter++;
        }
    } else {
        echo "<tr><td colspan='4'>Tidak ada data untuk hari ini.</td></tr>";
    }

    $conn->close();
}

function data_keluar() {
    global $conn;

    // Dapatkan tanggal hari ini dalam format yyyy-mm-dd
    $today = date("Y-m-d");

    // Query untuk mengambil data hanya untuk hari ini
    $sql = "SELECT * FROM log_keluar WHERE DATE(waktu_keluar) = '$today'";
    $result = $conn->query($sql);

    // Inisialisasi nomor urut
    $counter = 1;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $counter . "</td>";  // Gunakan nomor urut biasa
            echo "<td>" . $row["uid"] . "</td>";
            echo "<td>" . $row["plat"] . "</td>";
            echo "<td>" . $row["waktu_keluar"] . "</td>";
            echo "</tr>";

            // Tingkatkan nomor urut
            $counter++;
        }
    } else {
        echo "<tr><td colspan='4'>Tidak ada data untuk hari ini.</td></tr>";
    }

    $conn->close();
}

function tambah($data) {
    global $conn;

    $npm = htmlspecialchars($data["npm"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // upload gambar
    $gambar = upload();
    if ( !$gambar = upload()) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO mahasiswa
                VALUES
                ('$npm', '$nama', '$email', '$jurusan', '$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload () {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ( $error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
                </script>";
            return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('yang anda upload bukan gambar');
                </script>";
            return false;
        }

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 1000000 ) {
        echo "<script>
                alert('ukuran gambar terlalu besar');
                </script>";
            return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $t = time();
    $namaFileBaru = date("Y_m_d_H_i_s",$t);
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'foto/'. $namaFileBaru);
    return $namaFileBaru;

}

function hapus($npm) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE npm = $npm");

    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    $npm = htmlspecialchars($data["npm"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // query update data dengan klausa WHERE
    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
            WHERE npm = '$npm'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM mahasiswa
                WHERE
              nama LIKE '%$keyword%' OR
              npm LIKE  '%$keyword%' OR
              email LIKE '%$keyword%' OR
              jurusan LIKE  '%$keyword%'
            ";
    return query($query);
}

function download_data_keluar() {
    global $conn;
    if (isset($_POST['down_keluar_xls'])) {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
    
        $start_date = date('Y-m-d H:i:s', strtotime($start_date . ' 00:00:00'));
        $end_date = date('Y-m-d H:i:s', strtotime($end_date . ' 23:59:59'));
    
        $query = mysqli_query($conn,
            "SELECT * FROM log_keluar WHERE waktu_keluar BETWEEN '$start_date' AND '$end_date' ");
    
        if (mysqli_num_rows($query) > 0) {
            // Header Excel
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="Data_Parkir_Keluar.xls"');
    
            echo '<html>';
            echo '<head><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"></head>';
            echo '<body>';
            echo '<table>';
    
            // Tulis Header Excel
            echo '<tr><td>No</td><td>No. UID</td><td>No. Plat</td><td>Waktu</td></tr>';
    
            $i = 1; // Start from row 2
            foreach ($query as $value) {
                // Tulis Data Excel
                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . $value['uid'] . '</td>';
                echo '<td>' . $value['plat'] . '</td>';
                echo '<td>' . $value['waktu_keluar'] . '</td>';
                echo '</tr>';
                $i++;
            }
    
            echo '</table>';
            echo '</body>';
            echo '</html>';
    
            exit;
        }
    }
}

function download_data_masuk() {
    global $conn;
    if (isset($_POST['down_masuk_xls'])) {
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
    
        $start_date = date('Y-m-d H:i:s', strtotime($start_date . ' 00:00:00'));
        $end_date = date('Y-m-d H:i:s', strtotime($end_date . ' 23:59:59'));
    
        $query = mysqli_query($conn,
            "SELECT * FROM log_masuk WHERE waktu_masuk BETWEEN '$start_date' AND '$end_date' ");
    
        if (mysqli_num_rows($query) > 0) {
            // Header Excel
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="Data_Parkir_Masuk.xls"');
    
            echo '<html>';
            echo '<head><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"></head>';
            echo '<body>';
            echo '<table>';
    
            // Tulis Header Excel
            echo '<tr><td>No</td><td>No. UID</td><td>No. Plat</td><td>Waktu</td></tr>';
    
            $i = 1; // Start from row 2
            foreach ($query as $value) {
                // Tulis Data Excel
                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . $value['uid'] . '</td>';
                echo '<td>' . $value['plat'] . '</td>';
                echo '<td>' . $value['waktu_masuk'] . '</td>';
                echo '</tr>';
                $i++;
            }
    
            echo '</table>';
            echo '</body>';
            echo '</html>';
    
            exit;
        }
    }
}

?>