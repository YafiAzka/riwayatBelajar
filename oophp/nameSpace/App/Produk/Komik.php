<?php  

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