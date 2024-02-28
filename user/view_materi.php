<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Materi</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php
        include "../koneksi/koneksi.php";

        // Pastikan ID materi disediakan dalam parameter URL
        if (isset($_GET['id'])) {
            $id = mysqli_real_escape_string($conn, $_GET['id']);

            // Query untuk mendapatkan data materi berdasarkan ID
            $query = "SELECT * FROM tb_materi WHERE id_materi = '$id'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $materi = mysqli_fetch_assoc($result);

                // Tampilkan judul materi
                echo "<h2 style='text-align: center;'>{$materi['judul']}</h2>";
                echo "<button type='button' id='btnKembali' onclick=\"window.location.href='materi.php'\">Kembali</button>";

                // Tampilkan file materi jika ada
                if (!empty($materi['file_path'])) {
                    echo "<iframe src='{$materi['file_path']}' width='100%' height='600px' style='border: none;'></iframe>";
                }

                // Tampilkan konten materi (misalnya, teks atau gambar)
                // echo "<div>{$materi['konten']}</div>";
            } else {
                echo "Materi tidak ditemukan.";
            }
        } else {
            echo "ID Materi tidak diberikan.";
        }
    ?>
</body>
</html>
