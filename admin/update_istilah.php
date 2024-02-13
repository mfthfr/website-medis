<?php
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idIstilah = $_POST['editId'];
    $istilahMedis = mysqli_real_escape_string($conn, $_POST['editIstilahMedis']);
    $unsurKata = mysqli_real_escape_string($conn, $_POST['editUnsurKata']);
    $informasiMedis = mysqli_real_escape_string($conn, $_POST['editInformasiMedis']);
    $kodeICD = mysqli_real_escape_string($conn, $_POST['editKodeICD']);

    // Query untuk melakukan pembaruan data istilah medis
    $query = "UPDATE tb_istilahmedis 
              SET istilah_medis = '$istilahMedis', 
                  unsur_kata = '$unsurKata', 
                  informasi_medis = '$informasiMedis', 
                  kode_icd = '$kodeICD' 
              WHERE id_istilah = '$idIstilah'";

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
