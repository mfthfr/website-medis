<?php
include "../koneksi/koneksi.php";

$query = "SELECT jawaban_benar FROM tb_soal";
$result = mysqli_query($conn, $query);

$jawabanBenarServer = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $jawabanBenarServer[] = $row['jawaban_benar'];
    }
}

mysqli_close($conn);

// Mengembalikan jawaban benar ke frontend (JSON)
echo json_encode($jawabanBenarServer);
?>
