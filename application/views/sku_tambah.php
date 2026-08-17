<div class="container">

    <h5>Pengajuan Surat Keterangan Usaha (SKU)</h5>

    <form method="post">

        <div class="card">

            <div class="card-header">
                Data Pemohon
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>NIK</label>
                        <input type="text"
                               class="form-control bg-light"
                               value="<?= $warga['nik']; ?>"
                               readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text"
                               class="form-control bg-light"
                               value="<?= $warga['nama_lengkap']; ?>"
                               readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Jenis Kelamin</label>
                        <input type="text"
                               class="form-control bg-light"
                               value="<?= $warga['jenis_kelamin']; ?>"
                               readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Tempat, Tanggal Lahir</label>
                        <input type="text"
                               class="form-control bg-light"
                               value="<?= $warga['tempat_lahir']; ?>, <?= date('d-m-Y', strtotime($warga['tanggal_lahir'])); ?>"
                               readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Agama</label>
                        <input type="text"
                               class="form-control bg-light"
                               value="<?= $warga['agama']; ?>"
                               readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Kewarganegaraan</label>
                        <input type="text"
                               class="form-control bg-light"
                               value="<?= $warga['kewarganegaraan']; ?>"
                               readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Pekerjaan</label>
                        <input type="text"
                               class="form-control bg-light"
                               value="<?= $warga['pekerjaan']; ?>"
                               readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Alamat</label>
                        <textarea class="form-control bg-light"
                                  rows="3"
                                  readonly>Dusun <?= $warga['dusun']; ?>, RT.<?= sprintf('%03d',$warga['rt']); ?> / RW.<?= sprintf('%03d',$warga['rw']); ?></textarea>
                    </div>

                </div>

                <hr>

                <h6 class="fw-bold mb-3">Data Pengajuan Surat</h6>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Tanggal</label>
                        <input type="date"
                               name="tanggal"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Jenis Usaha</label>
                        <input type="text"
                               name="jenis_usaha"
                               class="form-control"
                               placeholder="Masukkan jenis usaha"
                               required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Keperluan</label>
                        <textarea name="keperluan"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Masukkan keperluan pembuatan Surat Keterangan Usaha"
                                  required></textarea>
                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="<?= base_url('sku'); ?>" class="btn btn-secondary">
                    Kembali
                </a>

            </div>

        </div>

    </form>

</div>