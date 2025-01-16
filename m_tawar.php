<?php
class m_tawar
{
    private $dataku;
    private $x = "SELECT master_penawaran.*,
    pelanggan.*,
    ROUND(AVG(detail_penawaran.harga_barang),0) AS rata_rata_harga,
    COUNT(detail_penawaran.id_barang) AS jml_jenis_barang
    FROM master_penawaran
   LEFT JOIN pelanggan
    ON master_penawaran.id_pelanggan=pelanggan.id
   LEFT JOIN detail_penawaran
    ON master_penawaran.id=detail_penawaran.id_master_penawaran
    GROUP BY master_penawaran.id";

    public function __construct()
    {
        $this->dataku  = new database;
    }

    public function semua_barang()
    {
        $sql = $this->x . '';
        $this->dataku->isi_sql($sql);
        $saya = $this->dataku->ambil_banyak_baris();
        return $saya;
    }

    public function satu_barang($data)
    {
        $sql = "SELECT detail_penawaran.*,barang.kode_barang
        FROM detail_penawaran
        LEFT JOIN barang
        ON detail_penawaran=detail_penawaran.id_barang
        WHERE detail_penawaran.id_master_penawaran= :x";
        $this->dataku->isi_sql($sql);
        $this->dataku->isi_parameter("x", $data);

        $saya = $this->dataku->ambil_satu_baris();
        return $saya;
    }
}
