<div class="container mt-4">

    <h4>Selamat Datang Admin Desa Termas</h4><br>


    <div class="row">

        <!-- Grafik Surat -->
        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header">
                    <h5 class="mb-0">Total Pengajuan Surat</h5>
                </div>

                <div class="card-body text-center">

                    <div style="width:360px;height:320px;margin:auto;">
                        <canvas id="chartSurat"></canvas>
                    </div>

                </div>

            </div>

        </div>

        <!-- Grafik Penduduk -->
        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header">
                    <h5 class="mb-0">Total Penduduk</h5>
                </div>

                <div class="card-body text-center">

                    <div style="width:360px;height:320px;margin:auto;">
                        <canvas id="chartPenduduk"></canvas>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>

// Register plugin
Chart.register(ChartDataLabels);

// Plugin tulisan di tengah
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

// =====================
// CHART SURAT
// =====================

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
                "#6610f2",
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
            datalabels:{
                color:"#fff",
                font:{
                    size:16,
                    weight:"bold"
                },
                formatter:function(value){
                    return value;
                }
            }

        }

    }

});

// =====================
// CHART PENDUDUK
// =====================

new Chart(document.getElementById("chartPenduduk"),{

    type:"doughnut",

    data:{

        labels:[
            "LAKI-LAKI",
            "PEREMPUAN"
        ],

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
                    size:16,
                    weight:"bold"
                },
                formatter:function(value){
                    return value;
                }
            }

        }

    }

});

</script>