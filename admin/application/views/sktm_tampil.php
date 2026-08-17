<div class="container">

    <h5>
        Data Permohonan Surat Keterangan Tidak Mampu (SKTM)
    </h5>


    <table class="table table-bordered table-striped" id="tabelku">


        <thead class="table-primary text-center">

            <tr>

                <th width="60">No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Nomor Surat</th>
                <th width="150">Status</th>
                <th width="120">Opsi</th>

            </tr>

        </thead>



        <tbody>


        <?php foreach($sktm as $k=>$v){ ?>


            <tr>


                <td class="text-center">
                    <?= $k+1; ?>
                </td>


                <td>
                    <?= $v['nik']; ?>
                </td>


                <td>
                    <?= $v['nama_lengkap']; ?>
                </td>

                <td>
                    <?= $v['nomor_surat']; ?>
                </td>


                <td class="text-center">


                    <?php if($v['status']=="Menunggu"){ ?>

                        <span class="badge bg-warning text-dark">
                            Menunggu
                        </span>


                    <?php }elseif($v['status']=="Disetujui"){ ?>


                        <span class="badge bg-success">
                            Disetujui
                        </span>


                    <?php }else{ ?>


                        <span class="badge bg-danger">
                            Ditolak
                        </span>


                    <?php } ?>


                </td>



                <td class="text-center">


                    <a href="<?= base_url('sktm/detail/'.$v['id_sktm']); ?>"
                       class="btn btn-info btn-sm">

                        Detail

                    </a>


                </td>


            </tr>


        <?php } ?>


        </tbody>


    </table>


</div>