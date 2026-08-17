<?php
class Sktm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("id_warga")) {
            redirect("/", "refresh");
        }

        $this->load->model("Msktm");
        $this->load->library("pdf");
    }

    function index()
    {
        $id_warga = $this->session->userdata("id_warga");

        $data["sktm"] = $this->Msktm->tampil($id_warga);

        $this->load->view("header");
        $this->load->view("sktm_tampil", $data);
        $this->load->view("footer");
    }

    function tambah()
    {
        if ($this->input->post()) {

            $input = $this->input->post();
            $input["id_warga"] = $this->session->userdata("id_warga");
            $input["status"] = "Menunggu";

            $this->Msktm->simpan($input);

            redirect("sktm","refresh");
        }

        $id_warga = $this->session->userdata("id_warga");

        $data["warga"] = $this->db
            ->where("id_warga",$id_warga)
            ->get("warga")
            ->row_array();

        $this->load->view("header");
        $this->load->view("sktm_tambah",$data);
        $this->load->view("footer");
    }
      function print($id_sktm)
    {
        $d = $this->Msktm->detail($id_sktm);

        if (!$d) {
            show_404();
        }
        $pdf = new Pdf();
        $pdf->AddPage();
        
        //==========================
        // KODE DESA
        //==========================
        $pdf->SetFont('Times','',12);
        $pdf->SetXY(10,43);
        $pdf->Cell(60,5,'Kode Desa : 15022015',0,0,'L');
        
        //==========================
        // FORMAT TANGGAL
        //==========================
        
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
        
        // Tanggal lahir
        $tgl_lahir = strtotime($d['tanggal_lahir']);
        $lahir =
        date('d',$tgl_lahir)." ".
        $bulan[date('n',$tgl_lahir)]." ".
        date('Y',$tgl_lahir);
        
        // Tanggal surat
        $tgl_surat = strtotime($d['tanggal']);
        $tanggal_surat =
        date('d',$tgl_surat)." ".
        $bulan[date('n',$tgl_surat)]." ".
        date('Y',$tgl_surat);
        
        //==========================
        // JUDUL SURAT
        //==========================
        
        // pindahkan ke bawah agar tidak sejajar dengan Kode Desa
        $pdf->SetXY(10,52);
        
        $pdf->SetFont('Times','B',14);
        $pdf->Cell(190,7,'SURAT KETERANGAN TIDAK MAMPU',0,1,'C');
        
        $pdf->SetFont('Times','',12);
        $pdf->Cell(190,6,'Nomor : '.$d['nomor_surat'],0,1,'C');
        
        $pdf->Ln(5);
        
        //==========================
        // PEMBUKA
        //==========================
        
        $pdf->SetFont('Times','',12);
        
        $pdf->MultiCell(
            0,
            7,
            "Yang bertanda tangan di bawah ini kami Kepala Desa Termas Kecamatan Karangrayung Kabupaten Grobogan Provinsi Jawa Tengah, menerangkan bahwa :"
        );
        
        $pdf->Ln(4);
        $pdf->MultiCell(
            0,
            7,
            "   Yang bertanda tangan di bawah ini kami Kepala Desa Termas Kecamatan Karangrayung Kabupaten Grobogan Provinsi Jawa Tengah, menerangkan bahwa :"
        );

        $pdf->Ln(4);

        // ================= DATA =================

        $pdf->Cell(10,7,'1.');
        $pdf->Cell(55,7,'Nama Lengkap');
        $pdf->Cell(5,7,':');
        $pdf->Cell(0,7,$d['nama_lengkap'],0,1);

        $pdf->Cell(10,7,'2.');
        $pdf->Cell(55,7,'Jenis Kelamin');
        $pdf->Cell(5,7,':');
        $pdf->Cell(0,7,$d['jenis_kelamin'],0,1);

        $pdf->Cell(10,7,'3.');
        $pdf->Cell(55,7,'Tempat/Tanggal Lahir');
        $pdf->Cell(5,7,':');
        $pdf->Cell(0,7,$d['tempat_lahir']." / ".$lahir,0,1);

        $pdf->Cell(10,7,'4.');
        $pdf->Cell(55,7,'Warganegara/Agama');
        $pdf->Cell(5,7,':');
        $pdf->Cell(0,7,$d['kewarganegaraan']." / ".$d['agama'],0,1);

        $pdf->Cell(10,7,'5.');
        $pdf->Cell(55,7,'No. KTP / NIK');
        $pdf->Cell(5,7,':');
        $pdf->Cell(0,7,$d['nik'],0,1);

        $pdf->Cell(10,7,'6.');
        $pdf->Cell(55,7,'Pekerjaan');
        $pdf->Cell(5,7,':');
        $pdf->Cell(0,7,$d['pekerjaan'],0,1);

        $pdf->Cell(10,7,'7.');
        $pdf->Cell(55,7,'Alamat');
        $pdf->Cell(5,7,':');
        $pdf->MultiCell(
            0,
            7,
            "Dusun ".$d['dusun'].", RT.".sprintf('%03d',$d['rt'])." / RW.".sprintf('%03d',$d['rw'])
        );

        $pdf->Ln(4);

        // ================= ISI SURAT =================

        $pdf->MultiCell(
            0,
            7,
            "   Berdasarkan Surat Keterangan dari Ketua Rukun Tetangga Nomor Tanggal ".$tanggal_surat.", bahwa yang bersangkutan betul warga Desa Termas dan menurut pengakuan yang bersangkutan keadaan ekonominya TIDAK MAMPU."
        );

        $pdf->Ln(4);

        $pdf->MultiCell(
            0,
            7,
            "     Surat keterangan ini diperlukan untuk ".$d['keperluan']."."
        );

        $pdf->Ln(4);

        $pdf->MultiCell(
            0,
            7,
            "   Demikian Surat Keterangan ini kami buat atas permintaan yang bersangkutan dan dapat dipergunakan sebagaimana mestinya."
        );

        $pdf->Ln(10);

      // ================= TANDA TANGAN =================

$pdf->Cell(110);
$pdf->Cell(70,7,"Termas, ".$tanggal_surat,0,1,'C');

$pdf->Cell(110);
$pdf->Cell(70,7,"KEPALA DESA TERMAS",0,1,'C');

// Ambil posisi setelah tulisan Kepala Desa
$ttdY = $pdf->GetY();

// TTD Kepala Desa
$pdf->Image(
    FCPATH.'assets/logo/ttd.png',
    125,      // Posisi X
    $ttdY-4,  // Posisi Y
    50        // Ukuran gambar
);

// Jarak ke nama
$pdf->Ln(30);

$pdf->Cell(110);

$pdf->SetFont('Times','BU',12);
$pdf->Cell(70,7,"H. NITI, SKM.MM",0,1,'C');

$pdf->Output("I","SKTM.pdf");
}
}