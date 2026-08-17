<?php
class Msku extends CI_Model
{


    function tampil()
    {
        $this->db->join(
            "warga",
            "warga.id_warga=sku.id_warga"
        );
    
        $this->db->order_by("
            CASE
                WHEN status='Menunggu' THEN 1
                WHEN status='Disetujui' THEN 2
                WHEN status='Ditolak' THEN 3
            END
        ", "", false);
    
        $this->db->order_by("id_sku", "DESC");
    
        return $this->db
            ->get("sku")
            ->result_array();
    }


    function detail($id_sku)
    {

        $this->db->where(
            "id_sku",
            $id_sku
        );


        $this->db->join(
            "warga",
            "warga.id_warga=sku.id_warga"
        );


        return $this->db
            ->get("sku")
            ->row_array();

    }



    function setujui($id_sku)
    {
        // Ambil data surat
        $sku = $this->db
            ->where("id_sku", $id_sku)
            ->get("sku")
            ->row_array();

        // Gunakan tanggal surat jika ada, jika tidak gunakan hari ini
        if (!empty($sku["tanggal"])) {
            $tgl = strtotime($sku["tanggal"]);
        } else {
            $tgl = time();
        }

        $bulan = date("n", $tgl);
        $tahun = date("Y", $tgl);

        $romawi = [
            1=>"I","II","III","IV","V","VI",
            "VII","VIII","IX","X","XI","XII"
        ];

        $this->db->like(
            "nomor_surat",
            "/TM/".$romawi[$bulan]."/".$tahun
        );

        $this->db->order_by("id_sku", "DESC");

        $last = $this->db->get("sku")->row_array();

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
            ->where("id_sku", $id_sku)
            ->update(
                "sku",
                [
                    "status" => "Disetujui",
                    "nomor_surat" => $nomor_surat
                ]
            );
    }


    function tolak($id_sku,$alasan)
    {

        $this->db
            ->where("id_sku",$id_sku)
            ->update(
                "sku",
                [
                    "status"=>"Ditolak",
                    "alasan_penolakan"=>$alasan
                ]
            );

    }


}