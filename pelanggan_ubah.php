<?php
$id = $_GET["id"];
if (isset($_POST["nama"])) {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $no_tlpn = $_POST["no_tlpn"];

    $query = mysqli_query($conn, "UPDATE pelanggan set nama='$nama', alamat='$alamat', no_tlpn='$no_tlpn' where id='$id'");
    if ($query) {
        echo '<script>alert("Ubah data berhasil!"); location.href="?page=pelanggan";</script>';
    } else {
        echo '<script>alert("Ubah data gagal!")</script>';
    }
}

// ambil data yang dikirim lewat id
$query = mysqli_query($conn, "SELECT*FROM pelanggan where id=$id");
$data = mysqli_fetch_array($query);

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
                <td><input type="text" value="<?= $data['nama']; ?>" class="form-control" name="nama"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" id="alamat" class="form-control"><?= $data['alamat']; ?></textarea></td>
            </tr>
            <tr>
                <td>No Telephone</td>
                <td><input type="number" class="form-control" value="<?= $data['no_tlpn']; ?>" name="no_tlpn"></td>
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