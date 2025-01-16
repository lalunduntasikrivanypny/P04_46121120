<?php
    class m_terima
    {
        private $dataku;
        private $x = "SELECT master_pesanan.*,
    pelanggan.kode_pelanggan, pelanggan.nama_pelanggan, pelanggan.alamat,
    master_penawaran.nomor_penawaran,master_penawaran.tgl_penawaran,SUM(IFNULL(detail_pesanan.kuantitas,0)) AS total_pesanan,
     IFNULL(detail_pesanan.kuantitas * detail_pesanan.harga_barang,0) AS jumlah
    FROM master_pesanan
    LEFT JOIN master_penawaran
    ON master_pesanan.id_master_penawaran=master_penawaran.id
    LEFT JOIN pelanggan
    ON master_penawaran.id_pelanggan=pelanggan.id
    LEFT JOIN detail_pesanan
    ON master_pesanan.id=detail_pesanan.id_master_pesanan ";

        public function __construct()
        {
            $this->dataku  = new database;
        }

        public function semua_barang()
        {
            $sql = $this->x . ' GROUP BY master_pesanan.id ';
            $this->dataku->isi_sql($sql);
            $saya = $this->dataku->ambil_banyak_baris();
            return $saya;
        }

        public function satu_barang($data)
        {
            $sql = $this->x . ' WHERE master_pesanan.id=:x  GROUP BY master_pesanan.id ';
            $this->dataku->isi_sql($sql);
            $this->dataku->isi_parameter("x", $data);
            $saya = $this->dataku->ambil_satu_baris();
            return $saya;
        }
    }
