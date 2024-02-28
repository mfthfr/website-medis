<?php
include "../koneksi/koneksi.php";

// Example query, modify it according to your database structure
$query = "SELECT * FROM tb_materi";
$result = mysqli_query($conn, $query);

$output = '';

if (mysqli_num_rows($result) > 0) {
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr>';
        $output .= '<td style="text-align: center;">' . $no++ . '</td>';
        $output .= '<td>' . $row['judul'] . '</td>';
        $output .= '<td style="text-align: center;">' . $row['tanggal_publikasi'] . '</td>';
        $output .= '<td style="text-align: center;">';
        $output .= '<button class="view-btn" data-id="' . $row['id_materi'] . '">View</button>';
        $output .= '<button class="edit-btn" data-id="' . $row['id_materi'] . '">Edit</button>';
        $output .= '<button class="hapus-btn" data-id="' . $row['id_materi'] . '">Hapus</button>';
        $output .= '</td>';
        $output .= '</tr>';
    }
} else {
    $output .= '<tr><td colspan="6">Data tidak ditemukan</td></tr>';
}

echo $output;
?>
