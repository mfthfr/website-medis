<?php
include "../koneksi/koneksi.php";

// Example query, modify it according to your database structure
$query = "SELECT * FROM tb_istilahmedis";
$result = mysqli_query($conn, $query);

$output = '';

if (mysqli_num_rows($result) > 0) {
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr>';
        $output .= '<td style="text-align: center;">' . $no++ . '</td>';
        $output .= '<td>' . $row['istilah_medis'] . '</td>';
        $output .= '<td>' . $row['unsur_kata'] . '</td>';
        $output .= '<td width="40%">' . $row['informasi_medis'] . '</td>';
        $output .= '<td>' . $row['kode_icd'] . '</td>';
        $output .= '<td style="text-align: center;">';
        $output .= '<button class="edit-btn" data-id="' . $row['id_istilah'] . '">Edit</button>';
        $output .= '<button class="hapus-btn" data-id="' . $row['id_istilah'] . '">Hapus</button>';
        $output .= '</td>';
        $output .= '</tr>';
    }
} else {
    $output .= '<tr><td colspan="6">Data tidak ditemukan</td></tr>';
}

echo $output;
?>
