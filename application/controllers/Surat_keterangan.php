<?php
class Surat_keterangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("id_warga")) {
            redirect("/", "refresh");
        }

        $this->load->model("Msurat_keterangan");
        $this->load->library("pdf");
    }

    function index()
    {
        $id_warga = $this->session->userdata("id_warga");

        $data["surat_keterangan"] = $this->Msurat_keterangan->tampil($id_warga);

        $this->load->view("header");
        $this->load->view("surat_keterangan_tampil", $data);
        $this->load->view("footer");
    }

    function tambah()
    {
        if ($this->input->post()) {

            $input = $this->input->post();

            $input["id_warga"] = $this->session->userdata("id_warga");
            $input["status"] = "Menunggu";

            $this->Msurat_keterangan->simpan($input);

            redirect("surat_keterangan","refresh");
        }

        $id_warga = $this->session->userdata("id_warga");

        $data["warga"] = $this->db
            ->where("id_warga",$id_warga)
            ->get("warga")
            ->row_array();

        $this->load->view("header");
        $this->load->view("surat_keterangan_tambah",$data);
        $this->load->view("footer");
    }
    public function print($id_surat_keterangan)
{
    $d = $this->Msurat_keterangan->detail($id_surat_keterangan);

    if (!$d) {
        show_404();
    }

    $pdf = new Pdf();
    $pdf->AddPage();

    $bulan = [
        1 => "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    ];

    // ==========================
    // KODE DESA
    // ==========================

    $pdf->SetFont('Times','',12);
    $pdf->SetXY(10,43);
    $pdf->Cell(0,5,'Kode Desa : 15022015',0,1,'L');

    // ==========================
    // JUDUL SURAT
    // ==========================

    $pdf->Ln(10);

    $pdf->SetFont('Times','B',14);
    $pdf->Cell(190,7,'SURAT KETERANGAN',0,1,'C');

    $pdf->SetFont('Times','',12);
    $pdf->Cell(190,6,'Nomor : '.$d['nomor_surat'],0,1,'C');

    $pdf->Ln(6);

    // ==========================
    // PEMBUKA
    // ==========================

    $pdf->SetFont('Times','',12);

    $pdf->MultiCell(
        0,
        6,
        "Yang bertanda tangan di bawah ini kami Kepala Desa Termas Kecamatan Karangrayung Kabupaten Grobogan Provinsi Jawa Tengah, menerangkan bahwa :"
    );

    $pdf->Ln(4);

    // ==========================
    // DATA PEMOHON
    // ==========================

    $tgl_lahir = strtotime($d['tanggal_lahir']);

    $lahir =
        date('d',$tgl_lahir)." ".
        $bulan[date('n',$tgl_lahir)]." ".
        date('Y',$tgl_lahir);

    $alamat =
        "Dusun ".$d['dusun'].
        ", RT.".sprintf('%03d',$d['rt']).
        " / RW.".sprintf('%03d',$d['rw']);

    $pdf->Cell(10,6,'1.');
    $pdf->Cell(45,6,'Nama');
    $pdf->Cell(5,6,':');
    $pdf->Cell(0,6,$d['nama_lengkap'],0,1);

    $pdf->Cell(10,6,'2.');
    $pdf->Cell(45,6,'Jenis Kelamin');
    $pdf->Cell(5,6,':');
    $pdf->Cell(0,6,$d['jenis_kelamin'],0,1);

    $pdf->Cell(10,6,'3.');
    $pdf->Cell(45,6,'Tempat / Tanggal Lahir');
    $pdf->Cell(5,6,':');
    $pdf->Cell(0,6,$d['tempat_lahir']." / ".$lahir,0,1);

    $pdf->Cell(10,6,'4.');
    $pdf->Cell(45,6,'Warganegara');
    $pdf->Cell(5,6,':');
    $pdf->Cell(0,6,$d['kewarganegaraan'],0,1);

    $pdf->Cell(10,6,'5.');
    $pdf->Cell(45,6,'Agama');
    $pdf->Cell(5,6,':');
    $pdf->Cell(0,6,$d['agama'],0,1);

    $pdf->Cell(10,6,'6.');
    $pdf->Cell(45,6,'Pekerjaan');
    $pdf->Cell(5,6,':');
    $pdf->Cell(0,6,$d['pekerjaan'],0,1);

    $pdf->Cell(10,6,'7.');
    $pdf->Cell(45,6,'Tempat Tinggal');
    $pdf->Cell(5,6,':');
    $pdf->MultiCell(0,6,$alamat);

    $pdf->Cell(10,6,'8.');
    $pdf->Cell(45,6,'NIK');
    $pdf->Cell(5,6,':');
    $pdf->Cell(0,6,$d['nik'],0,1);

    
    $tgl = strtotime($d['tanggal']);

    $tanggal =
        date('d',$tgl)." ".
        $bulan[date('n',$tgl)]." ".
        date('Y',$tgl);

    $berlaku =
        $tanggal." s/d ".
        date('d',strtotime('+30 days',$tgl))." ".
        $bulan[date('n',strtotime('+30 days',$tgl))]." ".
        date('Y',strtotime('+30 days',$tgl));

    $pdf->Cell(10,6,'9.');
    $pdf->Cell(45,6,'Keperluan');
    $pdf->Cell(5,6,':');
    $pdf->MultiCell(
        0,
        6,
        $d['keperluan']
    );

    $pdf->Cell(10,6,'10.');
    $pdf->Cell(45,6,'Berlaku');
    $pdf->Cell(5,6,':');
    $pdf->Cell(
        0,
        6,
        $berlaku,
        0,
        1
    );

    $pdf->Cell(10,6,'11.');
    $pdf->Cell(45,6,'Keterangan Lain');
    $pdf->Cell(5,6,':');
    $pdf->MultiCell(
        0,
        6,
        !empty($d['keterangan_lain'])
            ? $d['keterangan_lain']
            : "-"
    );
    $pdf->Ln(5);

    // ==========================
    // ISI SURAT
    // ==========================



    $pdf->Ln(3);

    $pdf->MultiCell(
        0,
        6,
        "Demikian Surat Keterangan ini dibuat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya."
    );

    $pdf->Ln(8);
    // ==========================
// ==========================
// TANDA TANGAN
// ==========================

$pdf->Ln(8);

// Ambil posisi terakhir setelah isi surat
$y = $pdf->GetY();
$pdf->SetY($y);

$pdf->SetFont('Times','',12);

// Baris pertama
$pdf->Cell(95,6,'Pemohon',0,0,'C');
$pdf->Cell(95,6,'Termas, '.$tanggal,0,1,'C');

// Baris kedua
$pdf->Cell(95,6,'',0,0);
$pdf->Cell(95,6,'KEPALA DESA TERMAS',0,1,'C');

// Ambil posisi setelah tulisan Kepala Desa
$ttdY = $pdf->GetY();

// TTD Kepala Desa
$pdf->Image(
    FCPATH.'assets/logo/ttd.png',
    120,          // Posisi X
    $ttdY - 3,    // Posisi Y (naik agar dekat dengan tulisan)
    50            // Ukuran gambar
);

// Ruang untuk tanda tangan
$pdf->Ln(30);

$pdf->SetFont('Times','U',12);

// Nama Pemohon
$pdf->Cell(
    95,
    6,
    strtoupper($d['nama_lengkap']),
    0,
    0,
    'C'
);

// Nama Kepala Desa
$pdf->Cell(
    95,
    6,
    'H. NITI, SKM.MM',
    0,
    1,
    'C'
);

$pdf->Output(
    "I",
    "Surat_Keterangan.pdf"
);
}
}