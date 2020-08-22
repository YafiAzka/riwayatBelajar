<?php 

class Produk{
    public $judul,
           $penulis,
           $penerbit,
           $harga,
           $jmlHalaman,
           $waktuMain,
           $tipe;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "
        penerbit", $harga = 0, $jmlHalaman = 0, $waktuMain = 0, $tipe) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
        $this->tipe = $tipe;
    }

    public function getLable() {
        return "$this->judul, $this->penulis, $this->penerbit";
    }

    public function getInfoLengkap() {
        $str = "{$this->tipe} : {$this->getLable()} (Rp. {$this->harga})";

        if ( $this->tipe == "Komik" ) {
            $str .= " - {$this->jmlHalaman} Halaman. ";
        } else if ( $this->tipe == "Game" ) {
            $str .= " ~ {$this->waktuMain} Jam. ";
        }
        return $str;

    }

}

class CetakInfoProduk {
    public function cetak ( Produk $produk ) {
        $str = "{$produk->getLable()}, (Rp. {$produk->harga})";
        return $str;
    } 
}


$produk1 = new Produk("JOJO Brizarre Andventure", "araki", "Shonen Jump", 14000, 200, 0, "Komik");
$produk2 = new Produk("God Of War", "-", "Sony Game", 300000, 0, 100, "Game" );

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();

