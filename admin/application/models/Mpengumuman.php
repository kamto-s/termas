<?php
class Mpengumuman extends Ci_Model {
    function tampil(){
        //melakukan query
        $q= $this->db->get("pengumuman");
        //pecah ke array
        $d= $q->result_array();
        return $d;
    }
    function simpan($inputan){
        $config["upload_path"] = $this->config->item("assets_pengumuman");
        $config["allowed_types"] = "gif|jpeg|jpg|png";

        $this->load->library("upload", $config);

        //upload foto pengumuman
        $ngupload = $this->upload->do_upload("foto_pengumuman");

        if($ngupload){
            $inputan["foto_pengumuman"] = $this->upload->data("file_name");
        }
        $this->db->insert("pengumuman", $inputan);
    }
    function hapus($id_pengumuman){

        $this->db->where("id_pengumuman",$id_pengumuman);
        $this->db->delete("pengumuman");
    }
    function detail($id_pengumuman){

        $this->db->where("id_pengumuman",$id_pengumuman);
        $q = $this->db->get("pengumuman");
        $d = $q->row_array();

        return $d;
    }
    function edit($inputan,$id_pengumuman){
        $config["upload_path"] = $this->config->item("assets_pengumuman");
        $config["allowed_types"] = "gif|jpeg|jpg|png";
        $this->load->library("upload", $config);

        $ngupload = $this->upload->do_upload("foto_pengumuman");

        if($ngupload){
            $inputan["foto_pengumuman"] = $this->upload->data("file_name");
        }
        $this->db->where("id_pengumuman",$id_pengumuman);
        $this->db->update("pengumuman", $inputan);
    }
}