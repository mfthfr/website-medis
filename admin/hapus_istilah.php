<?php
include "../koneksi/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $query = "DELETE FROM tb_istilahmedis WHERE id_istilah = '$id'";
    $result = $conn->query($query);

    if ($result) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
