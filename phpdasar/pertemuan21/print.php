<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'functions.php';
$top_ani = query("SELECT * FROM top_anime");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html>
<head>
    <title>Top anime</title>
</head>
<body>
    <h1>Top Anime</h1>

    <table border="1" cellpadding="10" cellspacing="0">
    
        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>NOA</th>
            <th>Judul</th>
            <th>Studio</th>
            <th>TotalEps</th>
        </tr>'; 

    $i = 1; 
    foreach ( $top_ani as $row ) {
        $html .= '<tr>
            <td>'. $i++ .'</td>
            <td><img src="img/'. $row["gambar"] .'" width="50"></td>
            <td>'. $row["noa"] .'</td>
            <td>'. $row["judul"] .'</td>
            <td>'. $row["studio"] .'</td>
            <td>'. $row["total_eps"] .'</td>
        </tr>';
    }


$html .= '</table>


</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('Top-Anime.pdf', "I");

?>
