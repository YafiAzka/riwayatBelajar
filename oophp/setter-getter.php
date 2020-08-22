<?php 

class Produk{
    private $judul,
           $penulis,
           $penerbit,
           $harga;
    protected $discon = 0;


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

    public function getHarga() {
        return $this->harga - ( $this->harga * $this->discon / 100 );
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
    public $jmlhalaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "
        penerbit", $harga = 0, $jmlhalaman = 0 ){

        parent::__construct( $judul, $penulis, $penerbit, $harga);

        $this->jmlhalaman = $jmlhalaman;
    }

    public function getInfoProduk() {
        $str = " Komik :". parent::getInfoProduk() ." - {$this->jmlhalaman} Halaman. " ;
        return $str;
    }
}  

class Game extends Produk {
    public $waktuMain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", 
        $harga = 0, $waktuMain = 0){
        parent::__construct($judul, $penulis, $penerbit, $harga);
        
        $this->waktuMain = $waktuMain;

    }

    public function getInfoProduk(){
        $str = " Game : ". parent::getInfoProduk() ." ~ {$this->waktuMain} Jam.";
        return $str;
    }
}



class CetakInfoProduk {
    public function cetak ( Produk $produk ) {
        $str = "{$produk->getLable()}, (Rp. {$produk->harga})";
        return $str;
    } 
}


$produk1 = new Komik("JOJOBrizarreAndventure", "araki", "Shonen Jump", 100000, 200 );
$produk2 = new Game("God Of War", "-", "Sony Game", 200000, 100 );

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

$produk2->setDiscon(90);
echo $produk2->getHarga();
echo "<hr>";

$produk1->setJudul("Manusia God");
echo $produk1->getjudul();




