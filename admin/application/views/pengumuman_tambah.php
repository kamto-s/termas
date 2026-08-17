<div class="container">
    <h5>Tambah Pengumuman</h5>

    <form method="post" enctype="multipart/form-data">

        <div class="row">

            <!-- Judul -->
            <div class="col-md-12 mb-3">
                <label>Judul Pengumuman</label>
                <input type="text"
                       name="judul_pengumuman"
                       class="form-control"
                       value="<?php echo set_value('judul_pengumuman'); ?>">

                <span class="small text-danger">
                    <?php echo form_error('judul_pengumuman'); ?>
                </span>
            </div>

            <!-- keterangan -->
            <div class="col-md-12 mb-3">
                <label>Keterangan</label>

                <textarea name="keterangan_pengumuman"
                          id="editorku"
                          class="form-control"
                          rows="8"><?php echo set_value('keterangan_pengumuman'); ?></textarea>

                <span class="small text-danger">
                    <?php echo form_error('keterangan_pengumuman'); ?>
                </span>
            </div>

            <!-- Upload Foto -->
            <div class="col-md-6 mb-3">
                <label>Foto Pengumuman</label>
                <input type="file"
                       name="foto_pengumuman"
                       class="form-control">

                <span class="small text-danger">
                    <?php echo form_error('foto_pengumuman'); ?>
                </span>
            </div>

            <!-- Tanggal -->
            <div class="col-md-3 mb-3">
                <label>Tanggal</label>

                <input type="date"
                       name="tanggal_pengumuman"
                       class="form-control"
                       value="<?php echo set_value('tanggal_pengumuman'); ?>">

                <span class="small text-danger">
                    <?php echo form_error('tanggal_pengumuman'); ?>
                </span>
            </div>

            <!-- Waktu -->
            <div class="col-md-3 mb-3">
                <label>Waktu</label>

                <input type="time"
                       name="waktu_pengumuman"
                       class="form-control"
                       value="<?php echo set_value('waktu_pengumuman'); ?>">

                <span class="small text-danger">
                    <?php echo form_error('waktu_pengumuman'); ?>
                </span>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>

        <button type="button"
                class="btn btn-secondary"
                onclick="history.back();">
            Kembali
        </button>

    </form>
</div>