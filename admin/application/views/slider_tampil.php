<div class="container">

    <h5>Data Slider</h5>

    <table class="table table-bordered table-striped" id="tabelku">

        <thead class="table-primary">
            <tr>
                <th width="60">No</th>
                <th>Caption</th>
                <th>Foto</th>
                <th width="170">Opsi</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($slider as $k => $v): ?>

                <tr>

                    <td><?= $k + 1; ?></td>

                    <td><?= $v['caption_slider']; ?></td>

                    <td>
                        <img src="<?= $this->config->item('url_slider') . $v['foto_slider']; ?>"
                             width="200"
                             class="img-fluid">
                    </td>

                    <td>

                        <a href="<?= base_url('slider/edit/' . $v['id_slider']); ?>"
                           class="btn btn-warning btn-sm me-1">
                            Edit
                        </a>

                        <a href="<?= base_url('slider/hapus/' . $v['id_slider']); ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Data slider <?= $v['caption_slider']; ?> akan dihapus. Apakah Anda yakin?')">
                            Hapus
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

    <a href="<?= base_url('slider/tambah'); ?>" class="btn btn-primary">
        Tambah Data
    </a>

</div>