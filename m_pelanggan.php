<?php
class m_pelanggan
{
    private $dataku;
    private $x= "SELECT pelanggan.*,yah.frekuensi_penawaran
    FROM pelanggan
    INNER JOIN (
        SELECT  id_pelanggan, COUNT(id_pelanggan) AS frekuensi_penawaran
        FROM master_penawaran
        GROUP BY id_pelanggan) yah 
    ON pelanggan.id=yah.id_pelanggan";

    public function __construct()
    {
        $this->dataku  = new database;
    }

    public function semua_barang()
    {
        $sql =$this->x. '';
        $this->dataku->isi_sql($sql);
        $saya = $this->dataku->ambil_banyak_baris();
        return $saya;
    }

    public function ambil_data($data)
    {
        $sql = "SELECT pelanggan.kode_pelanggan, pelanggan.nama_pelanggan, pelanggan.alamat, pelanggan.no_telp_pelanggan
	FROM pelanggan WHERE id= :x" ;
        $this->dataku->isi_sql($sql);
        $this->dataku->isi_parameter("x", $data);

        $saya = $this->dataku->ambil_banyak_baris();
        return $saya;
    }
}
