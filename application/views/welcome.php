<!-- ========================= -->
<!-- SLIDER -->
<!-- ========================= -->

<div id="carouselExampleCaptions"
     class="carousel slide mb-1"
     data-bs-ride="carousel"
     data-bs-interval="3000">
    <div class="carousel-inner">

        <?php foreach ($slider as $key => $value) : ?>

            <div class="carousel-item <?= $key == 0 ? 'active' : ''; ?>">

                <img src="<?= $this->config->item('url_slider') . $value['foto_slider']; ?>"
                    class="d-block w-100"
                    style="height:600px;object-fit:cover;"
                    alt="<?= $value['caption_slider']; ?>">

                <div class="carousel-caption">

                    <h4 class="fw-bold text-white">
                        <?= $value['caption_slider']; ?>
                    </h4>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

    <button class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">

        <span class="carousel-control-prev-icon"></span>

    </button>

    <button class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">

        <span class="carousel-control-next-icon"></span>

    </button>

</div>

<!-- ========================= -->
<!-- VISI MISI -->
<!-- ========================= -->

<section id="visi"class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h3 class="fw-bold">
                Visi & Misi Desa
            </h3>

            <p class="text-muted">
                Pedoman Pemerintah Desa Termas dalam mewujudkan pelayanan dan pembangunan desa.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-6">

                <div class="card border-2 shadow h-100">

                    <div class="card-body p-4">

                        <div class="fs-1 mb-3 text-primary">
                            🎯
                        </div>

                        <h4 class="fw-bold">
                            Visi
                        </h4>

                        <p class="mb-0">

                            Terwujudnya Desa Termas yang maju, mandiri, sejahtera,
                            serta memberikan pelayanan yang berkualitas kepada masyarakat.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="card border-2 shadow h-100">

                    <div class="card-body p-4">

                        <div class="fs-1 mb-3 text-success">
                            🚀
                        </div>

                        <h4 class="fw-bold">
                            Misi
                        </h4>

                        <ul class="mb-0">

                            <li class="mb-2">
                                Meningkatkan kualitas pelayanan kepada masyarakat.
                            </li>

                            <li class="mb-2">
                                Meningkatkan pembangunan infrastruktur desa.
                            </li>

                            <li class="mb-2">
                                Memberdayakan potensi dan perekonomian masyarakat.
                            </li>

                            <li>
                                Mewujudkan tata kelola pemerintahan desa yang transparan dan akuntabel.
                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ========================= -->
<!-- PENGUMUMAN -->
<!-- ========================= -->

<section id="pengumuman" class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h3 class="fw-bold">
                Pengumuman Desa
            </h3>

            <p class="text-muted">
                Informasi kegiatan dan agenda terbaru Pemerintah Desa Termas.
            </p>

        </div>

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

        $rowClass = count($pengumuman) < 4 ? "justify-content-center" : "";

        ?>

        <div class="row <?= $rowClass; ?>">

            <?php if (!empty($pengumuman)) : ?>

                <?php foreach ($pengumuman as $p) :

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
                                <h5 class="fw-bold text-center"
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

                <!-- ========================= -->
                <!-- MODAL DETAIL PENGUMUMAN -->
                <!-- ========================= -->

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

                            <div class=" rounded d-flex align-items-center justify-content-center mb-3"
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

            <?php else : ?>

                <div class="col-12">

                    <div class="alert alert-info text-center">

                        Belum ada pengumuman.

                    </div>

                </div>

            <?php endif; ?>

        </div>

        <div class="text-center mt-3">

            <a
                href="<?= base_url("pengumuman"); ?>"
                class="btn btn-primary px-4">

                Lihat Semua Pengumuman

            </a>

        </div>

    </div>

</section>
<!-- ========================= -->
<!-- STATISTIK DESA -->
<!-- ========================= -->

<section id="statistik" class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h3 class="fw-bold">
                Statistik Desa
            </h3>

            <p class="text-muted">
                Statistik pengajuan surat dan jumlah penduduk Desa Termas
            </p>

        </div>

        <div class="row">

            <div class="col-lg-6 mb-4">

                <div class="card border-2 shadow h-100">

                    <div class="card-header bg-primary text-white">

                        <h5 class="mb-0">
                            Statistik Pengajuan Surat
                        </h5>

                    </div>

                    <div class="card-body text-center">

                        <div style="width:360px;height:320px;margin:auto">

                            <canvas id="chartSurat"></canvas>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-6 mb-4">

                <div class="card border-2 shadow h-100">

                    <div class="card-header bg-success text-white">

                        <h5 class="mb-0">
                            Statistik Penduduk
                        </h5>

                    </div>

                    <div class="card-body text-center">

                        <div style="width:360px;height:320px;margin:auto">

                            <canvas id="chartPenduduk"></canvas>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ========================= -->
<!-- LOKASI DESA -->
<!-- ========================= -->

<section id="lokasi" class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h3 class="fw-bold">
                Lokasi Desa Termas
            </h3>

            <p class="text-muted">
                Desa Termas, Kecamatan Karangrayung, Kabupaten Grobogan
            </p>

        </div>

        <div class="card border-2 shadow">

            <div class="card-body p-2">

                <iframe
                    src="https://maps.google.com/maps?q=Desa+Termas+Karangrayung+Grobogan&output=embed"
                    width="100%"
                    height="450"
                    style="border:0"
                    loading="lazy"
                    allowfullscreen>
                </iframe>

            </div>

        </div>

    </div>

</section>

<!-- ========================= -->
<!-- PERANGKAT DESA -->
<!-- ========================= -->

<section id="perangkat" class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-4">

            <h2 class="fw-bold">
                Perangkat Desa
            </h2>

            <p class="text-muted">
                Pemerintah Desa Termas
            </p>

        </div>

        <div class="position-relative">

            <div id="carouselStaf"
                class="carousel slide"
                >

                <div class="carousel-inner">

                    <?php
                    $chunks = array_chunk($staf, 6);
                    foreach($chunks as $key => $group):
                    ?>

                    <div class="carousel-item <?= $key==0 ? 'active' : ''; ?>">

                        <div class="row justify-content-center">

                            <?php foreach($group as $s): ?>

                            <div class="col-lg-2 col-md-4 col-6 mb-3">

                                <div class="card border-2 shadow-sm h-100 text-center">

                                    <img
                                        src="<?= $this->config->item("url_staf").$s["foto_staf"]; ?>"
                                        class="card-img-top"
                                        style="height:170px;object-fit:cover;"
                                        alt="<?= $s["nama_staf"]; ?>">

                                    <div class="card-body p-2">

                                        <h6 class="fw-bold mb-1">
                                            <?= $s["nama_staf"]; ?>
                                        </h6>

                                        <small class="text-muted">
                                            <?= $s["jabatan"]; ?>
                                        </small>

                                    </div>

                                </div>

                            </div>

                            <?php endforeach; ?>

                        </div>

                    </div>

                    <?php endforeach; ?>

                </div>

                <!-- Tombol Prev -->
                <button
                    class="carousel-control-prev custom-carousel-btn"
                    type="button"
                    data-bs-target="#carouselStaf"
                    data-bs-slide="prev">

                    <span class="carousel-control-prev-icon"></span>

                </button>

                <!-- Tombol Next -->
                <button
                    class="carousel-control-next custom-carousel-btn"
                    type="button"
                    data-bs-target="#carouselStaf"
                    data-bs-slide="next">

                    <span class="carousel-control-next-icon"></span>

                </button>

            </div>

        </div>

    </div>

</section>

<style>
#carouselStaf{
    overflow: visible;
}

#carouselStaf .carousel-control-prev{
    left: -70px;
}

#carouselStaf .carousel-control-next{
    right: -70px;
}

#carouselStaf .carousel-control-prev,
#carouselStaf .carousel-control-next{
    width: 50px;
    opacity: 1;
}

#carouselStaf .carousel-control-prev-icon,
#carouselStaf .carousel-control-next-icon{
    background-color: #212529;
    border-radius: 50%;
    padding: 18px;
    background-size: 55%;
}
</style>
</section>
</section>
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>

Chart.register(ChartDataLabels);

const centerText = {

    id:'centerText',

    afterDraw(chart,args,pluginOptions){

        const {ctx} = chart;
        const meta = chart.getDatasetMeta(0);

        if(!meta.data.length) return;

        const x = meta.data[0].x;
        const y = meta.data[0].y;

        ctx.save();

        ctx.textAlign="center";
        ctx.textBaseline="middle";

        ctx.font="bold 15px Arial";
        ctx.fillStyle="#666";
        ctx.fillText(pluginOptions.text1,x,y-12);

        ctx.font="bold 22px Arial";
        ctx.fillStyle="#000";
        ctx.fillText(pluginOptions.text2,x,y+15);

        ctx.restore();

    }

};

Chart.register(centerText);

// Grafik Surat

new Chart(document.getElementById("chartSurat"),{

    type:"doughnut",

    data:{

        labels:[
            "Surat Keterangan",
            "SKD",
            "SKTM",
            "SKU",
            "Surat Pengantar",
            "SPIK"
        ],

        datasets:[{

            data:[
                <?= $jumlah_surat_keterangan ?>,
                <?= $jumlah_skd ?>,
                <?= $jumlah_sktm ?>,
                <?= $jumlah_sku ?>,
                <?= $jumlah_surat_pengantar ?>,
                <?= $jumlah_spik ?>
            ],

            backgroundColor:[
                "#6f42c1",
                "#0d6efd",
                "#198754",
                "#20c997",
                "#fd7e14",
                "#dc3545"
            ]

        }]

    },
    options:{

        responsive:true,
        maintainAspectRatio:false,

        plugins:{

            centerText:{
                text1:"TOTAL",
                text2:"<?= $total_surat ?>"
            },


            legend:{
                position:"right",
                align:"center",
                labels:{
                    boxWidth:14,
                    padding:18,
                    font:{
                        size:12
                    }
                }
            },
maintainAspectRatio:false,
            datalabels:{
                color:"#fff",
                font:{
                    size:15,
                    weight:"bold"
                }
            }

        }

    }

});

// Grafik Penduduk

new Chart(document.getElementById("chartPenduduk"),{

    type:"doughnut",

    data:{
        labels:["Laki-Laki","Perempuan"],
        datasets:[{
            data:[
                <?= $jumlah_laki ?>,
                <?= $jumlah_perempuan ?>
            ],
            backgroundColor:[
                "#0d6efd",
                "#e83e8c"
            ]
        }]
    },

    options:{

        responsive:true,
        maintainAspectRatio:false,

        plugins:{

            centerText:{
                text1:"TOTAL",
                text2:"<?= $total_penduduk ?>"
            },

            legend:{
                position:"right"
            },

            datalabels:{
                color:"#fff",
                font:{
                    size:15,
                    weight:"bold"
                }
            }

        }

    }

});

</script>