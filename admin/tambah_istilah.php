<?php
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $istilahMedis = mysqli_real_escape_string($conn, $_POST['istilahMedis']);
    $unsurKata = mysqli_real_escape_string($conn, $_POST['unsurKata']);
    $informasiMedis = mysqli_real_escape_string($conn, $_POST['informasiMedis']);
    $kodeICD = mysqli_real_escape_string($conn, $_POST['kodeICD']);

    // Debug: Tampilkan nilai variabel
    echo "istilahMedis: $istilahMedis, unsurKata: $unsurKata, informasiMedis: $informasiMedis, kodeICD: $kodeICD";

    $query = "INSERT INTO tb_istilahmedis (istilah_medis, unsur_kata, informasi_medis, kode_icd) 
              VALUES ('$istilahMedis', '$unsurKata', '$informasiMedis', '$kodeICD')";
    
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
