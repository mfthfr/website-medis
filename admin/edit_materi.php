<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Materi</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

<div class="container">
    <h2>Edit Materi</h2>

    <?php
    include "../koneksi/koneksi.php";

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $query = "SELECT * FROM tb_materi WHERE id_materi = '$id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
    ?>
            <form id="formEditMateri">
                <input type="hidden" id="editIdMateri" name="editIdMateri" value="<?php echo $row['id_materi']; ?>">

                <label for="judulMateri">Judul Materi:</label>
                <input type="text" id="editJudulMateri" name="editJudulMateri" value="<?php echo $row['judul']; ?>" required>

                <label for="isiMateri">Isi Materi:</label>
                <textarea id="editIsiMateri" name="editIsiMateri" cols="30" rows="10" required><?php echo $row['konten']; ?></textarea>
                
                <label for="fileMateri">Unggah Materi (doc/pdf):</label>
                <input type="file" name="editFileMateri" id="editFileMateri" accept=".doc, .docx, .pdf">
                
                <label for="tanggalPublikasi">Tanggal Publikasi:</label>
                <input type="date" id="editTanggalPublikasi" name="editTanggalPublikasi" value="<?php echo $row['tanggal_publikasi']; ?>" required>

                <button type="button" id="simpanEditBtn">Simpan Perubahan</button>
                <button type="button" id="btnKembali" onclick="window.location.href='daftar_materi.php'">Kembali</button>
            </form>
    <?php
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "ID not provided.";
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="assets/javascript/script.js"></script>

</body>
</html>
