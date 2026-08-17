<div class="container py-5">

    <div class="text-center mb-5">

        <h2 class="fw-bold">
            Pengumuman
        </h2>

        <p class="text-muted">
            Informasi dan kegiatan Pemerintah Desa Termas
        </p>

    </div>

    <?php

    $bulan = [
        1=>"Januari",
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

    ?>

    <div class="row">

        <?php if(!empty($pengumuman)): ?>

            <?php foreach($pengumuman as $p):

                $tanggal = strtotime($p["tanggal_pengumuman"]);

            ?>

            <div class="col-lg-3 col-md-6 mb-4">

                <a href="#"
                    class="text-decoration-none text-dark"
                    data-bs-toggle="modal"
                    data-bs-target="#modalPengumuman<?= $p["id_pengumuman"]; ?>">

                    <div class="card border-2 shadow h-100">

                        <div class="d-flex align-items-center justify-content-center"
                             style="height:220px;">

                            <img
                                src="<?= $this->config->item("url_pengumuman").$p["foto_pengumuman"]; ?>"
                                class="img-fluid"
                                style="
                                    max-width:100%;
                                    max-height:200px;
                                    object-fit:contain;
                                "
                                alt="<?= $p["judul_pengumuman"]; ?>">

                        </div>

                        <div class="card-body">

                            <h5
                                class="fw-bold text-center"
                                style="height:60px;">

                                <?= $p["judul_pengumuman"]; ?>

                            </h5>

                            <hr>

                            <div class="text-center text-muted small">

                                <div class="mb-2">

                                    📅
                                    <?= date('d',$tanggal); ?>
                                    <?= $bulan[date('n',$tanggal)]; ?>
                                    <?= date('Y',$tanggal); ?>

                                </div>

                                <div>

                                    🕒
                                    <?= date('H:i',strtotime($p["waktu_pengumuman"])); ?>
                                    WIB

                                </div>

                            </div>

                        </div>

                    </div>

                </a>

            </div>


                <div class="modal fade"
                    id="modalPengumuman<?= $p["id_pengumuman"]; ?>"
                    tabindex="-1"
                    aria-hidden="true">

                    <div class="modal-dialog modal-dialog-centered">

                        <div class="modal-content border-0">

                            <div class="modal-header">

                                <h5 class="modal-title fw-bold">

                                    <?= $p["judul_pengumuman"]; ?>

                                </h5>

                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal">
                                </button>

                            </div>

                            <div class="modal-body">

                            <div class="rounded d-flex align-items-center justify-content-center mb-3"
                                 style="height:300px; overflow:hidden;">

                                <img
                                    src="<?= $this->config->item("url_pengumuman").$p["foto_pengumuman"]; ?>"
                                    class="img-fluid"
                                    style="
                                        max-width:100%;
                                        max-height:100%;
                                        object-fit:contain;
                                    "
                                    alt="<?= $p["judul_pengumuman"]; ?>">

                            </div>
                                <div class="mb-3 text-muted">

                                    <span class="me-4">
                                        📅
                                        <?= date('d',$tanggal); ?>
                                        <?= $bulan[date('n',$tanggal)]; ?>
                                        <?= date('Y',$tanggal); ?>
                                    </span>

                                    <span>
                                        🕒
                                        <?= date('H:i',strtotime($p["waktu_pengumuman"])); ?>
                                        WIB
                                    </span>

                                </div>

                                <hr>

                                <div style="text-align:justify; line-height:1.8;">

                                    <?= nl2br($p["keterangan_pengumuman"]); ?>

                                </div>

                            </div>

                            <div class="modal-footer">

                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal">

                                    Tutup

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

                <?php endforeach; ?>

        <?php else: ?>

        <div class="col-12">

            <div class="alert alert-info text-center">

                Belum ada pengumuman.

            </div>

        </div>

        <?php endif; ?>

    </div>

</div>
