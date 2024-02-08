<?php
$data = $_GET['data'];
exec("echo 'WRITE:$data' > COM4"); // Ganti COM3 dengan port serial yang digunakan oleh Arduino
echo "Data sent to Arduino: $data";
?>
