<?php
class Msktm extends CI_Model
{
    function tampil($id_warga = null)
    {
        $this->db->join(
            "warga",
            "warga.id_warga = sktm.id_warga"
        );

        if ($id_warga != null) {
            $this->db->where("sktm.id_warga", $id_warga);
        }

        return $this->db
            ->get("sktm")
            ->result_array();
    }

    function simpan($input)
    {
        $this->db->insert("sktm", $input);
    }
    
    function detail($id_sktm)
    {
    $this->db->join(
        "warga",
        "warga.id_warga = sktm.id_warga"
    );

    $this->db->where("id_sktm", $id_sktm);

    return $this->db
        ->get("sktm")
        ->row_array();
    }
}