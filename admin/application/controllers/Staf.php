<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // Proteksi admin
        if (!$this->session->userdata("id_admin")) {
            redirect("/", "refresh");
        }

        // Load model sekali saja
        $this->load->model("Mstaf");
    }

    function index()
    {
        $data["staf"] = $this->Mstaf->tampil();

        $this->load->view("header");
        $this->load->view("staf_tampil", $data);
        $this->load->view("footer");
    }

    function tambah()
    {
        $inputan = $this->input->post();

        $this->form_validation->set_rules("nama_staf", "Nama Staf", "required");
        $this->form_validation->set_rules("jabatan", "Jabatan", "required");
        $this->form_validation->set_message("required", "%s wajib diisi");

        if ($this->form_validation->run() == TRUE) {

            $this->Mstaf->simpan($inputan);

            $this->session->set_flashdata(
                "pesan_sukses",
                "Data Staf berhasil ditambahkan."
            );

            redirect("staf", "refresh");
        }

        $this->load->view("header");
        $this->load->view("staf_tambah");
        $this->load->view("footer");
    }

    function edit($id_staf)
    {
        $data["staf"] = $this->Mstaf->detail($id_staf);

        $this->form_validation->set_rules("nama_staf", "Nama Staf", "required");
        $this->form_validation->set_rules("jabatan", "Jabatan", "required");
        $this->form_validation->set_message("required", "%s wajib diisi");

        if ($this->form_validation->run() == TRUE) {

            $inputan = $this->input->post();

            $this->Mstaf->edit($inputan, $id_staf);

            $this->session->set_flashdata(
                "pesan_sukses",
                "Data Staf berhasil diubah."
            );

            redirect("staf", "refresh");
        }

        $this->load->view("header");
        $this->load->view("staf_edit", $data);
        $this->load->view("footer");
    }

    function hapus($id_staf)
    {
        $this->Mstaf->hapus($id_staf);

        $this->session->set_flashdata(
            "pesan_sukses",
            "Data Staf berhasil dihapus."
        );

        redirect("staf", "refresh");
    }
}