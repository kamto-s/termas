<?php
class Mwarga extends CI_Model
{
        function login($inputan)
    {
        $nik = $inputan["nik"];
        $password = $inputan["password"];
        $password = sha1($password); 

        $this->db->where("nik", $nik);
        $this->db->where("password", $password);
        $q = $this->db->get("warga");
        $cekwarga = $q->row_array();

        if (!empty($cekwarga)) {

            $this->session->set_userdata("id_warga", $cekwarga["id_warga"]);
            $this->session->set_userdata("nik", $cekwarga["nik"]);
            $this->session->set_userdata("nama_lengkap", $cekwarga["nama_lengkap"]);
            $this->session->set_userdata("jenis_kelamin", $cekwarga["jenis_kelamin"]);
            $this->session->set_userdata("tempat_lahir", $cekwarga["tempat_lahir"]);
            $this->session->set_userdata("tanggal_lahir", $cekwarga["tanggal_lahir"]);
            $this->session->set_userdata("agama", $cekwarga["agama"]);
            $this->session->set_userdata("pendidikan", $cekwarga["pendidikan"]);
            $this->session->set_userdata("pekerjaan", $cekwarga["pekerjaan"]);
            $this->session->set_userdata("status_perkawinan", $cekwarga["status_perkawinan"]);
            $this->session->set_userdata("kewarganegaraan", $cekwarga["kewarganegaraan"]);
            $this->session->set_userdata("nama_ayah", $cekwarga["nama_ayah"]);
            $this->session->set_userdata("nama_ibu", $cekwarga["nama_ibu"]);
            $this->session->set_userdata("rt", $cekwarga["rt"]);
            $this->session->set_userdata("rw", $cekwarga["rw"]);
            $this->session->set_userdata("dusun", $cekwarga["dusun"]);
            $this->session->set_userdata("kecamatan", $cekwarga["kecamatan"]);
            $this->session->set_userdata("login", true);
                        
            $this->session->set_userdata("login", true);

            return "ada";

        } else {
            return "tidak ada";
        }
    }
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