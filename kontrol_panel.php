<?php
include 'header.php';
require 'function.php';
?>

<div class="container">
    <h1>Kontrol Panel</h1>
    <div class="mt-4 mx-auto w-50">
        <img src="img/parkir.PNG" alt="parkir">
    </div>
    <div class="mx-auto w-25">
        <button class="btn btn-success" id="startBtn">Start Program</button>
        <button class="btn btn-danger" id="stopBtn">Stop Program</button>
    </div>
    <div class="mt-5 mx-auto w-50">
        <img class="rounded" src="img/KTM.PNG" alt="ktm" width="400" height="200">
    </div>
    <div class="mx-auto w-25">
        <a class="mt-3 btn btn-primary" href="isi_npm.php" role="button">Isi Kartu</a>
    </div>
</div>

<?php
include 'footer.php';
?>