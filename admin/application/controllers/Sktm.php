<?php
class Sktm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("id_admin")) {
            redirect("/", "refresh");
        }

        $this->load->model("Msktm");
       
    }

    function index()
    {
        $data["sktm"] = $this->Msktm->tampil();

        $this->load->view("header");
        $this->load->view("sktm_tampil", $data);
        $this->load->view("footer");
    }

    function detail($id_sktm)
    {
        $data["sktm"] = $this->Msktm->detail($id_sktm);

        $this->load->view("header");
        $this->load->view("sktm_detail", $data);
        $this->load->view("footer");
    }

    function setujui($id_sktm)
    {
        $this->Msktm->setujui($id_sktm);

        $this->session->set_flashdata("pesan_sukses", "SKTM disetujui");

        redirect("sktm");
    }

    function tolak($id_sktm)
    {
        $this->form_validation->set_rules(
            "alasan_penolakan",
            "Alasan Penolakan",
            "required",
            ["required" => "%s wajib diisi"]
        );

        if ($this->form_validation->run() == FALSE) {

            $data["sktm"] = $this->Msktm->detail($id_sktm);

            $this->load->view("header");
            $this->load->view("sktm_detail", $data);
            $this->load->view("footer");

        } else {

            $alasan = $this->input->post("alasan_penolakan");

            $this->Msktm->tolak($id_sktm, $alasan);

            $this->session->set_flashdata("pesan_sukses", "SKTM ditolak");

            redirect("sktm");
        }
    }
}