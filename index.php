<?php
include_once "db.php";

$queryProduk = mysqli_query($conn, "SELECT * FROM produk");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Tugas 10</title>
</head>

<body>
    <div id="indeks">
        <!-- div untuk menyimpan data ke database -->
        <div class="container">
            <div class="tambah_data">
                <h1>Tambah Data</h1>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nama_produk" class="form-label"> Nama Produk </label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="masukkan nama produk" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="form-label"> Keterangan </label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="keterangan" required>
                    </div>
                    <div class="form-group">
                        <label for="harga" class="form-label"> Harga </label>
                        <input type="text" name="harga" id="harga" class="form-control" placeholder="harga" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah" class="form-label"> Jumlah </label>
                        <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="jumlah" required>
                    </div>

                    <button type="submit" name="simpan" class="simpan">Simpan</button>
                </form>
            </div>
            <hr>

            <!-- div untuk menampilkan data dari database -->
            <div class="tampil_data">
                <h1>Tampil Data</h1>

                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Keterangan</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th colspan="2">Opsi</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($queryProduk as $produk) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $produk['nama_produk']; ?></td>
                            <td><?= $produk['keterangan']; ?></td>
                            <td><?= $produk['harga']; ?></td>
                            <td><?= $produk['jumlah']; ?></td>
                            <td><a href="edit.php?id=<?= $produk['id']; ?>"> Edit</a></td>
                            <td><a href="hapus.php?id=<?= $produk['id']; ?>"> Hapus</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST["simpan"])) {
    $nama_produk = $_POST['nama_produk'];
    $keterangan = $_POST['keterangan'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];


    $simpan = mysqli_query($conn, "INSERT INTO produk VALUES('' , '$nama_produk' , '$keterangan' , '$harga' , '$jumlah' ) ");
    if ($simpan) {
?>
        <script>
            alert("Data telah di simpan");
            window.location = "index.php";
        </script>
<?php
    }
}


?>