<?php
if (isset($_POST["nama"])) {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $no_tlpn = $_POST["no_tlpn"];

    $query = mysqli_query($conn, "INSERT INTO pelanggan(nama, alamat, no_tlpn) values('$nama', '$alamat', '$no_tlpn')");
    if ($query) {
        echo '<script>alert("Tambah data berhasil!")</script>';
    } else {
        echo '<script>alert("Tambah data gagal!")</script>';
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pelanggan</h1>
    </div>

    <!-- Link button - Create add datas -->
    <a href="?page=pelanggan" class="btn btn-danger mb-3">Kembali</a>

    <!-- form tambah data pelanggan -->
    <form action="" method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td><input type="text" class="form-control" name="nama"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" id="alamat" class="form-control"></textarea></td>
            </tr>
            <tr>
                <td>No Telephone</td>
                <td><input type="number" class="form-control" name="no_tlpn"></td>
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