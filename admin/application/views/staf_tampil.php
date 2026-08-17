<div class="container">

    <h5>Data Staf</h5>

    <table class="table table-bordered table-striped" id="tabelku">

        <thead class="table-primary">
            <tr>
                <th width="60">No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th width="170">Opsi</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($staf as $k => $v): ?>

                <tr>

                    <td><?= $k + 1; ?></td>

                    <td>
                        <img src="<?= $this->config->item('url_staf') . $v['foto_staf']; ?>"
                             width="80"
                             class="img-thumbnail">
                    </td>

                    <td><?= $v['nama_staf']; ?></td>

                    <td><?= $v['jabatan']; ?></td>

                    <td>

                        <a href="<?= base_url('staf/edit/' . $v['id_staf']); ?>"
                           class="btn btn-warning btn-sm me-1">
                            Edit
                        </a>

                        <a href="<?= base_url('staf/hapus/' . $v['id_staf']); ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Data staf <?= $v['nama_staf']; ?> akan dihapus. Apakah Anda yakin?')">
                            Hapus
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

    <a href="<?= base_url('staf/tambah'); ?>" class="btn btn-primary">
        Tambah Data
    </a>

</div>