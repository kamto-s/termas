<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // Proteksi admin
        if (!$this->session->userdata("id_admin")) {
            redirect("/", "refresh");
        }

        // Load model sekali saja
        $this->load->model("Mslider");
    }

    function index()
    {
        $data["slider"] = $this->Mslider->tampil();

        $this->load->view("header");
        $this->load->view("slider_tampil", $data);
        $this->load->view("footer");
    }

    function tambah()
    {
        $this->form_validation->set_rules("caption_slider", "Caption Slider", "required");
        $this->form_validation->set_message("required", "%s wajib diisi");

        if ($this->form_validation->run() == TRUE) {

            $inputan = $this->input->post();

            $this->Mslider->simpan($inputan);

            $this->session->set_flashdata(
                "pesan_sukses",
                "Data Slider berhasil disimpan."
            );

            redirect("slider", "refresh");
        }

        $this->load->view("header");
        $this->load->view("slider_tambah");
        $this->load->view("footer");
    }

    function edit($id_slider)
    {
        $data["slider"] = $this->Mslider->detail($id_slider);

        $this->form_validation->set_rules("caption_slider", "Caption Slider", "required");
        $this->form_validation->set_message("required", "%s wajib diisi");

        if ($this->form_validation->run() == TRUE) {

            $inputan = $this->input->post();

            $this->Mslider->edit($inputan, $id_slider);

            $this->session->set_flashdata(
                "pesan_sukses",
                "Data Slider berhasil diubah."
            );

            redirect("slider", "refresh");
        }

        $this->load->view("header");
        $this->load->view("slider_edit", $data);
        $this->load->view("footer");
    }

    function hapus($id_slider)
    {
        $this->Mslider->hapus($id_slider);

        $this->session->set_flashdata(
            "pesan_sukses",
            "Data Slider berhasil dihapus."
        );

        redirect("slider", "refresh");
    }
}