<?php 

class Produk{
    public $judul = "judul",
           $penulis = "penulis",
           $penerbit = "penerbit",
           $harga = 0;

    public function __construct( $judul, $penulis, $penerbit, $harga){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getLable() {
        return "$this->judul, $this->penulis, $this->penerbit, $this->harga ";
    }


}

$produk1 = new Produk("JOJO Brizarre Andventure", "araki", "Shonen Jump", 14000);
$produk2 = new Produk("God Of War", "-", "Sony Game", 300000 );

echo "Komik :" . $produk1->getLable();
echo "<br>";
echo "Game :" . $produk2->getLable();



