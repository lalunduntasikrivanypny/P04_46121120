<?php

class tawar extends controller
{
    public function index()
    {
       $jimm['tawar']=$this->gunakan_model("m_tawar")->semua_barang();
        $this->tampilkan_view("f_tawar/v_daftar_tawar_120",$jimm);
    }

    public function input()
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();
        $jimm['barang'] = $this->gunakan_model("m_barang")->semua_barang();
        $this->tampilkan_view("f_tawar/v_input_tawar_120",$jimm);
    }

    public function tampil($ciaw=" ")
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();
        $jimm['barang'] = $this->gunakan_model("m_barang")->semua_barang();
        $jimm['detail_tawar'] = $this->gunakan_model("m_detail_tawar")->satu_barang($ciaw);
        $jimm['tawarid'] = $this->gunakan_model("m_tawar")->semua_barang($ciaw);
        $this->tampilkan_view("f_tawar/v_tampil_tawar_120",$jimm);
    }

    public function edit($ciaw=" ")
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();
        $jimm['barang'] = $this->gunakan_model("m_barang")->semua_barang();
        $jimm['detail_tawar'] = $this->gunakan_model("m_detail_tawar")->satu_barang($ciaw);
        $jimm['tawarid'] = $this->gunakan_model("m_tawar")->semua_barang($ciaw);
        $this->tampilkan_view("f_tawar/v_edit_tawar_120",$jimm);
    }

    public function hapus($ciaw=" ")
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->semua_barang();
        $jimm['barang'] = $this->gunakan_model("m_barang")->semua_barang();
        $jimm['detail_tawar'] = $this->gunakan_model("m_detail_tawar")->satu_barang($ciaw);
        $jimm['tawarid'] = $this->gunakan_model("m_tawar")->semua_barang($ciaw);
        $this->tampilkan_view("f_tawar/v_hapus_tawar_120",$jimm);
    }

    public function ask_data($ciaw = " ")
    {
        $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->satu_barang($ciaw);
        echo json_encode($jimm);
    
}
