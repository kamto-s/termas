<div class="container">

    <h5>Data Pengumuman</h5>

    <table class="table table-bordered table-striped" id="tabelku">

        <thead class="table-primary">
            <tr>
                <th width="60">No</th>
                <th>Judul</th>
                <th>Foto</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th width="180">Opsi</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($pengumuman as $k => $v): ?>

                <tr>

                    <td><?= $k + 1; ?></td>

                    <td><?= $v['judul_pengumuman']; ?></td>

                    <td>
                        <img src="<?= $this->config->item('url_pengumuman') . $v['foto_pengumuman']; ?>"
                             width="200"
                             class="img-fluid">
                    </td>

                    <td><?= $v['keterangan_pengumuman']; ?></td>

                    <td>
                        <?php
                        $bulan = [
                            1 => "Januari",
                            "Februari",
                            "Maret",
                            "April",
                            "Mei",
                            "Juni",
                            "Juli",
                            "Agustus",
                            "September",
                            "Oktober",
                            "November",
                            "Desember"
                        ];

                        $tgl = strtotime($v['tanggal_pengumuman']);

                        echo date('d', $tgl) . ' ' .
                             $bulan[date('n', $tgl)] . ' ' .
                             date('Y', $tgl);
                        ?>
                    </td>

                    <td>
                        <?= date('H.i', strtotime($v['waktu_pengumuman'])); ?> WIB
                    </td>

                    <td>

                        <a href="<?= base_url('pengumuman/edit/' . $v['id_pengumuman']); ?>"
                           class="btn btn-warning btn-sm me-1">
                            Edit
                        </a>

                        <a href="<?= base_url('pengumuman/hapus/' . $v['id_pengumuman']); ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Pengumuman <?= $v['judul_pengumuman']; ?> akan dihapus. Apakah Anda yakin?')">
                            Hapus
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

    <a href="<?= base_url('pengumuman/tambah'); ?>" class="btn btn-primary">
        Tambah Data
    </a>

</div>