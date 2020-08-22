<?php 
// Array Numberik
$siswa = [
	["Munawir","12232132","RPL","munawir@gmail.com"],
	["wir","124532132","RL","wir@gmail.com"],
	["Akun","1223254132","l","munawir@gmail.com"]
];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar siswa</title>
</head>
<body>

<h1>Daftar siswa</h1>
<?php foreach($siswa as $sis) :?>
<ul>
	
		<li> Nama : <?= $sis[0] ?></li>
		<li> Nis : <?= $sis[1] ?></li>
		<li> Jurusan : <?= $sis[2] ?></li>
		<li> Email : <?= $sis[3] ?></li>
	
</ul>
<?php endforeach ?>

</body>
</html>