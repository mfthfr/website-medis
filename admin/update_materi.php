<?php
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $judulMateri = mysqli_real_escape_string($conn, $_POST['judulMateri']);
    $isiMateri = mysqli_real_escape_string($conn, $_POST['isiMateri']);
    $fileMateri = mysqli_real_escape_string($conn, $_POST['fileMateri']);
    $tanggalPublikasi = mysqli_real_escape_string($conn, $_POST['tanggalPublikasi']);

    // Query untuk melakukan pembaruan data istilah medis
    $query = "UPDATE tb_materi 
              SET judul = '$judulMateri', 
                  konten = '$isiMateri', 
                  tanggal_publikasi = '$tanggalPublikasi', 
                  file_path = '$fileMateri' 
              WHERE id_materi = '$id'";

    $result = $conn->query($query);

    if ($result) {
        echo "Data berhasil diperbarui";
    } else {
        echo "Gagal memperbarui data";
    }
} else {
    // Jika bukan request method POST, redirect ke halaman daftar istilah
    header("Location: daftar_materi.php");
    exit();
}
?>
