<?php
class Mskd extends CI_Model
{
    
    
    function tampil()
    {
        $this->db->join(
            "warga",
            "warga.id_warga=skd.id_warga"
        );
    
        $this->db->order_by("
            CASE
                WHEN status='Menunggu' THEN 1
                WHEN status='Disetujui' THEN 2
                WHEN status='Ditolak' THEN 3
            END
        ", "", false);
    
        $this->db->order_by("id_skd", "DESC");
    
        return $this->db
            ->get("skd")
            ->result_array();
    }


    function detail($id_skd)
    {

        $this->db->where(
            "id_skd",
            $id_skd
        );


        $this->db->join(
            "warga",
            "warga.id_warga=skd.id_warga"
        );


        return $this->db
            ->get("skd")
            ->row_array();

    }



    function setujui($id_skd)
    {
        // Ambil data surat
        $skd = $this->db
            ->where("id_skd", $id_skd)
            ->get("skd")
            ->row_array();
    
        // Gunakan tanggal surat jika ada, jika tidak gunakan hari ini
        if (!empty($skd["tanggal"])) {
            $tgl = strtotime($skd["tanggal"]);
        } else {
            $tgl = time();
        }
    
        $bulan = date("n", $tgl);
        $tahun = date("Y", $tgl);
    
        $romawi = [
            1=>"I","II","III","IV","V","VI",
            "VII","VIII","IX","X","XI","XII"
        ];
    
        // Cari nomor terakhir pada bulan dan tahun yang sama
        $this->db->like(
            "nomor_surat",
            "/TM/".$romawi[$bulan]."/".$tahun
        );
    
        $this->db->order_by("id_skd", "DESC");
    
        $last = $this->db->get("skd")->row_array();
    
        if ($last && !empty($last["nomor_surat"])) {
            $pecah = explode("/", $last["nomor_surat"]);
            $urut = (int)$pecah[1] + 1;
        } else {
            $urut = 1;
        }
    
        $nomor_surat = "474.4/" .
            sprintf("%03d", $urut) .
            "/TM/" .
            $romawi[$bulan] .
            "/" .
            $tahun;
    
        $this->db
            ->where("id_skd", $id_skd)
            ->update(
                "skd",
                [
                    "status" => "Disetujui",
                    "nomor_surat" => $nomor_surat
                ]
            );
    }



    function tolak($id_skd,$alasan)
    {

        $this->db
            ->where("id_skd",$id_skd)
            ->update(
                "skd",
                [
                    "status"=>"Ditolak",
                    "alasan_penolakan"=>$alasan
                ]
            );

    }


}