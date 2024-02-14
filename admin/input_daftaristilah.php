<!-- form_tambah_istilah.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Istilah Medis</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

<div class="container">
    <h2>Form Tambah Istilah Medis</h2>
    <form id="formTambahIstilah">
        <label for="istilahMedis">Istilah Medis:</label>
        <input type="text" id="istilahMedis" name="istilahMedis" required>

        <label for="unsurKata">Unsur Kata:</label>
        <input type="text" id="unsurKata" name="unsurKata" required>

        <label for="informasiMedis">Informasi Medis:</label>
        <textarea id="informasiMedis" name="informasiMedis" cols="30" rows="10" required></textarea>

        <label for="kodeICD">Kode ICD:</label>
        <input type="text" id="kodeICD" name="kodeICD" required>

        <button type="button" id="tambahIstilahBtn">Tambah Daftar Istilah</button>
        <button type="button" id="btnKembali" onclick="window.location.href='daftar_istilah.php'">Kembali</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="assets/javascript/script.js"></script>
</body>
</html>
