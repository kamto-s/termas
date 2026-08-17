<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class akun extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("id_warga")) {
            redirect("/","refresh");
        }
    }
    public function index()
    {
        if ($this->input->post()) {

            $inputan = $this->input->post();

            $this->load->model("Mwarga");
            $id_warga = $this->session->userdata("id_warga");
            $this->Mwarga->edit($inputan, $id_warga);

            $this->session->set_flashdata("pesan_sukses","Password berhasil diubah");
            redirect("/","refresh");
        }

        $this->load->view("header");
        $this->load->view("akun");
        $this->load->view("footer");
}
}
