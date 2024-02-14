<?php
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pertanyaan = mysqli_real_escape_string($conn, $_POST['pertanyaan']);
    $pilihan_a = mysqli_real_escape_string($conn, $_POST['pilihan_a']);
    $pilihan_b = mysqli_real_escape_string($conn, $_POST['pilihan_b']);
    $pilihan_c = mysqli_real_escape_string($conn, $_POST['pilihan_c']);
    $pilihan_d = mysqli_real_escape_string($conn, $_POST['pilihan_d']);
    $jawaban_benar = mysqli_real_escape_string($conn, $_POST['jawaban_benar']);

    // Debug: Tampilkan nilai variabel
    echo "pertanyaan: $pertanyaan, pilihan_a: $pilihan_a, pilihan_b: $pilihan_b, pilihan_c: $pilihan_c, pilihan_d: $pilihan_d, jawaban_benar: $jawaban_benar ";

    $query = "INSERT INTO tb_soal (pertanyaan, pilihan_a, pilihan_b, pilihan_c, pilihan_d, jawaban_benar) 
              VALUES ('$pertanyaan', '$pilihan_a', '$pilihan_b', '$pilihan_c', '$pilihan_d', '$jawaban_benar')";
    
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
