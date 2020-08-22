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
	<title>Get</title>
</head>
<body>
<h1>Daftar Siswa</h1>
<ul>
	<?php foreach( $siswa as $sis ) : ?>
		<li>
			<a href="latihan2.php?nama=<?= $sis["nama"]; ?>&nis=<?= $sis["nis"]; ?>&email=<?= $sis["email"]; ?>&jurusan=<?= $sis["jurusan"]; ?>&gambar=<?= $sis["gambar"]; ?>"><?= $sis["nama"]; ?></a>
		</li>
	<?php endforeach; ?>


</ul>



</body>
</html>