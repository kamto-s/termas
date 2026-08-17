<?php
class slider extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("id_warga")) {
            redirect("/","refresh");
        }
    }
    function index(){
        $this->load->model("Mslider");

        $data["slider"] = $this->Mslider->tampil();

        $this->load->view("header");
        $this->load->view("slider_tampil", $data);
        $this->load->view("footer");
    }

    function tambah(){
        //meendapatkan inputan dari formulir mengguunakan $inputan = $this->input->post();
        $inputan = $this->input->post();

        $this->form_validation->set_rules("caption_slider","Caption Slider","required");
        $this->form_validation->set_message("required","%s wajib diisi");



        //jika ada inputan 
        if ($this->form_validation->run()==TRUE){
        //panggil model Mslider
        $this->load->model("Mslider");
        //jalankan fungsi simpan
        $this->Mslider->simpan($inputan);
        
        //pesan dilayar
        $this->session->set_flashdata("pesan_sukses","Data Slider Tersimpan");

        //redirect ke fiturslider untuk tampil slider
        redirect("slider","refresh");
        }

        $this->load->view("header");
        $this->load->view("slider_tambah");
        $this->load->view("footer");
    }

    function hapus($id_slider){

        $this->load->model("Mslider");
        $this->Mslider->hapus("$id_slider");

        $this->session->set_flashdata("pesan_sukses","Data Slider Telah Terhapus");

        redirect("slider","refresh");
    }
    
    function edit($id_slider){

        //tampilkan data yang lama
        $this->load->model("Mslider");
        $data["slider"] = $this->Mslider->detail($id_slider);

        $inputan = $this->input->post();

        $this->form_validation->set_rules("caption_slider","Caption Slider","required");
        $this->form_validation->set_message("required","%s wajib diisi");

        if ($this->form_validation->run()==TRUE){
            $this->Mslider->edit($inputan,$id_slider);
            $this->session->set_flashdata("pesan_sukses","Data Slider Telah Diubah");
            redirect("slider","refresh");
        }


        $this->load->view("header");
        $this->load->view("slider_edit", $data);
        $this->load->view("footer");
    }
}