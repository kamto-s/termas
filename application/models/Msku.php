<?php
class Msku extends CI_Model
{
    function tampil($id_warga = null)
    {
        $this->db->join(
            "warga",
            "warga.id_warga = sku.id_warga"
        );

        if ($id_warga != null) {
            $this->db->where("sku.id_warga", $id_warga);
        }

        return $this->db
            ->get("sku")
            ->result_array();
    }

    function simpan($input)
    {
        $this->db->insert("sku", $input);
    }
    function detail($id_sku)
    {
        $this->db->join(
            "warga",
            "warga.id_warga = sku.id_warga"
        );
    
        $this->db->where("sku.id_sku", $id_sku);
    
        return $this->db
            ->get("sku")
            ->row_array();
    }
}