<?php 

// koneksi ke databases
$conn = mysqli_connect("localhost", "root", "", "kelas_kita");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;

}

function tambahAdmin($data) {
	global $conn;
	// ambil data dari tiap elemen dalam from
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$password = htmlspecialchars($data["password"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	
	// query insert data
	$query = "INSERT INTO admin
				VALUES
				('', '$nama', '$email', '$password' , $no_hp)
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function tambahSiswa($data) {
	global $conn;
	// ambil data dari tiap elemen dalam from
	$nama = htmlspecialchars($data["nama"]);
	$nis = htmlspecialchars($data["nis"]);
	$bio = htmlspecialchars($data["bio"]);
	$tempat_tinggal = htmlspecialchars($data["tempat_tinggal"]);
	$jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);

	// upload gambar
	$gambar = upload();
	if ( !$gambar ) {
		return false;
	}
	
	// query insert data
	$query = "INSERT INTO siswa
				VALUES
				('',  '$gambar', '$nis', '$nama', '$bio' , '$tempat_tinggal', '$jenis_kelamin')
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function tambahArtikel($data) {
	global $conn;
	// ambil data dari tiap elemen dalam from
	$judul = htmlspecialchars($data["judul"]);
	$konten = htmlspecialchars($data["konten"]);
	
	// upload gambar
	$gambar = upload();
	if ( !$gambar ) {
		return false;
	}
	
	// query insert data
	$query = "INSERT INTO artikel
				VALUES
				('', '$gambar', '$judul', '$konten', NOW())
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


function ubahAdmin($data) {
	global $conn;

	// ambil data dari tiap elemen dalam from
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$password = htmlspecialchars($data["password"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	
	
	
	// query insert data
	$query = "UPDATE admin SET 
				nama =	'$nama',
				email = '$email', 
				password = '$password',
				no_hp = '$no_hp'
				
				
			WHERE id = $id
		";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
	
}

function ubahSiswa($data) {
	global $conn;

	// ambil data dari tiap elemen dalam from
	$id = $data["id"];
	$nis = htmlspecialchars($data["nis"]);
	$nama = htmlspecialchars($data["nama"]);
	$bio = htmlspecialchars($data["bio"]);
	$tempat_tinggal = htmlspecialchars($data["tempat_tinggal"]);
	$jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
	$thumbnail = $data["thumbnail"];

	// cek apakah gamabar user pilih baru atau tidak
	if ( $_FILES['gambar']['error'] === 4 ){
		$gambar = $thumbnail;
	} else {
		$gambar = upload();
	}
	
	
	// query insert data
	$query = "UPDATE siswa SET 
				thumbnail = '$gambar',
				nis = '$nis', 
				nama =	'$nama',
				bio = '$bio',
				tempat_tinggal = '$tempat_tinggal',
				jenis_kelamin = '$jenis_kelamin'
				
			WHERE id = $id
		";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
	
}

function ubahArtikel($data) {
	global $conn;

	// ambil data dari tiap elemen dalam from
	$id = $data["id"];
	$judul = htmlspecialchars($data["judul"]);
	$konten = htmlspecialchars($data["konten"]);
	$thumbnail = $data["thumbnail"];
	// $gambarlama = $data['gambarlama'];

	// cek apakah gamabar user pilih baru atau tidak
	if ( $_FILES['gambar']['error'] === 4 ){
		$gambar = $thumbnail;
	} else {
		$gambar = upload();
	}
	
	
	// query insert data
	$query = "UPDATE artikel SET 
				thumbnail = '$gambar',
				judul = '$judul', 
				konten = '$konten',
				tanggal = NOW()
				
			WHERE id = $id
		";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
	
}



function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah  tidak ada gambar yang diupload
	if ( $error === 4 ) {
		?>
			<script>
				alert('Silahkan pilih gambar terlebih dahulu ');
			</script>
	<?php
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		?>
			<script>
				alert('yang anda upload bukan gambar ');
			</script>
		<?php
		return false;
	}

	// cek jika file terlalu besar
	if ( $ukuranFile > 1000000 ) {
		?>
			<script>
				alert('ukuran gambar terlalu besar');
			</script>
		<?php
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../admin/upload/img/' . $namaFileBaru); 

	return $namaFileBaru;


}






function hapusAdmin($id) {
	global $conn;
	mysqli_query($conn,"DELETE FROM admin WHERE id='$id'");
	return mysqli_affected_rows($conn);
}

function hapusSiswa($id) {
	global $conn;
	mysqli_query($conn,"DELETE FROM siswa WHERE id='$id'");
	return mysqli_affected_rows($conn);
}

function hapusArtikel($id) {
	global $conn;
	mysqli_query($conn,"DELETE FROM artikel WHERE id='$id'");
	return mysqli_affected_rows($conn);
}














?>