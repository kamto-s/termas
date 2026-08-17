<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$inputan = $this->input->post();

		$this->form_validation->set_rules("nik", "NIK", "required");
		$this->form_validation->set_rules("password", "Password", "required");
		$this->form_validation->set_message("required", "%s wajib diisi");

		if ($this->form_validation->run() == TRUE) {

			$this->load->model("Mwarga");
			$output = $this->Mwarga->login($inputan);

			if ($output == "ada") {

				$this->session->set_flashdata('pesan_sukses', 'Berhasil Login');
				redirect('/', 'refresh');
			} else {

				$this->session->set_flashdata('pesan_gagal', 'Gagal Login');
				redirect('/', 'refresh');
			}
		}


		$this->load->model("Mslider");
		$this->load->model("Mpengumuman");
		$this->load->model("Mstaf");

		$data["staf"] = $this->Mstaf->tampil();
		$data['slider'] = $this->Mslider->tampil();
		$data['pengumuman'] = $this->Mpengumuman->tampil_home();


		$data["jumlah_surat_keterangan"] = $this->db->count_all("surat_keterangan");
		$data["jumlah_skd"] = $this->db->count_all("skd");
		$data["jumlah_sktm"] = $this->db->count_all("sktm");
		$data["jumlah_sku"] = $this->db->count_all("sku");
		$data["jumlah_surat_pengantar"] = $this->db->count_all("surat_pengantar");
		$data["jumlah_spik"] = $this->db->count_all("spik");

		$data["total_surat"] =
			$data["jumlah_surat_keterangan"] +
			$data["jumlah_skd"] +
			$data["jumlah_sktm"] +
			$data["jumlah_sku"] +
			$data["jumlah_surat_pengantar"] +
			$data["jumlah_spik"];


		// =========================
		// GRAFIK PENDUDUK
		// =========================

		$data['jumlah_laki'] = $this->db
			->where('jenis_kelamin', 'LAKI-LAKI')
			->count_all_results('warga');

		$data['jumlah_perempuan'] = $this->db
			->where('jenis_kelamin', 'PEREMPUAN')
			->count_all_results('warga');

		$data['total_penduduk'] =
			$data['jumlah_laki'] +
			$data['jumlah_perempuan'];

		// =========================
		// LOAD VIEW
		// =========================

		$this->load->view('header');
		$this->load->view('welcome', $data);
		$this->load->view('footer');
	}
}
