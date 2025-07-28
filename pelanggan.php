<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pelanggan</h1>
    </div>

    <!-- Link button - Create add datas -->
    <a href="?page=pelanggan_tambah" class="btn btn-primary mb-3">+ Tambah Pelanggan</a>

    <!-- Content -->
    <table class="table table-bordered">
        <tr>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>No Telephone</th>
            <th>Aksi</th>
        </tr>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM pelanggan");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['alamat']; ?></td>
                <td><?= $data['no_tlpn']; ?></td>
                <td>
                    <a href="?page=pelanggan_ubah&&id=<?= $data['id']; ?>" class="btn btn-secondary">Ubah</a>
                    <a href="?page=pelanggan_hapus&&id=<?= $data['id']; ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</div>