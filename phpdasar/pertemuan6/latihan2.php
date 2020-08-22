<?php

$siswa = [
	[
		"nama" => "Munawir",
		"nis" => "432818283",
		"email" => "munawir@gmail.com",
		"jurusan" => "RPL",
		"gambar" => "1.png"
	],
	[
		"nama" => "Yapi",
		"nis" => "5243448283",
		"email" => "yapi@gmail.com",
		"jurusan" => "RPL",
		"gambar" => "2.png"
	],
];


?>
<!DOCTYPE html>
<html>
<head>
	<title>Latihan array 2</title>
</head>
<body>
	<h1>Daftar Siswa</h1>
	<?php foreach( $siswa as $sis ) : ?>
		
		<ul>
			<li>
				<img src="img/<?= $sis["gambar"]?>">
			</li>
			<li>Nama : <?= $sis["nama"] ?></li>
			<li>Nis : <?= $sis["nis"] ?></li>
			<li>Email : <?= $sis["email"] ?></li>
			<li>Jurusan : <?= $sis["jurusan"] ?></li>

		</ul>
	
	<?php endforeach; ?>
</body>
</html>