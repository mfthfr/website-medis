<?php
include "../koneksi/koneksi.php";

$itemsPerPage = 5;

// Hitung jumlah total baris
$queryTotalRows = "SELECT COUNT(*) as total FROM tb_istilahmedis";
$resultTotalRows = mysqli_query($conn, $queryTotalRows);
$totalRows = mysqli_fetch_assoc($resultTotalRows)['total'];

// Hitung jumlah halaman
$totalPages = ceil($totalRows / $itemsPerPage);

// Ambil halaman saat ini dari parameter GET
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Hitung offset untuk query
$offset = ($currentPage - 1) * $itemsPerPage;

// Query dengan batasan hasil berdasarkan halaman
$query = "SELECT * FROM tb_istilahmedis LIMIT $offset, $itemsPerPage";
$result = mysqli_query($conn, $query);

$output = '';

if (mysqli_num_rows($result) > 0) {
    $no = ($currentPage - 1) * $itemsPerPage + 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr>';
        $output .= '<td style="text-align: center;">' . $no++ . '</td>';
        $output .= '<td>' . $row['istilah_medis'] . '</td>';
        $output .= '<td>' . $row['unsur_kata'] . '</td>';
        $output .= '<td width="40%">' . $row['informasi_medis'] . '</td>';
        $output .= '<td>' . $row['kode_icd'] . '</td>';
        $output .= '</tr>';
    }
} else {
    $output .= '<tr><td colspan="6">Data tidak ditemukan</td></tr>';
}

echo $output;

echo '<div class="pagination">';
    for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?page=' . $i . '">' . $i . '</a>';
    }
    echo '</div>';

// Tambahkan navigasi halaman

?>
