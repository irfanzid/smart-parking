<?php 
include 'header.php';
require 'function.php';
?>

<div class="container">
  <h1>Ubah Isi Kartu</h1>
  <form id="writeForm" onsubmit="writeToCard(); return false;">
    <div class="input-group mt-3 mb-3 w-25">
      <input for="dataInput" type="text" class="form-control" maxlength="10" placeholder="Masukan NPM...." required >
      <button class="btn btn-primary" type="Submit" id="dataInput">Input NPM</button>
    </div>
  </form>
    

<img src="img/KTM.PNG" alt="KTM" width="400" height="200">
</div>


<?php 
include 'footer.php';
?>