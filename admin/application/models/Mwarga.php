<?php
class Mwarga extends CI_Model
{
    function tampil()
    {
        $q = $this->db->get("warga");
        return $q->result_array();
    }

    function detail($id_warga)
    {
        $this->db->where("id_warga", $id_warga);
        $q = $this->db->get("warga");
        return $q->row_array();
    }

    function simpan($inputan)
    {
        // Enkripsi password
        $inputan["password"] = sha1($inputan["password"]);

        $this->db->insert("warga", $inputan);
    }

    function edit($inputan, $id_warga)
    {
        // Jika password diisi maka diubah
        if (!empty($inputan["password"])) {
            $inputan["password"] = sha1($inputan["password"]);
        } else {
            unset($inputan["password"]);
        }

        $this->db->where("id_warga", $id_warga);
        $this->db->update("warga", $inputan);
    }

    function hapus($id_warga)
    {
        $this->db->where("id_warga", $id_warga);
        $this->db->delete("warga");
    }
}