<?php
$id = $_GET["id"];
$query = mysqli_query($conn, "DELETE FROM `penjualan` WHERE id='$id'");
$query = mysqli_query($conn, "DELETE FROM `detail_penjualan` WHERE id_penjualan='$id'");

if ($query) {
    echo '<script>alert("Hapus data penjualan berhasil!"); location.href="?page=penjualan";</script>';
} else {
    echo '<script>alert("Hapus data penjualan gagal!")</script>';
}
