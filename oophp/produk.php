<?php 

class Produk{
    public $judul = "judul",
           $penulis = "penulis",
           $penerbit = "penerbit",
           $harga = 0;

    public function getLable() {
        return "$this->judul, $this->penulis, $this->penerbit ";
    }


}

$produk1 = new Produk();
$produk1->judul = "JOJO Brizarre Andventure";
$produk1->penulis = "araki";
$produk1->penerbit = "Shonen Jump";

$produk2 = new Produk();
$produk2->judul = "Dragon Ball";
$produk2->penulis = "Akira Toriyama";
$produk2->penerbit = "Shonen Jump";

echo "Komik :" . $produk1->getLable();
echo "<br>";
echo "Game :" . $produk2->getLable();



