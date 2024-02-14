<?php
include "../koneksi/koneksi.php";

// Example query, modify it according to your database structure
$query = "SELECT * FROM tb_soal";
$result = mysqli_query($conn, $query);

$output = '';

if (mysqli_num_rows($result) > 0) {
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr>';
        $output .= '<td width="5%" style="text-align: center;">' . $no++ . '</td>';
        $output .= '<td>' . $row['pertanyaan'] . "<br><br>A. " . $row["pilihan_a"] . "<br>B. " . $row["pilihan_b"] . "<br>C. " . $row["pilihan_c"] . "<br>D. " . $row["pilihan_d"] . "<br><br><b>Jawaban Benar : </b>" . '<b>' . $row["jawaban_benar"] . '</b>' . '</td>';
        $output .= '<td width="15%" style="text-align: center;">';
        $output .= '<button class="edit-btn" data-id="' . $row['id'] . '">Edit</button>';
        $output .= '<button class="hapus-btn" data-id="' . $row['id'] . '">Hapus</button>';
        $output .= '</td>';
        $output .= '</tr>';
    }
} else {
    $output .= '<tr><td colspan="3">Tidak ada soal</td></tr>';
}

echo $output;
?>
