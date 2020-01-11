<?php

class Home extends Controller
{
    public function index()
    {
        $data['title'] = 'Home';
        $QueryProduk = 'SELECT kode, nama, kategori.kategori, foto, harga FROM produk INNER JOIN kategori ON produk.kategori = kategori.id ORDER BY nama ASC';
        $data['produk'] = $this->model('BasicModel')->getThisQuery($QueryProduk);
        $this->view('template/header', $data);
        $this->view('home/index', $data);
        $this->view('template/footer');
    }
}
