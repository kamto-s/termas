<?php
class Surat_keterangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // proteksi login admin
        if (!$this->session->userdata("id_admin")) {
            redirect("/", "refresh");
        }

        $this->load->model("Msurat_keterangan");
    }

    function index()
    {
        $data["surat_keterangan"] = $this->Msurat_keterangan->tampil();

        $this->load->view("header");
        $this->load->view("surat_keterangan_tampil", $data);
        $this->load->view("footer");
    }

    function detail($id_surat_keterangan)
    {
        $data["surat_keterangan"] = $this->Msurat_keterangan->detail($id_surat_keterangan);

        $this->load->view("header");
        $this->load->view("surat_keterangan_detail", $data);
        $this->load->view("footer");
    }

    function setujui($id_surat_keterangan)
    {
        $this->Msurat_keterangan->setujui($id_surat_keterangan);

        $this->session->set_flashdata("pesan_sukses", "Surat Keterangan disetujui");

        redirect("surat_keterangan");
    }

    function tolak($id_surat_keterangan)
    {
        $this->form_validation->set_rules(
            "alasan_penolakan",
            "Alasan Penolakan",
            "required",
            ["required" => "%s wajib diisi"]
        );

        if ($this->form_validation->run() == FALSE) {

            $data["surat_keterangan"] = $this->Msurat_keterangan->detail($id_surat_keterangan);

            $this->load->view("header");
            $this->load->view("surat_keterangan_detail", $data);
            $this->load->view("footer");

        } else {

            $alasan = $this->input->post("alasan_penolakan");

            $this->Msurat_keterangan->tolak($id_surat_keterangan, $alasan);

            $this->session->set_flashdata("pesan_sukses", "Surat Keterangan ditolak");

            redirect("surat_keterangan");
        }
    }
}