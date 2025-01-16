<?php

class pelanggan extends controller
{
    public function index()
    {
      $jimm['pelanggan']=$this->gunakan_model("m_pelanggan")->semua_barang();
        $this->tampilkan_view("f_pelanggan/v_pelanggan_120",$jimm);
    }

  public function tampil($ciaw)
  {
    $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->satu_barang($ciaw);

    echo json_encode($jimm);
    // $this->tampilkan_view("f_pelanggan/v_pelanggan_120", $jimm);
  }

  public function edit($ciaw)
  {
    $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->satu_barang($ciaw);
    
    echo json_encode($jimm);
    // $this->tampilkan_view("f_pelanggan/v_pelanggan_120", $jimm);
  }

  public function hapus($ciaw)
  {
    $jimm['pelanggan'] = $this->gunakan_model("m_pelanggan")->satu_barang($ciaw);

    echo json_encode($jimm);
    // $this->tampilkan_view("f_pelanggan/v_pelanggan_120", $jimm);
  }
}