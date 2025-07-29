<?php

$id = $_GET["id"];
// mendapatkan data penjualan
$query = mysqli_query($conn, "SELECT * FROM penjualan left join pelanggan on penjualan.id = pelanggan   .id where penjualan.id = '$id'");
$data = mysqli_fetch_array($query);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Penjualan</h1>
    </div>

    <!-- Link button - Create add datas -->
    <a href="?page=penjualan" class="btn btn-danger mb-3">Kembali</a>

    <!-- form tambah data penjualan -->
    <form action="" method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td>
                    <?= $data['nama']; ?>
                </td>
            </tr>
            <?php
            $pro = mysqli_query($conn, "SELECT * FROM detail_penjualan left join produk on produk.id = detail_penjualan.id where id_penjualan = '$id'");
            while ($propro = mysqli_fetch_array($pro)) {
            ?>
                <tr>
                    <td><?= $propro['nama_produk']; ?></td>
                    <td>
                        harga Satuan: <?= $propro['harga']; ?>
                        Jumlah: <?= $propro['jumlah_produk']; ?>
                        Sub Total: <?= $propro['sub_total']; ?>
                    </td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td>Total: </td>
                <td><?= $data['total_harga']; ?></td>
            </tr>
        </table>
    </form>
</div>