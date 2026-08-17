<?php
class Mpengumuman extends CI_Model {

    // Menampilkan semua pengumuman
    public function tampil()
    {
        return $this->db->get("pengumuman")->result_array();
    }

    // Menampilkan pengumuman untuk Home (7 hari terakhir)
    public function tampil_home()
    {
        $this->db->where('tanggal_pengumuman >=', date('Y-m-d', strtotime('-1 day')));
        $this->db->order_by('tanggal_pengumuman','ASC');
        $this->db->limit(4);

        return $this->db->get('pengumuman')->result_array();
    }
}