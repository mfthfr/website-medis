<?php
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $pertanyaan = mysqli_real_escape_string($conn, $_POST['pertanyaan']);
    $pilihan_a = mysqli_real_escape_string($conn, $_POST['pilihan_a']);
    $pilihan_b = mysqli_real_escape_string($conn, $_POST['pilihan_b']);
    $pilihan_c = mysqli_real_escape_string($conn, $_POST['pilihan_c']);
    $pilihan_d = mysqli_real_escape_string($conn, $_POST['pilihan_d']);

    // Query untuk melakukan pembaruan data istilah medis
    $query = "UPDATE tb_soal 
              SET pertanyaan = '$pertanyaan', 
                  pilihan_a = '$pilihan_a',
                  pilihan_b = '$pilihan_b',
                  pilihan_c = '$pilihan_c',
                  pilihan_d = '$pilihan_d' 
              WHERE id = '$id'";

    $result = $conn->query($query);

    if ($result) {
        echo "Data berhasil diperbarui";
    } else {
        echo "Gagal memperbarui data";
    }
} else {
    // Jika bukan request method POST, redirect ke halaman daftar istilah
    header("Location: daftar_soal.php");
    exit();
}
?>
