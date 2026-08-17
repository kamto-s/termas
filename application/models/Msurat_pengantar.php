<?php
class Msurat_pengantar extends CI_Model
{
    function tampil($id_warga = null)
    {
        $this->db->join(
            "warga",
            "warga.id_warga = surat_pengantar.id_warga"
        );

        if ($id_warga != null) {
            $this->db->where("surat_pengantar.id_warga", $id_warga);
        }

        return $this->db
            ->get("surat_pengantar")
            ->result_array();
    }

    function simpan($input)
    {
        $this->db->insert("surat_pengantar", $input);
    }

    function detail($id_surat_pengantar)
    {
        $this->db->join(
            "warga",
            "warga.id_warga = surat_pengantar.id_warga"
        );

        $this->db->where(
            "surat_pengantar.id_surat_pengantar",
            $id_surat_pengantar
        );

        return $this->db
            ->get("surat_pengantar")
            ->row_array();
    }
}