<?php
class m_barang
{
	private $dataku;
	private $x = "SELECT barang.*, 
	IFNULL(dataku.harga_penawaran,0) AS harga_penawaran,
	IFNULL(saya.kuantitas,0) AS kuantitas
	FROM barang
		LEFT JOIN (
			SELECT detail_penawaran.id_barang, ROUND(AVG(detail_penawaran.harga_barang)) AS harga_penawaran
			FROM detail_penawaran
			GROUP BY detail_penawaran.id_barang)
			dataku ON barang.id=dataku.id_barang
			LEFT JOIN (
				SELECT detail_pesanan.id_barang, SUM(detail_pesanan.kuantitas) AS kuantitas
				FROM barang
				LEFT JOIN detail_pesanan
				ON barang.id=detail_pesanan.id_barang
				GROUP BY detail_pesanan.id_barang)
				saya ON barang.id=saya.id_barang";

	public function __construct()
	{
		$this->dataku  = new database;
	}

	public function all_data()
	{
		$sql = $this->x. '';
		$this->dataku->isi_sql($sql);
		$saya = $this->dataku->ambil_banyak_baris();
		return $saya;
	}

	public function based_id($nilai)
	{
		$sql = "SELECT barang. *, detail_pesanan.harga_barang,detail_pesanan.kuantitas
	FROM barang
	RIGHT JOIN detail_pesanan 
	ON barang.id=detail_pesanan.id WHERE id= :x";
		$this->dataku->isi_sql($sql);
		$this->dataku->isi_parameter("x", $nilai);

		$saya = $this->dataku->ambil_satu_baris();
		return $saya;
	}
}
