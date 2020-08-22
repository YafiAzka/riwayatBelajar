<?php 
require_once 'App/init.php';


// $produk1 = new Komik("JOJOBrizarreAndventure", "araki", "Shonen Jump", 100000, 200 );
// $produk2 = new Game("God Of War", "-", "Sony Game", 200000, 100 );

// $cetakProduk = new CetakInfoProduk;
// $cetakProduk->tambahProduk($produk1);
// $cetakProduk->tambahProduk($produk2);

// echo $cetakProduk->cetak();
use App\Produk\User as ProdukUser;
use App\Service\User as ServiceUser;


new ProdukUser();
echo "<br>";
new ServiceUser();

