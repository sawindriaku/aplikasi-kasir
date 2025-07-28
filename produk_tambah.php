<?php
if (isset($_POST["nama_produk"])) {
    $nama_produk = $_POST["nama_produk"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];

    $query = mysqli_query($conn, "INSERT INTO produk(nama_produk, harga, stok) values('$nama_produk', '$harga', '$stok')");
    if ($query) {
        echo '<script>alert("Tambah produk berhasil!")</script>';
    } else {
        echo '<script>alert("Tambah produk gagal!")</script>';
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Produk</h1>
    </div>

    <!-- Link button - Create add datas -->
    <a href="?page=produk" class="btn btn-danger mb-3">Kembali</a>

    <!-- form tambah data produk -->
    <form action="" method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama Produk</td>
                <td><input type="text" class="form-control" name="nama_produk"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" class="form-control" name="harga"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="number" class="form-control" name="stok"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Save</button>
                </td>
            </tr>
        </table>
    </form>
</div>