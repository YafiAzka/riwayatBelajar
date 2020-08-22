<?php 

// koneksi ke databases
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;

}

function tambah($data) {
	global $conn;
	// ambil data dari tiap elemen dalam from
	$noa = htmlspecialchars($data["noa"]);
	$judul = htmlspecialchars($data["judul"]);
	$studio = htmlspecialchars($data["studio"]);
	$totaleps = htmlspecialchars($data["total_eps"]);
	
	// upload gambar
	$gambar = upload();
	if ( !$gambar ) {
		return false;
	}

	// query insert data
	$query = "INSERT INTO top_anime
				VALUES
				('', '$noa', '$judul', '$studio' , '$totaleps', '$gambar')
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

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru); 

	return $namaFileBaru;


}


function hapus($id) {
	global $conn;
	mysqli_query($conn,"DELETE FROM top_anime WHERE id='$id'");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	// ambil data dari tiap elemen dalam from
	$id = $data["id"];
	$noa = htmlspecialchars($data["noa"]);
	$judul = htmlspecialchars($data["judul"]);
	$studio = htmlspecialchars($data["studio"]);
	$totaleps = htmlspecialchars($data["total_eps"]);
	$gambarlama = $data['gambarlama'];

	// cek apakah gamabar user pilih baru atau tidak
	if ( $_FILES['gambar']['error'] === 4 ){
		$gambar = $gambarlama;
	} else {
		$gambar = upload();
	}
	
	
	// query insert data
	$query = "UPDATE top_anime SET 
				noa = '$noa', 
				judul =	'$judul',
				studio = '$studio',
				total_eps = '$totaleps',
				gambar = '$gambar'
			WHERE id = $id
		";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
	
}

function cari($keyword) {
	$query = "SELECT * FROM top_anime
				WHERE
			judul LIKE '%$keyword%' OR
			noa LIKE '%$keyword%' OR
			studio LIKE '%$keyword%' OR
			total_eps LIKE '%$keyword%' 
		";
	return query($query);

}


function register($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data['password']);
	$password2 = mysqli_real_escape_string($conn, $data['password2']);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM users 
		WHERE username='$username'");
	
	if ( mysqli_fetch_assoc($result) ) {
		?>
			<script>
				alert('username sudah ada ');
			</script>	
		<?php
		return false;
	}


	// cek confirmasi password
	if ( $password !== $password2 ) {
		?>
			<script>
				alert('konfirmasi password tidak sesuai');
			</script>
		<?php
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);



}






?>