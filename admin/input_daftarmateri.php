<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Materi</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

<div class="container">
    <h2>Form Tambah Materi</h2>
    <form id="formTambahMateri">
        <label for="judulMateri">Judul Materi:</label>
        <input type="text" id="judulMateri" name="judulMateri" required>

        <label for="isiMateri">Isi Materi:</label>
        <textarea id="isiMateri" name="isiMateri" cols="30" rows="10" required></textarea>

        <label for="fileMateri">Unggah Materi (doc/pdf):</label>
        <input type="file" name="fileMateri" id="fileMateri" accept=".doc, .docx, .pdf">
        
        <label for="tanggalPublikasi">Tanggal Publikasi:</label>
        <input type="date" id="tanggalPublikasi" name="tanggalPublikasi" required>

        <button type="button" id="tambahMateriBtn">Tambah Daftar Materi</button>
        <button type="button" id="btnKembali" onclick="window.location.href='daftar_materi.php'">Kembali</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="assets/javascript/script.js"></script>
</body>
</html>
