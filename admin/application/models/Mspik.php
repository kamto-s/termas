<?php
class Mspik extends CI_Model{

    function tampil()
    {
        $this->db->join(
            "warga",
            "warga.id_warga=spik.id_warga"
        );
    
        $this->db->order_by("
            CASE
                WHEN status='Menunggu' THEN 1
                WHEN status='Disetujui' THEN 2
                WHEN status='Ditolak' THEN 3
            END
        ", "", false);
    
        $this->db->order_by("id_spik", "DESC");
    
        return $this->db
            ->get("spik")
            ->result_array();
    }
    function detail($id_spik)
    {
        $this->db->where("id_spik",$id_spik);

        $this->db->join(
            "warga",
            "warga.id_warga=spik.id_warga"
        );

        return $this->db
                ->get("spik")
                ->row_array();
    }

    function setujui($id_spik)
    {
        // Ambil data surat
        $spik = $this->db
            ->where("id_spik", $id_spik)
            ->get("spik")
            ->row_array();
    
        // Gunakan tanggal surat jika ada, jika tidak gunakan hari ini
        if (!empty($spik["tanggal"])) {
            $tgl = strtotime($spik["tanggal"]);
        } else {
            $tgl = time();
        }
    
        $bulan = date("n", $tgl);
        $tahun = date("Y", $tgl);
    
        $romawi = [
            1=>"I","II","III","IV","V","VI",
            "VII","VIII","IX","X","XI","XII"
        ];
    
        // Cari nomor terakhir bulan dan tahun yang sama
        $this->db->like(
            "nomor_surat",
            "/TM/".$romawi[$bulan]."/".$tahun
        );
    
        $this->db->order_by("id_spik", "DESC");
    
        $last = $this->db->get("spik")->row_array();
    
        if ($last && !empty($last["nomor_surat"])) {
            $pecah = explode("/", $last["nomor_surat"]);
            $urut = (int)$pecah[1] + 1;
        } else {
            $urut = 1;
        }
    
        $nomor_surat =
            "140/" .
            sprintf("%03d", $urut) .
            "/TM/" .
            $romawi[$bulan] .
            "/" .
            $tahun;
    
        $this->db
            ->where("id_spik", $id_spik)
            ->update(
                "spik",
                [
                    "status" => "Disetujui",
                    "nomor_surat" => $nomor_surat
                ]
            );
    }
    function tolak($id_spik,$alasan)
    {
        $this->db
            ->where("id_spik",$id_spik)
            ->update("spik",[
                "status"=>"Ditolak",
                "alasan_penolakan"=>$alasan
            ]);
    }

}