<?php 

$id = $_GET['id'];

if (hapusSiswa($id) > 0) {
    ?>
        <script>
            alert('Data berhasil dihapus');
            document.location.href = '?page=siswa';
        </script>
    <?php
} else {
    ?>
        <script>
            alert('Data berhasil dihapus');
            document.location.href = '?page=siswa';
        </script>
    <?php
}


?>