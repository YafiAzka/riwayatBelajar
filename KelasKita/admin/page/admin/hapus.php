<?php 

$id = $_GET['id'];

if (hapusAdmin($id) > 0) {
    ?>
        <script>
            alert('Data berhasil dihapus');
            document.location.href = '?page=admin';
        </script>
    <?php
} else {
    ?>
        <script>
            alert('Data berhasil dihapus');
            document.location.href = '?page=admin';
        </script>
    <?php
}


?>