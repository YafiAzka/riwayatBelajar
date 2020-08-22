<?php 
$tgl = mktime(date("m"), date("d"), date("Y"));
$jam = date("H:i:s");	
$nama = "Munawir";
$waktu = date("d-M-Y",$tgl);
$kejadian = kejadian();




function salam($waktu,$nama) {
	return "Hari ini tanggal $waktu, Selamat  $nama!";
}

function kejadian() {
	$a = date ("H");
if (($a>=6) && ($a<=11)){
return "<b>, Selamat Pagi !!</b>";
}
else if(($a>11) && ($a<=15))
{
echo ", Selamat Siang !!";}
else if (($a>15) && ($a<=18)){
echo ", Selamat Siang !!";}
else { echo ", <b> Selamat Malam </b>";}
}

 ?>

 <?php
$tanggal= mktime(date("m"),date("d"),date("Y"));
echo "Tanggal : <b>".date("d-M-Y", $tanggal)."</b> ";
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
echo "| Pukul : <b>". $jam." "."</b>";
$a = date ("H");
if (($a>=6) && ($a<=11)){
return "<b>, Selamat Pagi !!</b>";
}
else if(($a>11) && ($a<=15))
{
echo ", Selamat Siang !!";}
else if (($a>15) && ($a<=18)){
echo ", Selamat Siang !!";}
else { echo ", <b> Selamat Malam </b>";}
?> 

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Latihan function</title>
 </head>
 <body>
 	<h1><?= salam($waktu,$nama);  ?></h1>
 	<h1> <?php kejadian() ?> </h1>
 	
 </body>
 </html>