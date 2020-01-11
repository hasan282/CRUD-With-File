<?php

class ProdukModel
{
    private $dbase;

    public function __construct()
    {
        $this->dbase = new Database;
    }

    public function addProduk($data)
    {
        $Query = 'INSERT INTO produk VALUES (:kode, :nama, :kategori, :harga, :foto)';
        $this->dbase->Query($Query);
        $this->dbase->bind('kode', $data['id']);
        $this->dbase->bind('nama', $data['nama']);
        $this->dbase->bind('kategori', $data['kategori']);
        $this->dbase->bind('harga', $data['harga']);
        $this->dbase->bind('foto', $data['foto']);
        $this->dbase->executeQuery();
        return $this->dbase->countRows();
    }

    public function updateProduk($data)
    {
        $Query = 'UPDATE produk SET nama = :nama, kategori = :kategori, harga = :harga, foto = :foto WHERE kode = ' . $data['id'];
        $this->dbase->Query($Query);
        $this->dbase->bind('nama', $data['nama']);
        $this->dbase->bind('kategori', $data['kategori']);
        $this->dbase->bind('harga', $data['harga']);
        $this->dbase->bind('foto', $data['foto']);
        $this->dbase->executeQuery();
        return $this->dbase->countRows();
    }
}
