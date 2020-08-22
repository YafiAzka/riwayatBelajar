<?php
// Date
// Untuk Menampilkan tanggal dengan format tertentu
// echo date("l, d-M-Y");

// Time
// UNIX Timestamp / EPOCH time
// detik yang sudah berlalu sejak 1 Januari 1970
// echo time();
// echo date("l, d-M-Y", time()+60*60*24*100);

// mktime
// membuat sendiri detik
// mktime(0,0,0,0,0,0)
// jam, menit, detik, bulan, tanggal, tahun
// echo date("l, d-M-Y", mktime(0,0,0,12,7,2002));


// strtotime
echo date("l, d-M-Y",strtotime("07 dec 2002"));


 ?>