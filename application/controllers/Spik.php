<?php
class Spik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("id_warga")) {
            redirect("/", "refresh");
        }

        $this->load->model("Mspik");
        $this->load->library("pdf");
    }

    function index()
    {
        $id_warga = $this->session->userdata("id_warga");

        $data["spik"] = $this->Mspik->tampil($id_warga);

        $this->load->view("header");
        $this->load->view("spik_tampil", $data);
        $this->load->view("footer");
    }

    function tambah()
    {
        if ($this->input->post()) {

            $input = $this->input->post();

            $input["id_warga"] = $this->session->userdata("id_warga");
            $input["status"] = "Menunggu";

            $this->Mspik->simpan($input);

            redirect("spik", "refresh");
        }

        // Ambil data warga yang login
        $id_warga = $this->session->userdata("id_warga");

        $data["warga"] = $this->db
            ->where("id_warga", $id_warga)
            ->get("warga")
            ->row_array();

        $this->load->view("header");
        $this->load->view("spik_tambah", $data);
        $this->load->view("footer");
    }
        function print($id_spik)
    {
        $d = $this->Mspik->detail($id_spik);

        if (!$d) {
            show_404();
        }

        $pdf = new Pdf();
        $pdf->AddPage();

        $pdf->SetFont('Times','',12);
        $pdf->SetXY(10,40);
        $pdf->Cell(60,5,'Kode Desa : 15022015',0,0,'L');

        $bulan = [
            1=>"Januari",
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

        $tglLahir = strtotime($d['tanggal_lahir']);
        $lahir =
        date('d',$tglLahir)." ".
        $bulan[date('n',$tglLahir)]." ".
        date('Y',$tglLahir);

        $tglAcara = strtotime($d['tanggal_penyelenggaraan']);
        $tanggalAcara =
        date('d',$tglAcara)." ".
        $bulan[date('n',$tglAcara)]." ".
        date('Y',$tglAcara);

        $tglSurat = strtotime($d['tanggal_pengajuan']);
        $tanggalSurat =
        date('d',$tglSurat)." ".
        $bulan[date('n',$tglSurat)]." ".
        date('Y',$tglSurat);

        //==========================
        // JUDUL SURAT
        //==========================

        // pindahkan posisi ke bawah agar tidak sejajar dengan Kode Desa
        $pdf->SetXY(10,45);

        $pdf->SetFont('Times','B',14);
        $pdf->Cell(190,7,'SURAT PENGANTAR IZIN KERAMAIAN',0,1,'C');

        $pdf->SetFont('Times','',12);
        $pdf->Cell(190,6,'Nomor : '.$d['nomor_surat'],0,1,'C');

        $pdf->Ln(3);
        //==========================
        // PEMBUKA
        //==========================

        $pdf->SetFont('Times','',12);

        $pdf->MultiCell(
            0,
            6,
            "   Yang bertanda tangan di bawah ini Kepala Desa Termas Kecamatan Karangrayung Kabupaten Grobogan menerangkan bahwa :"
        );

        $pdf->Ln(2);

        //==========================
        // IDENTITAS PEMOHON
        //==========================

        $pdf->Cell(55,6,'Nama Lengkap');
        $pdf->Cell(5,6,':');
        $pdf->Cell(0,6,$d['nama_lengkap'],0,1);

        $pdf->Cell(55,6,'Tempat/Tanggal Lahir');
        $pdf->Cell(5,6,':');
        $pdf->Cell(0,6,$d['tempat_lahir']." / ".$lahir,0,1);

        $pdf->Cell(55,6,'Jenis Kelamin');
        $pdf->Cell(5,6,':');
        $pdf->Cell(0,6,$d['jenis_kelamin'],0,1);

        $pdf->Cell(55,6,'Agama');
        $pdf->Cell(5,6,':');
        $pdf->Cell(0,6,$d['agama'],0,1);

        $pdf->Cell(55,6,'Kewarganegaraan');
        $pdf->Cell(5,6,':');
        $pdf->Cell(0,6,$d['kewarganegaraan'],0,1);

        $pdf->Cell(55,6,'No. KTP / NIK');
        $pdf->Cell(5,6,':');
        $pdf->Cell(0,6,$d['nik'],0,1);

        $pdf->Cell(55,6,'Pekerjaan');
        $pdf->Cell(5,6,':');
        $pdf->Cell(0,6,$d['pekerjaan'],0,1);

        $pdf->Cell(55,6,'Alamat');
        $pdf->Cell(5,6,':');

        $pdf->MultiCell(
            0,
            6,
            "Dusun ".$d['dusun'].
            ", RT.".sprintf('%03d',$d['rt']).
            " / RW.".sprintf('%03d',$d['rw'])
        );

        $pdf->Cell(55,6,'Maksud Keramaian');
        $pdf->Cell(5,6,':');
        $pdf->Cell(0,6,$d['maksud_keramaian'],0,1);

        $pdf->Cell(55,6,'Tanggal Penyelenggaraan');
        $pdf->Cell(5,6,':');
        $pdf->Cell(0,6,$tanggalAcara,0,1);

        $pdf->Cell(55,6,'Waktu');
        $pdf->Cell(5,6,':');
        $pdf->Cell(
            0,
            6,
            $d['waktu_mulai']." WIB s/d ".$d['waktu_selesai']." WIB",
            0,
            1
        );

        $pdf->Cell(55,6,'Jenis Hiburan');
        $pdf->Cell(5,6,':');
        $pdf->Cell(0,6,$d['jenis_hiburan'],0,1);

        $pdf->Cell(55,6,'Jumlah Undangan');
        $pdf->Cell(5,6,':');
        $pdf->Cell(0,6,$d['jumlah_undangan']." Orang",0,1);

        $pdf->Cell(55,6,'Tempat Penyelenggaraan');
        $pdf->Cell(5,6,':');

        $pdf->MultiCell(
            0,
            6,
            $d['tempat_penyelenggaraan']
        );

        $pdf->Ln(2);

        //==========================
        // ISI SURAT
        //==========================

        $pdf->MultiCell(
            0,
            6,
            "       Berdasarkan Surat Pernyataan dari Ketua Rukun Tetangga Nomor tanggal ".$tanggalSurat.", maka dengan ini menerangkan atas permohonan yang bersangkutan dapat dilaksanakan dengan ketentuan sebagai berikut :"
        );

        $pdf->Ln(1);
        $pdf->SetFont('Times','',12);
        
        $pdf->Cell(6,6,'1.',0,0);
        $pdf->MultiCell(
            0,
            6,
            "Pada waktu dilaksanakan keramaian harus menjaga keamanan, ketertiban lingkungan serta menghormati waktu ibadah masyarakat sekitar."
        );
        
        $pdf->Cell(6,6,'2.',0,0);
        $pdf->MultiCell(
            0,
            6,
            "Tidak diperkenankan melakukan kegiatan yang bertentangan dengan peraturan perundang-undangan maupun norma yang berlaku di masyarakat."
        );
        
        $pdf->Cell(6,6,'3.',0,0);
        $pdf->MultiCell(
            0,
            6,
            "Apabila menggunakan jalan umum agar terlebih dahulu memperoleh izin dari Kepolisian maupun instansi yang berwenang."
        );

  //==========================
// TANDA TANGAN
//==========================

$pdf->SetFont('Times','',12);

// Baris No. Reg dan Tanggal Surat
$pdf->Cell(60,6,'',0,0,'C');
$pdf->Cell(65,6,'No. Reg : ____________________',0,0,'L');
$pdf->Cell(65,6,'Termas, '.$tanggalSurat,0,1,'C');

$pdf->Cell(60,6,'',0,0,'C');
$pdf->Cell(65,6,'Tanggal : ____________________',0,0,'L');
$pdf->Cell(65,6,'KEPALA DESA TERMAS',0,1,'C');

// Ambil posisi tepat setelah tulisan Kepala Desa
$ttdY = $pdf->GetY();

// Judul
$pdf->Cell(60,6,'Pemohon',0,0,'C');
$pdf->Cell(65,6,'Mengetahui',0,0,'C');
$pdf->Cell(65,6,'',0,1,'C');

$pdf->Cell(60,6,'',0,0,'C');
$pdf->Cell(65,6,'Camat Karangrayung',0,0,'C');
$pdf->Cell(65,6,'',0,1,'C');

// TTD langsung memakai posisi tadi
$pdf->Image(
    FCPATH.'assets/logo/ttd.png',
    135,
    $ttdY-4,
    50
);
// Jarak ke nama
$pdf->Ln(15);

$pdf->SetFont('Times','BU',12);

// Nama Pemohon
$pdf->Cell(60,6,$d['nama_lengkap'],0,0,'C');

// Nama Camat
$pdf->Cell(65,6,'____________________',0,0,'C');

// Nama Kepala Desa
$pdf->Cell(65,6,'H. NITI, SKM.MM',0,1,'C');

$pdf->Output('I','SPIK.pdf');
}
}