<?php
class Msurat_pengantar extends CI_Model
{

    function tampil()
    {
        $this->db->join(
            "warga",
            "warga.id_warga=surat_pengantar.id_warga"
        );

        $this->db->order_by("
            CASE
                WHEN status='Menunggu' THEN 1
                WHEN status='Disetujui' THEN 2
                WHEN status='Ditolak' THEN 3
            END
        ", "", false);

        $this->db->order_by("id_surat_pengantar", "DESC");

        return $this->db
            ->get("surat_pengantar")
            ->result_array();
    }

    function detail($id_surat_pengantar)
    {

        $this->db->where(
            "id_surat_pengantar",
            $id_surat_pengantar
        );

        $this->db->join(
            "warga",
            "warga.id_warga=surat_pengantar.id_warga"
        );

        return $this->db
            ->get("surat_pengantar")
            ->row_array();

    }

    function setujui($id_surat_pengantar)
    {
        // Ambil data surat
        $surat = $this->db
            ->where("id_surat_pengantar", $id_surat_pengantar)
            ->get("surat_pengantar")
            ->row_array();

        // Gunakan tanggal surat jika ada
        if (!empty($surat["tanggal"])) {
            $tgl = strtotime($surat["tanggal"]);
        } else {
            $tgl = time();
        }

        $bulan = date("n", $tgl);
        $tahun = date("Y", $tgl);

        $romawi = [
            1=>"I","II","III","IV","V","VI",
            "VII","VIII","IX","X","XI","XII"
        ];

        // Cari nomor terakhir bulan ini
        $this->db->like(
            "nomor_surat",
            "/TM/".$romawi[$bulan]."/".$tahun
        );

        $this->db->order_by("id_surat_pengantar", "DESC");

        $last = $this->db->get("surat_pengantar")->row_array();

        if ($last && !empty($last["nomor_surat"])) {
            $pecah = explode("/", $last["nomor_surat"]);
            $urut = (int)$pecah[1] + 1;
        } else {
            $urut = 1;
        }

        $nomor_surat =
            "470/" .
            sprintf("%03d", $urut) .
            "/TM/" .
            $romawi[$bulan] .
            "/" .
            $tahun;

        $this->db
            ->where("id_surat_pengantar", $id_surat_pengantar)
            ->update(
                "surat_pengantar",
                [
                    "status" => "Disetujui",
                    "nomor_surat" => $nomor_surat
                ]
            );
    }

    function tolak($id_surat_pengantar, $alasan)
    {

        $this->db
            ->where("id_surat_pengantar", $id_surat_pengantar)
            ->update(
                "surat_pengantar",
                [
                    "status" => "Ditolak",
                    "alasan_penolakan" => $alasan
                ]
            );

    }

}
