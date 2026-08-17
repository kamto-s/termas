<?php
class Spik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // proteksi login admin
        if (!$this->session->userdata("id_admin")) {
            redirect("/", "refresh");
        }

        $this->load->model("Mspik");
    }

    function index()
    {
        $data["spik"] = $this->Mspik->tampil();

        $this->load->view("header");
        $this->load->view("spik_tampil", $data);
        $this->load->view("footer");
    }

    function detail($id_spik)
    {
        $data["spik"] = $this->Mspik->detail($id_spik);

        $this->load->view("header");
        $this->load->view("spik_detail", $data);
        $this->load->view("footer");
    }

    function setujui($id_spik)
    {
        $this->Mspik->setujui($id_spik);

        $this->session->set_flashdata("pesan_sukses", "SPIK disetujui");

        redirect("spik");
    }

    function tolak($id_spik)
    {
        // ===== FORM VALIDATION =====
        $this->form_validation->set_rules(
            "alasan_penolakan",
            "Alasan Penolakan",
            "required",
            ["required" => "%s wajib diisi"]
        );

        if ($this->form_validation->run() == FALSE) {

            $data["spik"] = $this->Mspik->detail($id_spik);

            $this->load->view("header");
            $this->load->view("spik_detail", $data);
            $this->load->view("footer");

        } else {

            $alasan = $this->input->post("alasan_penolakan");

            $this->Mspik->tolak($id_spik, $alasan);

            $this->session->set_flashdata("pesan_sukses", "SPIK ditolak");

            redirect("spik");
        }
    }
}