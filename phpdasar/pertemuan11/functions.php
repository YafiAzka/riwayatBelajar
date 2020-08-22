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
	$gambar = htmlspecialchars($data["gambar"]);

	// query insert data
	$query = "INSERT INTO top_anime
				VALUES
				('', '$noa', '$judul', '$studio' , '$totaleps', '$gambar')
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);


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
	$gambar = htmlspecialchars($data["gambar"]);
	
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






?>