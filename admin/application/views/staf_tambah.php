<div class="container">
    <h5>Tambah Staf</h5>

    <form method="post" enctype="multipart/form-data">

        <div class="row">

            <!-- nama -->
            <div class="col-md-6 mb-3">
                <label>Nama</label>
                <input type="text"
                       name="nama_staf"
                       class="form-control"
                       value="<?php echo set_value('nama_staf'); ?>">

                <span class="small text-danger">
                    <?php echo form_error('nama_staf'); ?>
                </span>
            </div>

<div class="col-md-6 mb-3">
    <label>Jabatan</label>

    <select name="jabatan" class="form-control">
        <option value="">-- PILIH JABATAN --</option>

        <option value="KEPALA DESA" <?= set_select('jabatan','KEPALA DESA'); ?>>
            KEPALA DESA
        </option>

        <option value="SEKRETARIS DESA" <?= set_select('jabatan','SEKRETARIS DESA'); ?>>
            SEKRETARIS DESA
        </option>

        <option value="KAUR TATA USAHA DAN UMUM" <?= set_select('jabatan','KAUR TATA USAHA DAN UMUM'); ?>>
            KAUR TATA USAHA DAN UMUM
        </option>

        <option value="KAUR KEUANGAN" <?= set_select('jabatan','KAUR KEUANGAN'); ?>>
            KAUR KEUANGAN
        </option>

        <option value="KAUR PERENCANAAN" <?= set_select('jabatan','KAUR PERENCANAAN'); ?>>
            KAUR PERENCANAAN
        </option>

        <option value="KASI PEMERINTAHAN" <?= set_select('jabatan','KASI PEMERINTAHAN'); ?>>
            KASI PEMERINTAHAN
        </option>

        <option value="KASI KESEJAHTERAAN" <?= set_select('jabatan','KASI KESEJAHTERAAN'); ?>>
            KASI KESEJAHTERAAN
        </option>

        <option value="KASI PELAYANAN" <?= set_select('jabatan','KASI PELAYANAN'); ?>>
            KASI PELAYANAN
        </option>

        <option value="KEPALA DUSUN MRAYUN" <?= set_select('jabatan','KEPALA DUSUN MRAYUN'); ?>>
            KEPALA DUSUN MRAYUN
        </option>

        <option value="KEPALA DUSUN TERMAS" <?= set_select('jabatan','KEPALA DUSUN TERMAS'); ?>>
            KEPALA DUSUN TERMAS
        </option>

        <option value="KEPALA DUSUN GETAS" <?= set_select('jabatan','KEPALA DUSUN GETAS'); ?>>
            KEPALA DUSUN GETAS
        </option>

    </select>

    <span class="small text-danger">
        <?php echo form_error('jabatan'); ?>
    </span>
</div>
            <!-- Upload Foto -->
            <div class="col-md-6 mb-3">
                <label>Foto Staf</label>
                <input type="file"
                       name="foto_staf"
                       class="form-control">

                <span class="small text-danger">
                    <?php echo form_error('foto_staf'); ?>
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