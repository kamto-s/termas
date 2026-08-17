<?php
class Skd extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("id_warga")) {
            redirect("/", "refresh");
        }

        $this->load->model("Mskd");
        $this->load->library("pdf");
    }

    function index()
    {
        $id_warga = $this->session->userdata("id_warga");

        $data["skd"] = $this->Mskd->tampil($id_warga);

        $this->load->view("header");
        $this->load->view("skd_tampil", $data);
        $this->load->view("footer");
    }

    function tambah()
    {
        if ($this->input->post()) {

            $input = $this->input->post();

            $input["id_warga"] = $this->session->userdata("id_warga");
            $input["status"] = "Menunggu";

            $this->Mskd->simpan($input);

            redirect("skd","refresh");
        }

        // Ambil data warga yang login
        $id_warga = $this->session->userdata("id_warga");

        $data["warga"] = $this->db
            ->where("id_warga", $id_warga)
            ->get("warga")
            ->row_array();

        $this->load->view("header");
        $this->load->view("skd_tambah", $data);
        $this->load->view("footer");
    }
    function print($id_skd)
    {
        $d = $this->Mskd->detail($id_skd);

        if(!$d){
            show_404();
        }

        $pdf = new pdf();
        $pdf->AddPage();

        $bulan = [
            1=>"Januari","Februari","Maret","April","Mei","Juni",
            "Juli","Agustus","September","Oktober","November","Desember"
        ];

        // Judul
        $pdf->SetFont('Times','BU',14);
        $pdf->Cell(0,7,'SURAT KETERANGAN DOMISILI TEMPAT TINGGAL',0,1,'C');

        $pdf->SetFont('Times','',12);
        $pdf->Cell(0,6,'Nomor : '.$d['nomor_surat'],0,1,'C');

        $pdf->Ln(8);

        // Pembuka
        $pdf->SetFont('Times','',12);
        $pdf->MultiCell(
            0,
            7,
            "   Yang bertanda tangan di bawah ini kami Kepala Desa Termas Kecamatan Karangrayung Kabupaten Grobogan Provinsi Jawa Tengah, menerangkan bahwa :"
        );

        $pdf->Ln(5);

        // Data Penduduk
        $tgl = strtotime($d['tanggal_lahir']);
        $lahir = date('d',$tgl)." ".$bulan[date('n',$tgl)]." ".date('Y',$tgl);

        $pdf->Cell(10,7,'1.');
        $pdf->Cell(55,7,'Nama Lengkap');
        $pdf->Cell(5,7,':');
        $pdf->Cell(0,7,$d['nama_lengkap'],0,1);

        $pdf->Cell(10,7,'2.');
        $pdf->Cell(55,7,'Jenis Kelamin');
        $pdf->Cell(5,7,':');
        $pdf->Cell(0,7,$d['jenis_kelamin'],0,1);

        $pdf->Cell(10,7,'3.');
        $pdf->Cell(55,7,'Bin/Binti');
        $pdf->Cell(5,7,':');
        $pdf->Cell(0,7,$d['nama_ayah'],0,1);

        $pdf->Cell(10,7,'4.');
        $pdf->Cell(55,7,'Tempat/Tanggal Lahir');
        $pdf->Cell(5,7,':');
        $pdf->Cell(0,7,$d['tempat_lahir']." / ".$lahir,0,1);

        $pdf->Cell(10,7,'5.');
        $pdf->Cell(55,7,'Agama');
        $pdf->Cell(5,7,':');
        $pdf->Cell(0,7,$d['agama'],0,1);

        $pdf->Cell(10,7,'6.');
        $pdf->Cell(55,7,'Warganegara');
        $pdf->Cell(5,7,':');
        $pdf->Cell(0,7,$d['kewarganegaraan'],0,1);

        $pdf->Cell(10,7,'7.');
        $pdf->Cell(55,7,'No. KTP/NIK');
        $pdf->Cell(5,7,':');
        $pdf->Cell(0,7,$d['nik'],0,1);

        $pdf->Cell(10,7,'');
        $pdf->Cell(55,7,'Pekerjaan');
        $pdf->Cell(5,7,':');
        $pdf->Cell(0,7,$d['pekerjaan'],0,1);

        $pdf->Cell(10,7,'');
        $pdf->Cell(55,7,'Alamat');
        $pdf->Cell(5,7,':');
        $pdf->MultiCell(
            0,
            7,
            $d['domisili']
        );

        $pdf->Ln(5);

        // Tanggal surat
        $tglsurat = strtotime($d['tanggal']);
        $tanggal = date('d',$tglsurat)." ".$bulan[date('n',$tglsurat)]." ".date('Y',$tglsurat);

        // Isi surat
        $pdf->MultiCell(
            0,
            7,
            "       Berdasarkan Surat Keterangan dari Ketua Rukun Tetangga Nomor Tanggal ".$tanggal.", bahwa yang bersangkutan benar penduduk Desa Termas Kecamatan Karangrayung Kabupaten Grobogan yang beralamat pada alamat tersebut diatas, surat ini dibuat untuk keperluan ".$d['keperluan']."."
        );

        $pdf->Ln(5);

        $pdf->MultiCell(
            0,
            7,
            "     Demikian Surat Keterangan ini kami buat atas permintaan yang bersangkutan agar yang berkepentingan mengetahui dan maklum."
        );

        $pdf->Ln(22);

     // Tanggal
        $pdf->Cell(110);
        $pdf->Cell(70,7,"Termas, ".$tanggal,0,1,'C');

        $pdf->Cell(110);
        $pdf->Cell(70,7,"KEPALA DESA TERMAS",0,1,'C');

        $y = $pdf->GetY();

        $pdf->Image(
            FCPATH.'assets/logo/ttd.png',
            125,      // X (semakin kecil semakin ke kiri)
            $y - 4,   // Y
            50        // Lebar gambar
        );

        // Jarak ke nama
        $pdf->Ln(26);

        $pdf->Cell(110);

        $pdf->SetFont('Times','BU',12);
        $pdf->Cell(70,7,"H. NITI, SKM.MM",0,1,'C');

        $pdf->Output("I","SKD.pdf");
    }
}