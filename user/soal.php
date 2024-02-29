<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Soal</title>
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
</head>
<body>

<?php
include "../koneksi/koneksi.php";

$query = "SELECT * FROM tb_soal";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $nomorSoal = 1;
    echo "<table class='soal-table'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td class='nomor-soal'>$nomorSoal.</td>";
        echo "<td class='pertanyaan'>" . $row['pertanyaan'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='2' class='pilihan'><label><input type='radio' name='jawaban_$nomorSoal' value='A'> A. " . $row['pilihan_a'] . "</label></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='2' class='pilihan'><label><input type='radio' name='jawaban_$nomorSoal' value='B'> B. " . $row['pilihan_b'] . "</label></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='2' class='pilihan'><label><input type='radio' name='jawaban_$nomorSoal' value='C'> C. " . $row['pilihan_c'] . "</label></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='2' class='pilihan'><label><input type='radio' name='jawaban_$nomorSoal' value='D'> D. " . $row['pilihan_d'] . "</label></td>";
        echo "</tr>";

        $nomorSoal++;
    }
    echo "</table>";
    echo "<button id='submit-button'>Submit</button>";
}

mysqli_close($conn);
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="assets/javascript/script.js"></script>
</body>
</html>
