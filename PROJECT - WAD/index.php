<?php

$koneksi = mysqli_connect('localhost','root','','sneakersaid');

if(isset($_POST['submit'])){
    $namasepatu = $_POST['namasepatu'];
    $hargasepatu = $_POST['hargasepatu'];

    $query = mysqli_query($koneksi,"insert into katalog (namasepatu,hargasepatu) values('$namasepatu','$hargasepatu')");

    if($query){
      header('location:index.php');

    } else {
        echo 'gagal';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIPSGARAGE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container" style="margin-top:50px">
  <h2>PIPS GARAGE</h2>
  <form method="post">
    <div class="form-group">
      <label for="namasepatu">Nama Sepatu:</label>
      <input type="text" class="form-control" id="namasepatu" placeholder="Masukkan Nama Sepatu" name="namasepatu">
    </div>
    <div class="form-group">
      <label for="hargasepatu">hargasepatu:</label>
      <input type="number" class="form-control" id="hargasepatu" placeholder="Masukkan harga Sepatu" name="hargasepatu">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>

  <hr>
  <br>

  <table class="table">
    <thead class="thead">
        <td><strong>Nama Sepatu</strong> </td>
        <td><strong>Harga Sepatu</strong> </td>
    </thead>
    <?php
    $ambildata = mysqli_query($koneksi,"select * from katalog");

    while($loop = mysqli_fetch_array($ambildata)){
        $namesepatu = $loop['namasepatu'];
        $sepatuprice = $loop['hargasepatu'];

        echo'<tr>
                <td>'.$namesepatu.' </td>
                <td>Rp.'.number_format($sepatuprice).' </td>
                </tr>
        ';

    }
    ?>

  </table>
</div>
</body>
</html>