<?php 

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