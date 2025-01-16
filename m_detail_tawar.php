<?php
class m_detail_tawar
{
    private $dataku;

    private $x = "SELECT detail_penawaran.*,barang.kode_barang
        FROM detail_penawaran
        LEFT JOIN barang
        ON detail_penawaran.id_barang=barang.id";

    public function __construct()
    {
        $this->dataku  = new database;
    }

    public function semua_barang()
    {
        $sql = $this->x . " ";
        $this->dataku->isi_sql($sql);
        $saya = $this->dataku->ambil_banyak_baris();
        return $saya;
    }

    public function satu_barang($data)
    {
        $sql = $this->x . " WHERE detail_penawaran.id_master_penawaran= :x ";

        $this->dataku->isi_sql($sql);
        $this->dataku->isi_parameter("x", $data);

        $saya = $this->dataku->ambil_banyak_baris();
        return $saya;
    }
}
