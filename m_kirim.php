<?php
class m_kirim
{
    private $dataku;
    private $x = "SELECT pengiriman.*,
    master_penawaran.nomor_penawaran,master_pesanan.tgl_pesanan,master_penawaran.tgl_penawaran,pelanggan.nama_pelanggan,SUM(IFNULL(detail_pesanan.harga_barang,0)) AS total_pembayaran
    FROM pengiriman
    LEFT JOIN master_pesanan
    ON pengiriman.id_master_pesanan=master_pesanan.id
    LEFT JOIN master_penawaran
    ON master_pesanan.id_master_penawaran=master_penawaran.id
    LEFT JOIN pelanggan
    ON master_penawaran.id_pelanggan=pelanggan.id
    LEFT JOIN detail_pesanan
    ON pengiriman.id_master_pesanan=detail_pesanan.id_master_pesanan
    GROUP BY pengiriman.id";

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
        $sql = $this->x. ' WHERE detail_penawaran.id_master_penawaran= :x ';
        $this->dataku->isi_sql($sql);
        $this->dataku->isi_parameter("x", $data);

        $saya = $this->dataku->ambil_banyak_baris();
        return $saya;
    }
}
