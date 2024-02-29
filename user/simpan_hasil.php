<?php
include "../koneksi/koneksi.php";

// Mendapatkan data dari body request
$data = json_decode(file_get_contents("php://input"));

$namaUser = mysqli_real_escape_string($conn, $data->namaUser);
$tanggalPengerjaan = mysqli_real_escape_string($conn, $data->tanggalPengerjaan);
$jawabanBenar = intval($data->jawabanBenar);
$jawabanSalah = intval($data->jawabanSalah);
$nilai = number_format(floatval($data->nilai), 1);

// Simpan hasil ke dalam database
$queryInsert = "INSERT INTO tb_hasil (nama_user, tanggal_pengerjaan, jawaban_benar, jawaban_salah, nilai) VALUES ('$namaUser', '$tanggalPengerjaan', $jawabanBenar, $jawabanSalah, $nilai)";
mysqli_query($conn, $queryInsert);

mysqli_close($conn);

// Mengembalikan respons ke frontend (JSON)
$response = ["status" => "success"];
echo json_encode($response);
?>
