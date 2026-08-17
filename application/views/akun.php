<div class="container mt-5">
    <h4 class="mb-4">Ubah Akun</h4>

    <div class="row">
        <div class="col-md-6">

            <form method="post">

                <!-- Data yang tidak dapat diubah -->
                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text"
                           class="form-control bg-light"
                           value="<?php echo $this->session->userdata("nik"); ?>"
                           readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text"
                           class="form-control bg-light"
                           value="<?php echo $this->session->userdata("nama_lengkap"); ?>"
                           readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <input type="text"
                           class="form-control bg-light"
                           value="<?php echo $this->session->userdata("jenis_kelamin"); ?>"
                           readonly>
                </div>

                <!-- Yang bisa diubah -->
                <div class="mb-3">
                    <label class="form-label">Password Baru</label>
                    <input type="password"
                           name="password"
                           class="form-control">
                    <small class="text-muted">
                        Kosongkan jika password tidak ingin diubah.
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan Perubahan
                </button>

            </form>

        </div>
    </div>
</div>