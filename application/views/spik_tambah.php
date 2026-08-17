<div class="container">

    <h5>Pengajuan Surat Pengantar Izin Keramaian (SPIK)</h5>

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

                    <div class="col-md-12 mb-3">
                        <label>Maksud Keramaian</label>
                        <textarea name="maksud_keramaian"
                                  class="form-control"
                                  rows="3"
                                  required></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Tanggal Penyelenggaraan</label>
                        <input type="date"
                               name="tanggal_penyelenggaraan"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Waktu Mulai</label>
                        <input type="time"
                               name="waktu_mulai"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Waktu Selesai</label>
                        <input type="time"
                               name="waktu_selesai"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Jenis Hiburan</label>
                        <input type="text"
                               name="jenis_hiburan"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Jumlah Undangan</label>
                        <input type="number"
                               name="jumlah_undangan"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Tanggal Pengajuan</label>
                        <input type="date"
                               name="tanggal_pengajuan"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Tempat Penyelenggaraan</label>
                        <textarea name="tempat_penyelenggaraan"
                                  class="form-control"
                                  rows="3"
                                  required></textarea>
                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="<?= base_url('spik'); ?>" class="btn btn-secondary">
                    Kembali
                </a>

            </div>

        </div>

    </form>

</div>