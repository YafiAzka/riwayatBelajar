<?php 
if ( !isset($_GET["nama"]) || 
	 !isset($_GET["nis"]) ||
	 !isset($_GET["email"]) ||
	 !isset($_GET["jurusan"]) ||
	 !isset($_GET["gambar"])) {
	// redirect
	header("Location: latihan1.php");
	exit;
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Detail Siswa</title>
</head>
<body>

<ul>
	<li><img src="img/<?= $_GET["gambar"]; ?>"></li>
	<li><?= $_GET["nama"]; ?></li>
	<li><?= $_GET["nis"]; ?></li>
	<li><?= $_GET["email"]; ?></li>
	<li><?= $_GET["jurusan"]; ?></li>
</ul>


</body>
</html>