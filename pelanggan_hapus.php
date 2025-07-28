<?php
$id = $_GET["id"];
$query = mysqli_query($conn, "DELETE FROM pelanggan where id='$id'");
if ($query) {
    echo '<script>alert("Hapus data berhasil!"); location.href="?page=pelanggan";</script>';
} else {
    echo '<script>alert("Hapus data gagal!")</script>';
}
