<?php
class Surat_pengantar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // proteksi login admin
        if (!$this->session->userdata("id_admin")) {
            redirect("/", "refresh");
        }

        $this->load->model("Msurat_pengantar");
    }

    function index()
    {
        $data["surat_pengantar"] = $this->Msurat_pengantar->tampil();

        $this->load->view("header");
        $this->load->view("surat_pengantar_tampil", $data);
        $this->load->view("footer");
    }

    function detail($id_surat_pengantar)
    {
        $data["surat_pengantar"] = $this->Msurat_pengantar->detail($id_surat_pengantar);

        $this->load->view("header");
        $this->load->view("surat_pengantar_detail", $data);
        $this->load->view("footer");
    }

    function setujui($id_surat_pengantar)
    {
        $this->Msurat_pengantar->setujui($id_surat_pengantar);

        $this->session->set_flashdata("pesan_sukses", "Surat Pengantar disetujui");

        redirect("surat_pengantar");
    }

    function tolak($id_surat_pengantar)
    {
        $this->form_validation->set_rules(
            "alasan_penolakan",
            "Alasan Penolakan",
            "required",
            ["required" => "%s wajib diisi"]
        );

        if ($this->form_validation->run() == FALSE) {

            $data["surat_pengantar"] = $this->Msurat_pengantar->detail($id_surat_pengantar);

            $this->load->view("header");
            $this->load->view("surat_pengantar_detail", $data);
            $this->load->view("footer");

        } else {

            $alasan = $this->input->post("alasan_penolakan");

            $this->Msurat_pengantar->tolak($id_surat_pengantar, $alasan);

            $this->session->set_flashdata("pesan_sukses", "Surat Pengantar ditolak");

            redirect("surat_pengantar");
        }
    }
}