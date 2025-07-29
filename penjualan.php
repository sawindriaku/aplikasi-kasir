<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penjualan</h1>
    </div>

    <!-- Link button - Create add datas -->
    <a href="?page=penjualan_tambah" class="btn btn-primary mb-3">+ Tambah Penjualan Barang</a>

    <!-- Content -->
    <table class="table table-bordered">
        <tr>
            <th>Tanggal Pembelian</th>
            <th>Pelanggan</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM penjualan LEFT JOIN pelanggan on pelanggan.id = penjualan.id");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $data['tgl_penjualan']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?php echo $data['total_harga']; ?></td>
                <td>
                    <a href="?page=penjualan_detail&&id=<?= $data['id']; ?>" class="btn btn-secondary">Detail</a>
                    <a href="?page=penjualan_hapus&&id=<?= $data['id']; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?');" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</div>