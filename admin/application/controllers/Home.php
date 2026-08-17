<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("id_admin")) {
            redirect("/", "refresh");
        }
    }

    public function index()
    {
        // Jumlah surat
        $data['jumlah_skd']  = $this->db->count_all('skd');
        $data['jumlah_sktm'] = $this->db->count_all('sktm');
        $data['jumlah_sku']  = $this->db->count_all('sku');
        $data['jumlah_spik'] = $this->db->count_all('spik');
        $data["jumlah_surat_keterangan"] = $this->db->count_all("surat_keterangan");
        $data["jumlah_surat_pengantar"] = $this->db->count_all("surat_pengantar");

        // Total surat
        $data["total_surat"] =
            $data["jumlah_surat_keterangan"] +
            $data["jumlah_skd"] +
            $data["jumlah_sktm"] +
            $data["jumlah_sku"] +
            $data["jumlah_surat_pengantar"] +
            $data["jumlah_spik"];
        
        // Penduduk
        $data['jumlah_laki'] = $this->db
            ->where('jenis_kelamin','LAKI-LAKI')
            ->count_all_results('warga');

        $data['jumlah_perempuan'] = $this->db
            ->where('jenis_kelamin','PEREMPUAN')
            ->count_all_results('warga');

        // Total penduduk
        $data['total_penduduk'] =
            $data['jumlah_laki'] +
            $data['jumlah_perempuan'];

        $this->load->view('header');
        $this->load->view('home',$data);
        $this->load->view('footer');
    }
}