<?php
class Pengumuman extends CI_Controller
{
 
        // load sekali saja
    
    function index()
    {
        $this->load->model("Mpengumuman");
        $data["pengumuman"] = $this->Mpengumuman->tampil();

        $this->load->view("header");
        $this->load->view("pengumuman_tampil", $data);
        $this->load->view("footer");
    }
}
