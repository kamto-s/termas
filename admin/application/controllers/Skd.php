<?php
class Skd extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("id_admin")) {
            redirect("/", "refresh");
        }

        $this->load->model("Mskd");
       
    }

    function index()
    {
        $data["skd"] = $this->Mskd->tampil();

        $this->load->view("header");
        $this->load->view("skd_tampil", $data);
        $this->load->view("footer");
    }

    function detail($id_skd)
    {
        $data["skd"] = $this->Mskd->detail($id_skd);

        $this->load->view("header");
        $this->load->view("skd_detail", $data);
        $this->load->view("footer");
    }

    function setujui($id_skd)
    {
        $this->Mskd->setujui($id_skd);

        $this->session->set_flashdata("pesan_sukses", "SKD disetujui");

        redirect("skd");
    }

    function tolak($id_skd)
    {
        $this->form_validation->set_rules(
            "alasan_penolakan",
            "Alasan Penolakan",
            "required",
            ["required" => "%s wajib diisi"]
        );

        if ($this->form_validation->run() == FALSE) {

            $data["skd"] = $this->Mskd->detail($id_skd);

            $this->load->view("header");
            $this->load->view("skd_detail", $data);
            $this->load->view("footer");

        } else {

            $alasan = $this->input->post("alasan_penolakan");

            $this->Mskd->tolak($id_skd, $alasan);

            $this->session->set_flashdata("pesan_sukses", "SKD ditolak");

            redirect("skd");
        }
    }
}