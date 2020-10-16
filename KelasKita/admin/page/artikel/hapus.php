<?php 

$id = $_GET['id'];

if (hapusArtikel($id) > 0) {
    ?>
        <script>
            alert('Artikel berhasil dihapus');
            document.location.href = '?page=artikel';
        </script>
    <?php

} else {

    ?>
        <script>
            alert('Artikel gagal dihapus');
            document.location.href = '?page=artikel';
        </script>
    <?php

}






?>