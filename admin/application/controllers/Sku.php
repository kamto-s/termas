<?php
class Sku extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // proteksi login admin
        if (!$this->session->userdata("id_admin")) {
            redirect("/", "refresh");
        }

        $this->load->model("Msku");
       
    }

    function index()
    {
        $data["sku"] = $this->Msku->tampil();

        $this->load->view("header");
        $this->load->view("sku_tampil", $data);
        $this->load->view("footer");
    }

    function detail($id_sku)
    {
        $data["sku"] = $this->Msku->detail($id_sku);

        $this->load->view("header");
        $this->load->view("sku_detail", $data);
        $this->load->view("footer");
    }

    function setujui($id_sku)
    {
        $this->Msku->setujui($id_sku);

        $this->session->set_flashdata("pesan_sukses", "SKU disetujui");

        redirect("sku");
    }

    function tolak($id_sku)
    {
        // ===== FORM VALIDATION =====
        $this->form_validation->set_rules(
            "alasan_penolakan",
            "Alasan Penolakan",
            "required",
            ["required" => "%s wajib diisi"]
        );

        if ($this->form_validation->run() == FALSE) {

            $data["sku"] = $this->Msku->detail($id_sku);

            $this->load->view("header");
            $this->load->view("sku_detail", $data);
            $this->load->view("footer");

        } else {

            $alasan = $this->input->post("alasan_penolakan");

            $this->Msku->tolak($id_sku, $alasan);

            $this->session->set_flashdata("pesan_sukses", "SKU ditolak");

            redirect("sku");
        }
    }
}