<?php
class Msurat_keterangan extends CI_Model
{
    function tampil($id_warga = null)
    {
        $this->db->join(
            "warga",
            "warga.id_warga = surat_keterangan.id_warga"
        );

        if ($id_warga != null) {
            $this->db->where("surat_keterangan.id_warga", $id_warga);
        }

        return $this->db
            ->get("surat_keterangan")
            ->result_array();
    }

    function simpan($input)
    {
        $this->db->insert("surat_keterangan", $input);
    }

    function detail($id_surat_keterangan)
    {
        $this->db->join(
            "warga",
            "warga.id_warga = surat_keterangan.id_warga"
        );

        $this->db->where(
            "surat_keterangan.id_surat_keterangan",
            $id_surat_keterangan
        );

        return $this->db
            ->get("surat_keterangan")
            ->row_array();
    }
}