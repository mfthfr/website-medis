<?php
include "../koneksi/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pertanyaan = $_POST["pertanyaan"];
    $pilihan_a = $_POST["pilihan_a"];
    $pilihan_b = $_POST["pilihan_b"];
    $pilihan_c = $_POST["pilihan_c"];
    $pilihan_d = $_POST["pilihan_d"];
    $jawaban_benar = $_POST["jawaban_benar"];

    // Validasi jawaban benar (pastikan hanya A, B, C, atau D)
    $allowedAnswer = ['A', 'B', 'C', 'D'];
    if (!in_array($jawaban_benar, $allowedAnswer)) {
        echo "Jawaban benar hanya bisa A, B, C, atau D";
        exit;
    }

    // Simpan ke database
    $query = "INSERT INTO tb_soal (pertanyaan, pilihan_a, pilihan_b, pilihan_c, pilihan_d, jawaban_benar)
              VALUES ('$pertanyaan', '$pilihan_a', '$pilihan_b', '$pilihan_c', '$pilihan_d', '$jawaban_benar')";

    $result = $conn->query($query);

    if ($result) {
        echo "
            <script>
            alert('Soal berhasil disimpan');
            window.location = 'inputsoal.php';
            </script>
            ";
        die;
    } else {
        echo "
            <script>
            alert('Input soal gagal!');
            window.location = 'inputsoal.php';
            </script>
            ";
        die;
    }
}
?>
