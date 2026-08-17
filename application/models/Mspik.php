<?php
class Mspik extends CI_Model
{
    function tampil($id_warga = null)
    {
        $this->db->join(
            "warga",
            "warga.id_warga = spik.id_warga"
        );

        if ($id_warga != null) {
            $this->db->where("spik.id_warga", $id_warga);
        }

        return $this->db
            ->get("spik")
            ->result_array();
    }

    function simpan($input)
    {
        $this->db->insert("spik", $input);
    }
    function detail($id_spik)
    {
        $this->db->join(
            "warga",
            "warga.id_warga = spik.id_warga"
        );
    
        $this->db->where("spik.id_spik", $id_spik);
    
        return $this->db
            ->get("spik")
            ->row_array();
    }
}