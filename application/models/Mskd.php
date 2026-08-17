<?php
class Mskd extends CI_Model
{
    function tampil($id_warga = null)
    {
        $this->db->join(
            "warga",
            "warga.id_warga = skd.id_warga"
        );

        if ($id_warga != null) {
            $this->db->where("skd.id_warga", $id_warga);
        }

        return $this->db
            ->get("skd")
            ->result_array();
    }

    function simpan($input)
    {
        $this->db->insert("skd", $input);
    }
    function detail($id_skd)
    {
    $this->db->join(
        "warga",
        "warga.id_warga = skd.id_warga"
    );

    $this->db->where("id_skd", $id_skd);

    return $this->db
        ->get("skd")
        ->row_array();
    }

}