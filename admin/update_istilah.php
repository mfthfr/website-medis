<?php
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $istilahMedis = mysqli_real_escape_string($conn, $_POST['istilahMedis']);
    $unsurKata = mysqli_real_escape_string($conn, $_POST['unsurKata']);
    $informasiMedis = mysqli_real_escape_string($conn, $_POST['informasiMedis']);
    $kodeICD = mysqli_real_escape_string($conn, $_POST['kodeICD']);

    // Query untuk melakukan pembaruan data istilah medis
    $query = "UPDATE tb_istilahmedis 
              SET istilah_medis = '$istilahMedis', 
                  unsur_kata = '$unsurKata', 
                  informasi_medis = '$informasiMedis', 
                  kode_icd = '$kodeICD' 
              WHERE id_istilah = '$id'";

    $result = $conn->query($query);

    if ($result) {
        echo "Data berhasil diperbarui";
    } else {
        echo "Gagal memperbarui data";
    }
} else {
    // Jika bukan request method POST, redirect ke halaman daftar istilah
    header("Location: daftar_istilah.php");
    exit();
}
?>
