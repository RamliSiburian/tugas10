<?php
include_once "db.php";

// menangkap data yang di klik
if (isset($_GET["id"])) {
    $id = $_GET['id'];

    $hapusData = mysqli_query($conn, "DELETE FROM produk WHERE id = '$id' ");

    if ($hapusData) {
?>
        <script>
            alert("Data telah dihapus");
            window.location = "index.php";
        </script>
<?php
    }
}

?>