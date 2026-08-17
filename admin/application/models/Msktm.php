<?php
class Msktm extends CI_Model
{

    function tampil()
    {
        $this->db->join(
            "warga",
            "warga.id_warga=sktm.id_warga"
        );
    
        $this->db->order_by("
            CASE
                WHEN status='Menunggu' THEN 1
                WHEN status='Disetujui' THEN 2
                WHEN status='Ditolak' THEN 3
            END
        ", "", false);
    
        $this->db->order_by("id_sktm", "DESC");
    
        return $this->db
            ->get("sktm")
            ->result_array();
    }



    function detail($id_sktm)
    {

        $this->db->where(
            "id_sktm",
            $id_sktm
        );


        $this->db->join(
            "warga",
            "warga.id_warga=sktm.id_warga"
        );


        return $this->db
            ->get("sktm")
            ->row_array();

    }


    function setujui($id_sktm)
    {
        // Ambil data surat
        $sktm = $this->db
            ->where("id_sktm", $id_sktm)
            ->get("sktm")
            ->row_array();
    
        // Gunakan tanggal surat jika ada, jika tidak gunakan hari ini
        if (!empty($sktm["tanggal"])) {
            $tgl = strtotime($sktm["tanggal"]);
        } else {
            $tgl = time();
        }
    
        $bulan = date("n", $tgl);
        $tahun = date("Y", $tgl);
    
        $romawi = [
            1 => "I",
            "II",
            "III",
            "IV",
            "V",
            "VI",
            "VII",
            "VIII",
            "IX",
            "X",
            "XI",
            "XII"
        ];
    
        // Cari nomor terakhir pada bulan dan tahun yang sama
        $this->db->like(
            "nomor_surat",
            "/TM/" . $romawi[$bulan] . "/" . $tahun
        );
    
        $this->db->order_by("id_sktm", "DESC");
    
        $last = $this->db->get("sktm")->row_array();
    
        if ($last && !empty($last["nomor_surat"])) {
            $pecah = explode("/", $last["nomor_surat"]);
            $urut = (int)$pecah[1] + 1;
        } else {
            $urut = 1;
        }
    
        $nomor_surat =
            "474.4/" .
            sprintf("%03d", $urut) .
            "/TM/" .
            $romawi[$bulan] .
            "/" .
            $tahun;
    
        $this->db
            ->where("id_sktm", $id_sktm)
            ->update(
                "sktm",
                [
                    "status" => "Disetujui",
                    "nomor_surat" => $nomor_surat
                ]
            );
    }



    function tolak($id_sktm,$alasan)
    {

        $this->db
            ->where("id_sktm",$id_sktm)
            ->update(
                "sktm",
                [
                    "status"=>"Ditolak",
                    "alasan_penolakan"=>$alasan
                ]
            );

    }


}