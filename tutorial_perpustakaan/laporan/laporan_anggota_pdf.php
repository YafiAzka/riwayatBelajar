<?php
$koneksi = new mysqli("localhost","root","","db_perpustakaan"); 
$content = '
	<style type="text/css">
		.tabel{border-collapse: collapse;}
		.tabel th{padding: 8px 5px; background-color: #cccccc}
		.tabel td{padding: 8px 5px; }
	</style>
';


	$content .= '
<page>
	<h2>Laporan Data Anggota</h2>

	<table border="1" class="tabel">
		<tr>
			<th>No</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Program Studi</th>
		</tr>';




        $no = 1;
        $sql = $koneksi->query ("select *from tb_anggota");

        while ($data= $sql->fetch_assoc()) {

        $jenis_kelamin = ($data['jenis_kelamin']=='L')?"Laki-laki":"Perempuan";

        $prodi = ($data['prodi']=='ti')?"Teknik Informatika":"Sistem Informasi";

        $content .= '

        	<tr>
            	<td>'.$no++.'</td>   
            	<td>'.$data['nim'].'</td>
            	<td> '.$data['nama'].'</td>
            	<td>'.$data['tempat_lahir'].'</td>
            	<td>'.$data['tanggal_lahir'].'</td>
            	<td>'.$jenis_kelamin.'</td>
            	<td>'. $prodi.'</td>
            </tr>

        ';
        }
 	$content .= '                                  
	</table>

</page>';
	
	require_once('../assets/html2pdf/html2pdf.class.php');
	$html2pdf = new HTML2PDF('P','A4','fr');
	$html2pdf->WriteHTML($content);
	$html2pdf->Output('exemple.pdf');


 ?>