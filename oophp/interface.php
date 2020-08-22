<?php

interface InfoProduk{
    public function getInfoProduk();
}

abstract class Produk{
    protected $judul,
           $penulis,
           $penerbit,
           $harga,
           $discon = 0;
     


    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "
        penerbit", $harga = 0 ) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getjudul () {
        return $this->judul;
    }

    public function setJudul( $judul ) {
        $this->judul = $judul;
    }

    public function getPenulis(){
        return $this->penulis;
    }

    public function setPenulis($penulis){
        $this->penulis = $penulis;
    }

    public function getPenerbit(){
        return $this->penerbit;
    }

    public function setPenerbit($penerbit){
        $this->penerbit = $penerbit;
    }

    public function setDiscon( $discon ) {
        $this->discon = $discon;
     }

    public function setHarga( $harga ) {
        $this->harga = $harga;
    }

    public function getHarga() {
        return $this->harga - ( $this->harga * $this->discon / 100 );
    }

    public function getLable() {
        return "$this->judul, $this->penulis, $this->penerbit";
    } 
    
    abstract public function getInfo();

}

class Komik extends Produk implements InfoProduk {
    public $jmlhalaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "
        penerbit", $harga = 0, $jmlhalaman = 0 ){

        parent::__construct( $judul, $penulis, $penerbit, $harga);

        $this->jmlhalaman = $jmlhalaman;
    }

    public function getInfo(){
        $str = "{$this->getLable()} (Rp. {$this->harga})";

        return $str;

    }

    public function getInfoProduk() {
        $str = " Komik :". $this->getInfo() ." - {$this->jmlhalaman} Halaman. " ;
        return $str;
    }
}  

class Game extends Produk implements InfoProduk {
    public $waktuMain;
    
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", 
        $harga = 0, $waktuMain = 0){
        parent::__construct($judul, $penulis, $penerbit, $harga);
        
        $this->waktuMain = $waktuMain;

    }

    public function getInfo(){
        $str = "{$this->getLable()} (Rp. {$this->harga})";

        return $str;

    }

    public function getInfoProduk(){
        $str = " Game : ". $this->getInfo() ." ~ {$this->waktuMain} Jam.";
        return $str;
    }
}

class CetakInfoProduk {
    public $daftarProduk = array();

    public function tambahProduk( Produk $produk ){
        $this->daftarProduk[] = $produk;
    }

    public function cetak ( ) {
        $str = "DAFTAR PRODUK: <br>";

        foreach ( $this->daftarProduk as $p ) {
            $str .= "- {$p->getInfoProduk()} <br>";
        }

        return $str;
    } 
}

$produk1 = new Komik("JOJOBrizarreAndventure", "araki", "Shonen Jump", 100000, 200 );
$produk2 = new Game("God Of War", "-", "Sony Game", 200000, 100 );

$cetakProduk = new CetakInfoProduk;
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);

echo $cetakProduk->cetak();

    







