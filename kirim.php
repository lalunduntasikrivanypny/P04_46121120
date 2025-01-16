<?php

class kirim extends controller
{
    public function index()
    {
        $jimm['kirim'] = $this->gunakan_model("m_kirim")->semua_barang();
        $this->tampilkan_view("f_kirim/v_daftar_kirim_120", $jimm);
    }

    public function tampil($ciaw)
    {
        $jimm['kirim'] = $this->gunakan_model("m_kirim")->satu_barang($ciaw);
        $jimm['kirimid'] = $this->gunakan_model("m_detail_terima")->satu_barang($ciaw);
        // cetak_var($jimm);
         $this->tampilkan_view("f_kirim/v_tampil_kirim_120", $jimm);
    }

    public function edit($ciaw = " ")
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();
        $jimm['kirim'] = $this->gunakan_model("m_kirim")->satu_barang($ciaw);
        $jimm['kirimid'] = $this->gunakan_model("m_detail_terima")->satu_barang($ciaw);
        // cetak_var($jimm);
        $this->tampilkan_view("f_kirim/v_edit_kirim_120", $jimm);
    }

    public function hapus($ciaw = " ")
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();
        $jimm['kirim'] = $this->gunakan_model("m_kirim")->satu_barang($ciaw);
        $jimm['kirimid'] = $this->gunakan_model("m_detail_terima")->satu_barang($ciaw);
        // cetak_var($jimm);
        $this->tampilkan_view("f_kirim/v_hapus_kirim_120", $jimm);
    }

    public function ask_data($ciaw = " ")
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->based_data($ciaw);
        echo json_encode($jimm);
    }
}
