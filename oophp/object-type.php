<?php 

class Produk{
    public $judul,
           $penulis,
           $penerbit,
           $harga;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getLable() {
        return "$this->judul, $this->penulis, $this->penerbit";
    }

}

class CetakInfoProduk {
    public function cetak ( Produk $produk ) {
        $str = "{$produk->getLable()}, (Rp. {$produk->harga})";
        return $str;
    } 
}


$produk1 = new Produk("JOJO Brizarre Andventure", "araki", "Shonen Jump", 14000);
$produk2 = new Produk("God Of War", "-", "Sony Game", 300000 );

echo "Komik :" . $produk1->getLable();
echo "<br>";
echo "Game :" . $produk2->getLable();
echo "<br>";
$infoProduk1 = new CetakInfoProduk ();
echo $infoProduk1->cetak($produk2);



