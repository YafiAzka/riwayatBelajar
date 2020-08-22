<?php 

class Produk{
    public $judul,
           $penulis,
           $penerbit,
           $harga,
           $jmlHalaman,
           $waktuMain;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "
        penerbit", $harga = 0, $jmlHalaman = 0, $waktuMain = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
    }

    public function getLable() {
        return "$this->judul, $this->penulis, $this->penerbit";
    }

    public function getInfoProduk() {
        $str = "{$this->getLable()} (Rp. {$this->harga})";

        return $str;

    }

}

class Komik extends Produk {
    public function getInfoProduk() {
        $str = " Komik : {$this->getLable()} (Rp. {$this->harga})";
        return $str;
    }
}  

class Game extends Produk {
    public function getInfoProduk(){
        $str = " Game : {$this->getLable()} (Rp. {$this->harga})";
        return $str;
    }
}



class CetakInfoProduk {
    public function cetak ( Produk $produk ) {
        $str = "{$produk->getLable()}, (Rp. {$produk->harga})";
        return $str;
    } 
}


$produk1 = new Komik("JOJO Brizarre Andventure", "araki", "Shonen Jump", 14000, 200, 0);
$produk2 = new Game("God Of War", "-", "Sony Game", 300000, 0, 100,);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();

