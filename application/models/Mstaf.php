<?php
class Mstaf extends Ci_Model {
    function tampil(){
        //melakukan query
        $q= $this->db->get("staf");
        //pecah ke array
        $d= $q->result_array();
        return $d;
    }
    function simpan($inputan){
        $config["upload_path"] = $this->config->item("assets_staf");
        $config["allowed_types"] = "gif|jpeg|jpg|png";

        $this->load->library("upload", $config);

        //upload foto staf
        $ngupload = $this->upload->do_upload("foto_staf");

        if($ngupload){
            $inputan["foto_staf"] = $this->upload->data("file_name");
        }
        $this->db->insert("staf", $inputan);
    }
    function hapus($id_staf){

        $this->db->where("id_staf",$id_staf);
        $this->db->delete("staf");
    }
    function detail($id_staf){

        $this->db->where("id_staf",$id_staf);
        $q = $this->db->get("staf");
        $d = $q->row_array();

        return $d;
    }
    function edit($inputan,$id_staf){
        $config["upload_path"] = $this->config->item("assets_staf");
        $config["allowed_types"] = "gif|jpeg|jpg|png";
        $this->load->library("upload", $config);

        $ngupload = $this->upload->do_upload("foto_staf");

        if($ngupload){
            $inputan["foto_staf"] = $this->upload->data("file_name");
        }
        $this->db->where("id_staf",$id_staf);
        $this->db->update("staf", $inputan);
    }
}