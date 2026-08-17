<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Detail Permohonan Surat Pengantar</h5>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="250">NIK</th>
                    <td><?= $surat_pengantar['nik']; ?></td>
                </tr>

                <tr>
                    <th>Nama</th>
                    <td><?= $surat_pengantar['nama_lengkap']; ?></td>
                </tr>

                <tr>
                    <th>Nomor Surat</th>
                    <td><?= $surat_pengantar['nomor_surat']; ?></td>
                </tr>

                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?= $surat_pengantar['jenis_kelamin']; ?></td>
                </tr>

                <tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <td>
                        <?= $surat_pengantar['tempat_lahir']; ?>,

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

                        $tanggal = strtotime($surat_pengantar['tanggal_lahir']);

                        echo date('d', $tanggal)." ".$bulan[date('n', $tanggal)]." ".date('Y', $tanggal);
                        ?>
                    </td>
                </tr>

                <tr>
                    <th>Kewarganegaraan</th>
                    <td><?= $surat_pengantar['kewarganegaraan']; ?></td>
                </tr>

                <tr>
                    <th>Pekerjaan</th>
                    <td><?= $surat_pengantar['pekerjaan']; ?></td>
                </tr>

                <tr>
                    <th>Keterangan</th>
                    <td><?= $surat_pengantar['keperluan']; ?></td>
                </tr>

                <tr>
                    <th>Alamat</th>
                    <td>
                        DUSUN <?= strtoupper($surat_pengantar['dusun']); ?>,
                        RT.<?= sprintf("%03d", $surat_pengantar['rt']); ?> /
                        RW.<?= sprintf("%03d", $surat_pengantar['rw']); ?>
                    </td>
                </tr>

                <tr>
                    <th>Keterangan Lain</th>
                    <td><?= $surat_pengantar['keterangan_lain']; ?></td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>

                        <?php if($surat_pengantar['status']=="Menunggu"){ ?>

                            <span class="badge bg-warning">
                                Menunggu
                            </span>

                        <?php } elseif($surat_pengantar['status']=="Disetujui"){ ?>

                            <span class="badge bg-success">
                                Disetujui
                            </span>

                        <?php } else { ?>

                            <span class="badge bg-danger">
                                Ditolak
                            </span>

                        <?php } ?>

                    </td>
                </tr>

                <?php if($surat_pengantar['status']=="Ditolak"){ ?>

                <tr>
                    <th>Alasan Penolakan</th>
                    <td><?= $surat_pengantar['alasan_penolakan']; ?></td>
                </tr>

                <?php } ?>

                <tr>
                    <th>Tanggal</th>
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

                        $tanggal = strtotime($surat_pengantar['tanggal']);

                        echo date('d', $tanggal)." ".$bulan[date('n', $tanggal)]." ".date('Y', $tanggal);
                        ?>
                    </td>
                </tr>

            </table>

            <a href="<?= base_url('surat_pengantar'); ?>" class="btn btn-secondary">
                Kembali
            </a>

            <?php if($surat_pengantar['status']=="Menunggu"){ ?>

                <a href="<?= base_url('surat_pengantar/setujui/'.$surat_pengantar['id_surat_pengantar']); ?>"
                   class="btn btn-success"
                   onclick="return confirm('Setujui permohonan ini?')">
                    Setujui
                </a>

                <button type="button"
                        class="btn btn-danger"
                        data-bs-toggle="modal"
                        data-bs-target="#modalTolak">
                    Tolak
                </button>

            <?php } ?>

        </div>

    </div>

</div>

<!-- MODAL TOLAK -->

<div class="modal fade" id="modalTolak">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post"
                  action="<?= base_url('surat_pengantar/tolak/'.$surat_pengantar['id_surat_pengantar']); ?>">

                <div class="modal-header bg-dark text-white">

                    <h5 class="modal-title">
                        Alasan Penolakan
                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <label>
                        Masukkan alasan penolakan
                    </label>

                    <textarea name="alasan_penolakan"
                              class="form-control"
                              rows="4"
                              required></textarea>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Batal
                    </button>

                    <button type="submit"
                            class="btn btn-danger">
                        Tolak
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>