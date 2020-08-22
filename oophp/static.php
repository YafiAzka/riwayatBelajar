<?php 

class CobaStatic {

    public static $angka = 1;

    public static function halo(){
        return "Halo".self::$angka++." Kali <br>";
    }

}

echo CobaStatic::$angka;
echo "<br>";
echo CobaStatic::halo();

$obj = new CobaStatic;
echo "<br>";
echo CobaStatic::halo();

echo $obj->halo();
echo $obj->halo();
echo $obj->halo();

$obj1 = new CobaStatic;

echo $obj1->halo();
echo $obj1->halo();
echo $obj1->halo();


?>