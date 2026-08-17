<div class="container">
    <h5>Edit Data Warga</h5>

    <form method="post">
        <div class="row">

            <!-- NIK -->
            <div class="col-md-6 mb-3">
                <label>NIK</label>
                <input type="text" name="nik" class="form-control"
                    value="<?php echo set_value('nik',$warga['nik']); ?>">
                <span class="small text-danger"><?php echo form_error('nik'); ?></span>
            </div>

            <!-- Nama -->
            <div class="col-md-6 mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control"
                    value="<?php echo set_value('nama_lengkap',$warga['nama_lengkap']); ?>">
                <span class="small text-danger"><?php echo form_error('nama_lengkap'); ?></span>
            </div>

            <!-- Tempat Lahir -->
            <div class="col-md-6 mb-3">
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control"
                    value="<?php echo set_value('tempat_lahir',$warga['tempat_lahir']); ?>">
                <span class="small text-danger"><?php echo form_error('tempat_lahir'); ?></span>
            </div>

            <!-- Tanggal Lahir -->
            <div class="col-md-6 mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control"
                    value="<?php echo set_value('tanggal_lahir',$warga['tanggal_lahir']); ?>">
                <span class="small text-danger"><?php echo form_error('tanggal_lahir'); ?></span>
            </div>

            <!-- Jenis Kelamin -->
            <div class="col-md-6 mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="">-- PILIH --</option>
                    <option value="LAKI-LAKI" <?= set_select('jenis_kelamin','LAKI-LAKI',$warga['jenis_kelamin']=="LAKI-LAKI"); ?>>LAKI-LAKI</option>
                    <option value="PEREMPUAN" <?= set_select('jenis_kelamin','PEREMPUAN',$warga['jenis_kelamin']=="PEREMPUAN"); ?>>PEREMPUAN</option>
                </select>
                <span class="small text-danger"><?php echo form_error('jenis_kelamin'); ?></span>
            </div>

            <!-- Agama -->
            <div class="col-md-6 mb-3">
                <label>Agama</label>
                <select name="agama" class="form-control">
                    <option value="">-- PILIH --</option>
                    <option value="ISLAM" <?= set_select('agama','ISLAM',$warga['agama']=="ISLAM"); ?>>ISLAM</option>
                    <option value="KRISTEN" <?= set_select('agama','KRISTEN',$warga['agama']=="KRISTEN"); ?>>KRISTEN</option>
                    <option value="KATOLIK" <?= set_select('agama','KATOLIK',$warga['agama']=="KATOLIK"); ?>>KATOLIK</option>
                    <option value="HINDU" <?= set_select('agama','HINDU',$warga['agama']=="HINDU"); ?>>HINDU</option>
                    <option value="BUDDHA" <?= set_select('agama','BUDDHA',$warga['agama']=="BUDDHA"); ?>>BUDDHA</option>
                    <option value="KONGHUCU" <?= set_select('agama','KONGHUCU',$warga['agama']=="KONGHUCU"); ?>>KONGHUCU</option>
                </select>
                <span class="small text-danger"><?php echo form_error('agama'); ?></span>
            </div>

            <!-- Pendidikan -->
            <div class="col-md-6 mb-3">
                <label>Pendidikan</label>
                <select name="pendidikan" class="form-control">
                    <option value="">-- PILIH PENDIDIKAN --</option>
                    <option value="TIDAK/BELUM SEKOLAH" <?= set_select('pendidikan','TIDAK/BELUM SEKOLAH',$warga['pendidikan']=="TIDAK/BELUM SEKOLAH"); ?>>TIDAK/BELUM SEKOLAH</option>
                    <option value="BELUM TAMAT SD/SEDERAJAT" <?= set_select('pendidikan','BELUM TAMAT SD/SEDERAJAT',$warga['pendidikan']=="BELUM TAMAT SD/SEDERAJAT"); ?>>BELUM TAMAT SD/SEDERAJAT</option>
                    <option value="TAMAT SD/SEDERAJAT" <?= set_select('pendidikan','TAMAT SD/SEDERAJAT',$warga['pendidikan']=="TAMAT SD/SEDERAJAT"); ?>>TAMAT SD/SEDERAJAT</option>
                    <option value="SLTP/SEDERAJAT" <?= set_select('pendidikan','SLTP/SEDERAJAT',$warga['pendidikan']=="SLTP/SEDERAJAT"); ?>>SLTP/SEDERAJAT</option>
                    <option value="SLTA/SEDERAJAT" <?= set_select('pendidikan','SLTA/SEDERAJAT',$warga['pendidikan']=="SLTA/SEDERAJAT"); ?>>SLTA/SEDERAJAT</option>
                    <option value="DIPLOMA I" <?= set_select('pendidikan','DIPLOMA I',$warga['pendidikan']=="DIPLOMA I"); ?>>DIPLOMA I</option>
                    <option value="DIPLOMA II" <?= set_select('pendidikan','DIPLOMA II',$warga['pendidikan']=="DIPLOMA II"); ?>>DIPLOMA II</option>
                    <option value="DIPLOMA III" <?= set_select('pendidikan','DIPLOMA III',$warga['pendidikan']=="DIPLOMA III"); ?>>DIPLOMA III</option>
                    <option value="DIPLOMA IV/SARJANA" <?= set_select('pendidikan','DIPLOMA IV/SARJANA',$warga['pendidikan']=="DIPLOMA IV/SARJANA"); ?>>DIPLOMA IV/SARJANA</option>
                    <option value="MAGISTER" <?= set_select('pendidikan','MAGISTER',$warga['pendidikan']=="MAGISTER"); ?>>MAGISTER</option>
                    <option value="DOKTOR" <?= set_select('pendidikan','DOKTOR',$warga['pendidikan']=="DOKTOR"); ?>>DOKTOR</option>
                </select>
                <span class="small text-danger"><?php echo form_error('pendidikan'); ?></span>
            </div>

            <!-- Pekerjaan -->
            <div class="col-md-6 mb-3">
                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control"
                    value="<?php echo set_value('pekerjaan',$warga['pekerjaan']); ?>">
                <span class="small text-danger"><?php echo form_error('pekerjaan'); ?></span>
            </div>

            <!-- Status -->
            <div class="col-md-6 mb-3">
                <label>Status Perkawinan</label>
                <select name="status_perkawinan" class="form-control">
                    <option value="">-- PILIH --</option>
                    <option value="BELUM KAWIN" <?= set_select('status_perkawinan','BELUM KAWIN',$warga['status_perkawinan']=="BELUM KAWIN"); ?>>BELUM KAWIN</option>
                    <option value="KAWIN" <?= set_select('status_perkawinan','KAWIN',$warga['status_perkawinan']=="KAWIN"); ?>>KAWIN</option>
                    <option value="CERAI HIDUP" <?= set_select('status_perkawinan','CERAI HIDUP',$warga['status_perkawinan']=="CERAI HIDUP"); ?>>CERAI HIDUP</option>
                    <option value="CERAI MATI" <?= set_select('status_perkawinan','CERAI MATI',$warga['status_perkawinan']=="CERAI MATI"); ?>>CERAI MATI</option>
                </select>
                <span class="small text-danger"><?php echo form_error('status_perkawinan'); ?></span>
            </div>

            <!-- RT -->
            <div class="col-md-1 mb-3">
                <label>RT</label>
                <input type="number" name="rt" class="form-control" min="1" max="2"
                    value="<?php echo set_value('rt',$warga['rt']); ?>">
                <span class="small text-danger"><?php echo form_error('rt'); ?></span>
            </div>

            <!-- RW -->
            <div class="col-md-1 mb-3">
                <label>RW</label>
                <input type="number" name="rw" class="form-control" min="1" max="5"
                    value="<?php echo set_value('rw',$warga['rw']); ?>">
                <span class="small text-danger"><?php echo form_error('rw'); ?></span>
            </div>

            <!-- Kewarganegaraan -->
            <div class="col-md-2 mb-3">
                <label>Kewarganegaraan</label>
                <select name="kewarganegaraan" class="form-control">
                    <option value="INDONESIA" <?= set_select('kewarganegaraan','INDONESIA',$warga['kewarganegaraan']=="INDONESIA"); ?>>INDONESIA</option>
                    <option value="WARGA NEGARA ASING" <?= set_select('kewarganegaraan','WARGA NEGARA ASING',$warga['kewarganegaraan']=="WARGA NEGARA ASING"); ?>>WARGA NEGARA ASING</option>
                </select>
                <span class="small text-danger"><?php echo form_error('kewarganegaraan'); ?></span>
            </div>

            <!-- Dusun -->
            <div class="col-md-2 mb-3">
                <label>Dusun</label>
            <select name="dusun" class="form-control">
                <option value="">-- Pilih Dusun --</option>
                <option value="MRAYUN" <?= set_select('dusun', 'MRAYUN', $warga['dusun'] == 'MRAYUN'); ?>>Mrayun</option>
                <option value="TERMAS" <?= set_select('dusun', 'TERMAS', $warga['dusun'] == 'TERMAS'); ?>>Termas</option>
                <option value="GETAS" <?= set_select('dusun', 'GETAS', $warga['dusun'] == 'GETAS'); ?>>Getas</option>
            </select>
            </div>

            <!-- Kecamatan -->
            <div class="col-md-4 mb-3">
                <label>Kecamatan</label>
                <input type="text" name="kecamatan" class="form-control"
                    value="<?php echo set_value('kecamatan',$warga['kecamatan']); ?>">
                <span class="small text-danger"><?php echo form_error('kecamatan'); ?></span>
            </div>

            <!-- Nama Ayah -->
            <div class="col-md-4 mb-3">
                <label>Nama Ayah</label>
                <input type="text" name="nama_ayah" class="form-control"
                    value="<?php echo set_value('nama_ayah',$warga['nama_ayah']); ?>">
                <span class="small text-danger"><?php echo form_error('nama_ayah'); ?></span>
            </div>

            <!-- Nama Ibu -->
            <div class="col-md-4 mb-3">
                <label>Nama Ibu</label>
                <input type="text" name="nama_ibu" class="form-control"
                    value="<?php echo set_value('nama_ibu',$warga['nama_ibu']); ?>">
                <span class="small text-danger"><?php echo form_error('nama_ibu'); ?></span>
            </div>

            <!-- Password -->
            <div class="col-md-6 mb-3">
                <label>Password Baru</label>
                <input type="password" name="password" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-secondary" onclick="history.back();">Kembali</button>

    </form>
</div>