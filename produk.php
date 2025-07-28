<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Produk</h1>
    </div>

    <!-- Link button - Create add datas -->
    <a href="?page=produk_tambah" class="btn btn-primary mb-3">+ Tambah Produk Barang</a>

    <!-- Content -->
    <table class="table table-bordered">
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM produk");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?= $data['nama_produk']; ?></td>
                <td><?= $data['harga']; ?></td>
                <td><?= $data['stok']; ?></td>
                <td>
                    <a href="?page=produk_ubah&&id=<?= $data['id']; ?>" class="btn btn-secondary">Ubah</a>
                    <a href="?page=produk_hapus&&id=<?= $data['id']; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?');" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</div>