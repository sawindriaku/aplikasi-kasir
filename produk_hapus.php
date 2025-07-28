<?php
$id = $_GET["id"];
$query = mysqli_query($conn, "DELETE FROM produk where id='$id'");
if ($query) {
    echo '<script>alert("Hapus data produk berhasil!"); location.href="?page=produk";</script>';
} else {
    echo '<script>alert("Hapus data produk gagal!")</script>';
}
