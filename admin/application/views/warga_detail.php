<div class="container">

    <h5>Detail Data Warga</h5>

    <div class="row">

        <!-- NIK -->
        <div class="col-md-6 mb-3">
            <label>NIK</label>
            <input type="text" class="form-control" value="<?php echo $warga['nik']; ?>" readonly>
        </div>

        <!-- Nama -->
        <div class="col-md-6 mb-3">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" value="<?php echo $warga['nama_lengkap']; ?>" readonly>
        </div>

        <!-- Tempat Lahir -->
        <div class="col-md-6 mb-3">
            <label>Tempat Lahir</label>
            <input type="text" class="form-control" value="<?php echo $warga['tempat_lahir']; ?>" readonly>
        </div>

        <!-- Tanggal Lahir -->
        <div class="col-md-6 mb-3">
            <label>Tanggal Lahir</label>
            <input type="text" class="form-control"
                value="<?= date('d-m-Y', strtotime($warga['tanggal_lahir'])); ?>" readonly>
        </div>

        <!-- Jenis Kelamin -->
        <div class="col-md-6 mb-3">
            <label>Jenis Kelamin</label>
            <input type="text" class="form-control" value="<?php echo $warga['jenis_kelamin']; ?>" readonly>
        </div>

        <!-- Agama -->
        <div class="col-md-6 mb-3">
            <label>Agama</label>
            <input type="text" class="form-control" value="<?php echo $warga['agama']; ?>" readonly>
        </div>

        <!-- Pendidikan -->
        <div class="col-md-6 mb-3">
            <label>Pendidikan</label>
            <input type="text" class="form-control" value="<?php echo $warga['pendidikan']; ?>" readonly>
        </div>

        <!-- Pekerjaan -->
        <div class="col-md-6 mb-3">
            <label>Pekerjaan</label>
            <input type="text" class="form-control" value="<?php echo $warga['pekerjaan']; ?>" readonly>
        </div>

        <!-- Status -->
        <div class="col-md-6 mb-3">
            <label>Status Perkawinan</label>
            <input type="text" class="form-control" value="<?php echo $warga['status_perkawinan']; ?>" readonly>
        </div>

        <!-- Kewarganegaraan -->
        <div class="col-md-6 mb-3">
            <label>Kewarganegaraan</label>
            <input type="text" class="form-control" value="<?php echo $warga['kewarganegaraan']; ?>" readonly>
        </div>

        <!-- RT -->
        <div class="col-md-1 mb-3">
            <label>RT</label>
            <input type="text" class="form-control"
                value="<?php echo sprintf('%03d',$warga['rt']); ?>" readonly>
        </div>

        <!-- RW -->
        <div class="col-md-1 mb-3">
            <label>RW</label>
            <input type="text" class="form-control"
                value="<?php echo sprintf('%03d',$warga['rw']); ?>" readonly>
        </div>

        <!-- Dusun -->
        <div class="col-md-4 mb-3">
            <label>Dusun</label>
            <input type="text" class="form-control" value="<?php echo $warga['dusun']; ?>" readonly>
        </div>

        <!-- Kecamatan -->
        <div class="col-md-6 mb-3">
            <label>Kecamatan</label>
            <input type="text" class="form-control" value="<?php echo $warga['kecamatan']; ?>" readonly>
        </div>

        <!-- Ayah -->
        <div class="col-md-6 mb-3">
            <label>Nama Ayah</label>
            <input type="text" class="form-control" value="<?php echo $warga['nama_ayah']; ?>" readonly>
        </div>

        <!-- Ibu -->
        <div class="col-md-6 mb-3">
            <label>Nama Ibu</label>
            <input type="text" class="form-control" value="<?php echo $warga['nama_ibu']; ?>" readonly>
        </div>

    </div>

    <button type="button" class="btn btn-secondary" onclick="history.back();">
        Kembali
    </button>

</div>