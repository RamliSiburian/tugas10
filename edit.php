<?php
include_once "db.php";

// cek data yang mau di edit
if (isset($_GET["id"])) {
    $id = $_GET['id'];

    $queryData = mysqli_query($conn, "SELECT * FROM produk WHERE id = '$id' ");
    $cekData = mysqli_fetch_array($queryData);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Edit Produk</title>
</head>

<body>
    <div id="edit">
        <div class="container">
            <h1>Edit Data</h1>

            <form action="" method="post">
                <div class="form-group">
                    <label for="nama_produk" class="form-label"> Nama Produk </label>
                    <input type="text" name="nama_produk" value="<?= $cekData['nama_produk']; ?>" id="nama_produk" class="form-control" placeholder="masukkan nama produk" required>
                </div>
                <div class="form-group">
                    <label for="keterangan" class="form-label"> Keterangan </label>
                    <input type="text" name="keterangan" value="<?= $cekData['keterangan']; ?>" id="keterangan" class="form-control" placeholder="keterangan" required>
                </div>
                <div class="form-group">
                    <label for="harga" class="form-label"> Harga </label>
                    <input type="text" name="harga" value="<?= $cekData['harga']; ?>" id="harga" class="form-control" placeholder="harga" required>
                </div>
                <div class="form-group">
                    <label for="jumlah" class="form-label"> Jumlah </label>
                    <input type="text" name="jumlah" value="<?= $cekData['jumlah']; ?>" id="jumlah" class="form-control" placeholder="jumlah" required>
                </div>

                <button type="submit" name="update" class="update">Update</button>
                <a href="index.php" class="kembali">Kembali</a>
            </form>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST["update"])) {
    $nama_produk = $_POST['nama_produk'];
    $keterangan = $_POST['keterangan'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    $update = mysqli_query($conn, " UPDATE produk SET nama_produk = '$nama_produk' , keterangan = '$keterangan' , harga = '$harga' , jumlah = '$jumlah' WHERE id = '$id' ");

    if ($update) {
?>
        <script>
            alert("Data berhasil di ubah");
            window.location = "index.php";
        </script>
<?php
    }
}
?>