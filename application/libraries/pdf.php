<?php defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/pdf/fpdf.php';

class Pdf extends FPDF
{
	function Header()
	{
		$this->Image(FCPATH . 'assets/logo/logo.png', 15, 10, 20);

		$this->SetFont('Times', 'B', 14);
		$this->Cell(190, 6, 'PEMERINTAH KABUPATEN GROBOGAN', 0, 1, 'C');
		$this->Cell(190, 6, 'KECAMATAN KARANGRAYUNG', 0, 1, 'C');

		$this->SetFont('Times', 'B', 18);
		$this->Cell(190, 8, 'DESA TERMAS', 0, 1, 'C');

		$this->SetFont('Times', '', 10);
		$this->Cell(190, 5, 'Alamat : Desa Termas Kec. Karangrayung Kabupaten Grobogan', 0, 1, 'C');

		$this->Ln(2);

		$this->Line(10, 38, 200, 38);
		$this->Line(10, 39, 200, 39);

		$this->Ln(8);
	}
}
