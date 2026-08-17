<div class="container">

    <h5>Permohonan Surat Keterangan Domisili (SKD)</h5>

    <table class="table table-bordered table-striped" id="tabelku">

        <thead class="table-primary text-center">
            <tr>
                <th width="60">No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th width="150">Status</th>
                <th width="120">Opsi</th>
            </tr>
        </thead>

        <tbody>

        <?php foreach($skd as $k => $v){ ?>

            <tr>

                <td class="text-center"><?= $k+1; ?></td>

                <td><?= $v['nik']; ?></td>

                <td><?= $v['nama_lengkap']; ?></td>

                <td><?= $v['nomor_surat']; ?></td>

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

                    $tgl = strtotime($v['tanggal']);

                    echo date('d', $tgl) . ' ' .
                         $bulan[date('n', $tgl)] . ' ' .
                         date('Y', $tgl);
                    ?>

                </td>

                <td class="text-center">

                    <?php if($v['status']=="Menunggu"){ ?>

                        <span class="badge bg-warning text-dark">
                            Menunggu
                        </span>

                    <?php } elseif($v['status']=="Disetujui"){ ?>

                        <span class="badge bg-success">
                            Disetujui
                        </span>

                    <?php } else { ?>

                        <span class="badge bg-danger">
                            Ditolak
                        </span>

                        <?php if(!empty($v['alasan_penolakan'])){ ?>
                            <br>
                            <small class="text-danger">
                                <?= $v['alasan_penolakan']; ?>
                            </small>
                        <?php } ?>

                    <?php } ?>

                </td>

                <td class="text-center">

                    <?php if($v['status']=="Disetujui"){ ?>

                        <a href="<?= base_url('skd/print/'.$v['id_skd']); ?>"
                           class="btn btn-primary btn-sm">
                            Print
                        </a>

                    <?php } else { ?>

                        <button class="btn btn-secondary btn-sm" disabled>
                            Print
                        </button>

                    <?php } ?>

                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

    <a href="<?= base_url('skd/tambah'); ?>" class="btn btn-primary">
        Ajukan SKD
    </a>

</div>