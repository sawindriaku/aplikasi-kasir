<?php
if (isset($_POST["id_pelanggan"])) {
    // masukkan data ke database
    $id_pelanggan = $_POST["id_pelanggan"];
    $propro = $_POST["propro"];
    $total = 0;
    $tanggal = date('Y/m/d');

    $query = mysqli_query($conn, "INSERT INTO penjualan(tgl_penjualan, id_pelanggan) values('$tanggal', '$id_pelanggan')");

    $idterakhir = mysqli_fetch_array(mysqli_query($conn, "SELECT*FROM penjualan order by id desc"));
    $id_penjualan = $idterakhir["id"];

    // karena nama produk input di bawah menggunakan array, maka kita akan meakukan foreach
    foreach ($propro as $key => $value) {
        $pr = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM produk where id='$key'"));

        // mengecek nilai atau value
        if ($value > 0) {
            $sub = $value * $pr['harga'];
            $total += $sub;

            // masukkan data ke tabel detail penjualan
            $query = mysqli_query($conn, "INSERT INTO detail_penjualan(id_penjualan, id_produk, jumlah_produk, sub_total) values('$id_penjualan', '$key', '$value', '$sub')");
            $updateproduk = mysqli_query($conn, "UPDATE produk set stok=stok-$value where id='$key'");
        }
    }

    // update data terakhir
    $query = mysqli_query($conn, "UPDATE penjualan set total_harga='$total' where id='$id_penjualan'");
    if ($query) {
        echo '<script>alert("Tambah penjualan berhasil!")</script>';
    } else {
        echo '<script>alert("Tambah penjualan gagal!")</script>';
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penjualan</h1>
    </div>

    <!-- Link button - Create add datas -->
    <a href="?page=penjualan" class="btn btn-danger mb-3">Kembali</a>

    <!-- form tambah data penjualan -->
    <form action="" method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td>
                    <select class="form-control form-select" name="id_pelanggan" id="">
                        <?php
                        $p = mysqli_query($conn, "SELECT * FROM pelanggan");
                        while ($pel = mysqli_fetch_array($p)) {
                        ?>
                            <option value="<?= $pel['id']; ?>"><?= $pel['nama']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <?php
            $pro = mysqli_query($conn, "SELECT * FROM produk");
            while ($propro = mysqli_fetch_array($pro)) {
            ?>
                <tr>
                    <td><?= $propro['nama_produk'] . ' (Stok: ' . $propro['stok'] . ')'; ?></td>
                    <td><input type="number" class="form-control" max="<?= $propro['stok']; ?>" name="propro[<?php echo $propro['id'] ?>]" step="0" value="0"></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Save</button>
                </td>
            </tr>
        </table>
    </form>
</div>