<?php
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judulMateri = mysqli_real_escape_string($conn, $_POST['judulMateri']);
    $isiMateri = mysqli_real_escape_string($conn, $_POST['isiMateri']);
    $tanggalPublikasi = mysqli_real_escape_string($conn, $_POST['tanggalPublikasi']);

    // Menggunakan move_uploaded_file untuk menyimpan file di server
    $fileMateri = $_FILES['fileMateri'];
    $namaFile = $fileMateri['name'];
    $lokasiFile = $fileMateri['tmp_name'];
    $tujuan = '../filemateri' . $namaFile;

    if (move_uploaded_file($lokasiFile, $tujuan)) {
        // File berhasil diunggah, masukkan informasi ke database
        $query = "INSERT INTO tb_materi (judul, konten, tanggal_publikasi, file_path)
                  VALUES ('$judulMateri', '$isiMateri', '$tanggalPublikasi', '$tujuan')";

        if (mysqli_query($conn, $query)) {
            echo "Data berhasil ditambahkan";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error saat mengunggah file";
    }
}
?>
