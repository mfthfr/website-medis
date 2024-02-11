<?php
include "../koneksi/koneksi.php";

$query = "SELECT * FROM tb_soal";
$result = $conn->query($query);

$soal = array();

while ($row = $result->fetch_assoc()) {
    $soal[] = $row;
}

echo json_encode($soal);
?>
