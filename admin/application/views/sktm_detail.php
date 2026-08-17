<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                Detail Permohonan SKTM
            </h5>
        </div>


        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="250">NIK</th>
                    <td><?= $sktm['nik']; ?></td>
                </tr>


                <tr>
                    <th>Nama</th>
                    <td><?= $sktm['nama_lengkap']; ?></td>
                </tr>
                
                <tr>
                    <th>Nomor Surat</th>
                    <td><?= $sktm['nomor_surat']; ?></td>
                </tr>

                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?= $sktm['jenis_kelamin']; ?></td>
                </tr>


                <tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <td>
                        <?= $sktm['tempat_lahir']; ?>,

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

                        $tanggal = strtotime($sktm['tanggal_lahir']);

                        echo date('d',$tanggal)." ".
                        $bulan[date('n',$tanggal)]." ".
                        date('Y',$tanggal);
                        ?>

                    </td>
                </tr>


                <tr>
                    <th>Agama</th>
                    <td><?= $sktm['agama']; ?></td>
                </tr>


                <tr>
                    <th>Pendidikan</th>
                    <td><?= $sktm['pendidikan']; ?></td>
                </tr>


                <tr>
                    <th>Pekerjaan</th>
                    <td><?= $sktm['pekerjaan']; ?></td>
                </tr>


                <tr>
                    <th>Status Perkawinan</th>
                    <td><?= $sktm['status_perkawinan']; ?></td>
                </tr>


                <tr>
                    <th>Dusun</th>
                    <td><?= $sktm['dusun']; ?></td>
                </tr>


                <tr>
                    <th>RT / RW</th>
                    <td>
                        <?= sprintf("%03d",$sktm['rt']); ?> /
                        <?= sprintf("%03d",$sktm['rw']); ?>
                    </td>
                </tr>


                <tr>
                    <th>Kecamatan</th>
                    <td><?= $sktm['kecamatan']; ?></td>
                </tr>


                <tr>
                    <th>Keperluan</th>
                    <td><?= $sktm['keperluan']; ?></td>
                </tr>



                <tr>
                    <th>Status</th>

                    <td>

                        <?php if($sktm['status']=="Menunggu"){ ?>

                            <span class="badge bg-warning text-dark">
                                Menunggu
                            </span>


                        <?php } elseif($sktm['status']=="Disetujui"){ ?>

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



                <?php if($sktm['status']=="Ditolak"){ ?>

                <tr>

                    <th>
                        Alasan Penolakan
                    </th>

                    <td>
                        <?= $sktm['alasan_penolakan']; ?>
                    </td>

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

                        $tanggal = strtotime($sktm['tanggal']);

                        echo date('d',$tanggal)." ".$bulan[date('n',$tanggal)]." ".date('Y',$tanggal);
                        ?>                    
                    </td>

                </tr>


            </table>




            <a href="<?= base_url('sktm'); ?>" 
               class="btn btn-secondary">

                Kembali

            </a>




            <?php if($sktm['status']=="Menunggu"){ ?>


                <a href="<?= base_url('sktm/setujui/'.$sktm['id_sktm']); ?>"
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
                  action="<?= base_url('sktm/tolak/'.$sktm['id_sktm']); ?>">



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