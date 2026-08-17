<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Verifikasi Surat</title>

<style>
body{
    margin:0;
    background:#f5f5f5;
    font-family:Arial, Helvetica, sans-serif;
}

.container{
    width:700px;
    margin:40px auto;
}

.card{
    background:#fff;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.15);
}

h2{
    text-align:center;
    color:#006400;
    margin-bottom:5px;
}

h4{
    text-align:center;
    margin-top:0;
    color:#666;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

td{
    padding:10px;
    border-bottom:1px solid #ddd;
}

.status{
    color:green;
    font-size:18px;
    font-weight:bold;
}

.footer{
    margin-top:25px;
    text-align:center;
    color:#777;
    font-size:13px;
}
</style>

</head>
<body>

<div class="container">

<div class="card">

<h2>✓ VERIFIKASI SURAT</h2>

<h4><?= strtoupper($jenis); ?></h4>

<table>

<tr>
    <td width="220">Nomor Surat</td>
    <td><?= $surat['nomor_surat']; ?></td>
</tr>

<tr>
    <td>Nama Lengkap</td>
    <td><?= $surat['nama_lengkap']; ?></td>
</tr>

<tr>
    <td>NIK</td>
    <td><?= $surat['nik']; ?></td>
</tr>

<tr>
    <td>Tanggal Surat</td>
    <td><?= date('d-m-Y', strtotime($surat['tanggal'])); ?></td>
</tr>

<?php if(isset($surat['keperluan'])) { ?>

<tr>
    <td>Keperluan</td>
    <td><?= $surat['keperluan']; ?></td>
</tr>

<?php } ?>

<tr>
    <td>Status</td>
    <td class="status">SURAT TERVERIFIKASI</td>
</tr>

</table>

<div class="footer">
Dokumen ini telah diverifikasi oleh Sistem Informasi Pelayanan Surat Desa Termas.
</div>

</div>

</div>

</body>
</html>