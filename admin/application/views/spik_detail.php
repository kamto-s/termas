<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                Detail Permohonan Surat Pengantar Izin Keramaian
            </h5>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="250">NIK</th>
                    <td><?= $spik['nik']; ?></td>
                </tr>

                <tr>
                    <th>Nama</th>
                    <td><?= $spik['nama_lengkap']; ?></td>
                </tr>

                <tr>
                    <th>Nomor Surat</th>
                    <td><?= $spik['nomor_surat']; ?></td>
                </tr>


                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?= $spik['jenis_kelamin']; ?></td>
                </tr>

                    <th>Tempat, Tanggal Lahir</th>
                    <td>
                        <?= $spik['tempat_lahir']; ?>,

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

                        $tanggal = strtotime($spik['tanggal_lahir']);

                        echo date('d',$tanggal)." ".$bulan[date('n',$tanggal)]." ".date('Y',$tanggal);
?>                    </td>
                </tr>


                <tr>
                    <th>Agama</th>
                    <td><?= $spik['agama']; ?></td>
                </tr>

                <tr>
                    <th>Pendidikan</th>
                    <td><?= $spik['pendidikan']; ?></td>
                </tr>

                <tr>
                    <th>Pekerjaan</th>
                    <td><?= $spik['pekerjaan']; ?></td>
                </tr>

                <tr>
                    <th>Status Perkawinan</th>
                    <td><?= $spik['status_perkawinan']; ?></td>
                </tr>

                <tr>
                    <th>Dusun</th>
                    <td><?= $spik['dusun']; ?></td>
                </tr>

                <tr>
                    <th>RT / RW</th>
                    <td>
                        <?= sprintf("%03d",$spik['rt']); ?> /
                        <?= sprintf("%03d",$spik['rw']); ?>
                    </td>
                </tr>

                <tr>
                    <th>Kecamatan</th>
                    <td><?= $spik['kecamatan']; ?></td>
                </tr>

                <tr>
                    <th>Maksud Keramaian</th>
                    <td><?= $spik['maksud_keramaian']; ?></td>
                </tr>

                <tr>
                    <th>Tanggal Penyelenggaraan</th>
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

                        $tanggal = strtotime($spik['tanggal_penyelenggaraan']);

                        echo date('d',$tanggal)." ".$bulan[date('n',$tanggal)]." ".date('Y',$tanggal);
                        ?>                    
    
                    </td>
                </tr>

                <tr>
                    <th>Waktu Penyelenggaraan</th>
                    <td>
                        <?= date('H.i', strtotime($spik['waktu_mulai'])); ?> WIB s/d
                        <?= date('H.i', strtotime($spik['waktu_selesai'])); ?> WIB
                    </td>
                </tr>                    <th>Jenis Hiburan</th>
                    <td><?= $spik['jenis_hiburan']; ?></td>
                </tr>

                <tr>
                    <th>Jumlah Undangan</th>
                    <td><?= $spik['jumlah_undangan']; ?> Orang</td>
                </tr>

                <tr>
                    <th>Tempat Penyelenggaraan</th>
                    <td><?= $spik['tempat_penyelenggaraan']; ?></td>
                </tr>

                <tr>

                    <th>Status</th>

                    <td>

                        <?php if($spik['status']=="Menunggu"){ ?>

                            <span class="badge bg-warning text-dark">
                                Menunggu
                            </span>

                        <?php } elseif($spik['status']=="Disetujui"){ ?>

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

                <?php if($spik['status']=="Ditolak"){ ?>

                <tr>

                    <th>Alasan Penolakan</th>

                    <td><?= $spik['alasan_penolakan']; ?></td>

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

                        $tanggal = strtotime($spik['tanggal_pengajuan']);

                        echo date('d',$tanggal)." ".$bulan[date('n',$tanggal)]." ".date('Y',$tanggal);
                        ?>                    
                    </td>
                </tr>

            </table>

            <a href="<?= base_url('spik'); ?>"
               class="btn btn-secondary">

                Kembali

            </a>

            <?php if($spik['status']=="Menunggu"){ ?>

                <a href="<?= base_url('spik/setujui/'.$spik['id_spik']); ?>"
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
                  action="<?= base_url('spik/tolak/'.$spik['id_spik']); ?>">

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