<div class="container">

    <h5>Data Warga</h5>

    <table class="table table-bordered table-striped" id="tabelku">
        <thead class="table-primary">
            <tr>
                <th width="60">No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat / Tgl Lahir</th>
                <th>Alamat</th>
                <th width="230">Opsi</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach($warga as $k => $v): ?>

            <tr>

                <td><?= $k+1; ?></td>

                <td><?= $v["nik"]; ?></td>

                <td><?= $v["nama_lengkap"]; ?></td>

                <td>
                    <?= $v["tempat_lahir"]; ?>,
                    <?= date('d-m-Y', strtotime($v["tanggal_lahir"])); ?>
                </td>

                <td>
                    Dusun <?= $v["dusun"]; ?>
                    RT <?= sprintf("%03d",$v["rt"]); ?>
                    RW <?= sprintf("%03d",$v["rw"]); ?>
                </td>

                <td>

                    <a href="<?= base_url("warga/detail/".$v["id_warga"]); ?>"
                       class="btn btn-info btn-sm">
                        Detail
                    </a>

                    <a href="<?= base_url("warga/edit/".$v["id_warga"]); ?>"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <a href="<?= base_url("warga/hapus/".$v["id_warga"]); ?>"
                       class="btn btn-danger btn-sm"
                        onclick="return confirm('Data warga <?= $v['nama_lengkap']; ?> akan dihapus. Apakah Anda yakin?')">                        Hapus
                    </a>

                </td>

            </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

    <a href="<?= base_url("warga/tambah"); ?>" class="btn btn-primary">
        Tambah Data
    </a>
 
</div>