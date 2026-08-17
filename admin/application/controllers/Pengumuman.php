<?php
class Pengumuman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // proteksi admin
        if (!$this->session->userdata("id_admin")) {
            redirect("/", "refresh");
        }

        // load sekali saja
        $this->load->model("Mpengumuman");
    }

    function index()
    {
        $data["pengumuman"] = $this->Mpengumuman->tampil();

        $this->load->view("header");
        $this->load->view("pengumuman_tampil", $data);
        $this->load->view("footer");
    }

    function tambah()
    {
        $this->form_validation->set_rules("judul_pengumuman", "Judul Pengumuman", "required");
        $this->form_validation->set_rules("tanggal_pengumuman", "Tanggal Pengumuman", "required");
        $this->form_validation->set_rules("keterangan_pengumuman", "Keterangan Pengumuman", "required");
        $this->form_validation->set_rules("waktu_pengumuman", "Waktu Pengumuman", "required");
        $this->form_validation->set_message("required", "%s wajib diisi");

        if ($this->form_validation->run() == TRUE) {

            $inputan = $this->input->post();

            $this->Mpengumuman->simpan($inputan);

            $this->session->set_flashdata("pesan_sukses", "Data Pengumuman Tersimpan");

            redirect("pengumuman", "refresh");
        }

        $this->load->view("header");
        $this->load->view("pengumuman_tambah");
        $this->load->view("footer");
    }

    function hapus($id_pengumuman)
    {
        $this->Mpengumuman->hapus($id_pengumuman);

        $this->session->set_flashdata("pesan_sukses", "Data Pengumuman Telah Terhapus");

        redirect("pengumuman", "refresh");
    }

    function edit($id_pengumuman)
    {
        $data["pengumuman"] = $this->Mpengumuman->detail($id_pengumuman);

        $this->form_validation->set_rules("judul_pengumuman", "Judul Pengumuman", "required");
        $this->form_validation->set_message("required", "%s wajib diisi");

        if ($this->form_validation->run() == TRUE) {

            $inputan = $this->input->post();

            $this->Mpengumuman->edit($inputan, $id_pengumuman);

            $this->session->set_flashdata("pesan_sukses", "Data Pengumuman Telah Diubah");

            redirect("pengumuman", "refresh");
        }

        $this->load->view("header");
        $this->load->view("pengumuman_edit", $data);
        $this->load->view("footer");
    }
}