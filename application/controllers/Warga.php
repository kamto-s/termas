<?php
class Warga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("id_warga")) {
            redirect("/", "refresh");
        }

        $this->load->model("Mwarga");
    }

    function edit($id_warga)
    {
        $data["warga"] = $this->Mwarga->detail($id_warga);

        $inputan = $this->input->post();

        $this->form_validation->set_rules("nik", "NIK", "required|exact_length[16]|numeric");
        $this->form_validation->set_rules("nama_lengkap", "Nama Lengkap", "required");
        $this->form_validation->set_rules("jenis_kelamin", "Jenis Kelamin", "required");
        $this->form_validation->set_rules("tempat_lahir", "Tempat Lahir", "required");
        $this->form_validation->set_rules("tanggal_lahir", "Tanggal Lahir", "required");
        $this->form_validation->set_rules("agama", "Agama", "required");
        $this->form_validation->set_rules("pendidikan", "Pendidikan", "required");
        $this->form_validation->set_rules("pekerjaan", "Pekerjaan", "required");
        $this->form_validation->set_rules("status_perkawinan", "Status Perkawinan", "required");
        $this->form_validation->set_rules("kewarganegaraan", "Kewarganegaraan", "required");
        $this->form_validation->set_rules("nama_ayah", "Nama Ayah", "required");
        $this->form_validation->set_rules("nama_ibu", "Nama Ibu", "required");
        $this->form_validation->set_rules("rt", "RT", "required|numeric");
        $this->form_validation->set_rules("rw", "RW", "required|numeric");
        $this->form_validation->set_rules("dusun", "Dusun", "required");
        $this->form_validation->set_rules("kecamatan", "Kecamatan", "required");
        $this->form_validation->set_rules("no_hp", "No. HP", "required");

        $this->form_validation->set_message("required", "%s wajib diisi");
        $this->form_validation->set_message("numeric", "%s harus berupa angka");
        $this->form_validation->set_message("exact_length", "%s harus terdiri dari 16 digit");

        if ($this->form_validation->run() == TRUE) {

            $this->Mwarga->edit($inputan, $id_warga);

            $this->session->set_flashdata("pesan_sukses", "Data warga berhasil diubah");

            redirect("warga", "refresh");
        }

        $this->load->view("header");
        $this->load->view("warga_edit", $data);
        $this->load->view("footer");
    }

}
