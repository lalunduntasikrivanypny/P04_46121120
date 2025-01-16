<?php
class m_detail_terima
{
    private $dataku;

    private $x = "SELECT detail_pesanan.*,barang.kode_barang,barang.harga_estimasi,
    IFNULL(detail_pesanan.kuantitas*detail_pesanan.harga_barang,0) AS jumlah
        FROM detail_pesanan
        LEFT JOIN barang 
        ON detail_pesanan.id_barang=barang.id
        LEFT JOIN master_pesanan
        ON detail_pesanan.id_master_pesanan=master_pesanan.id ";

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
        $sql = $this->x . " WHERE detail_pesanan.id_master_pesanan = :x ";
        $this->dataku->isi_sql($sql);
        $this->dataku->isi_parameter("x", $data);

        $saya = $this->dataku->ambil_banyak_baris();
        return $saya;
    }
}
