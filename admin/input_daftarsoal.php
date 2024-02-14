<!-- form_tambah_istilah.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Soal</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

<div class="container">
    <h2>Form Tambah Soal</h2>
    <form id="formTambahSoal">
        <label for="pertanyaan">Pertanyaan:</label>
        <textarea id="pertanyaan" name="pertanyaan" cols="30" rows="10" placeholder="Masukan soal" required></textarea>
        
        <label for="pilihan_a">Pilihan A:</label>
        <input type="text" id="pilihan_a" name="pilihan_a" placeholder="Masukan jawaban" required>
        
        <label for="pilihan_b">Pilihan B:</label>
        <input type="text" id="pilihan_b" name="pilihan_b" placeholder="Masukan jawaban" required>
        
        <label for="pilihan_c">Pilihan C:</label>
        <input type="text" id="pilihan_c" name="pilihan_c" placeholder="Masukan jawaban" required>
        
        <label for="pilihan_d">Pilihan D:</label>
        <input type="text" id="pilihan_d" name="pilihan_d" placeholder="Masukan jawaban" required>

        <label for="jawaban_benar">Jawaban Benar (A, B, C, atau D):</label>
        <input type="text" id="jawaban_benar" name="jawaban_benar" placeholder="Masukan jawaban benar" required>

        <button type="button" id="tambahSoalBtn">Tambah Daftar Soal</button>
        <button type="button" id="btnKembali" onclick="window.location.href='daftar_soal.php'">Kembali</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="assets/javascript/scriptsoal.js"></script>
</body>
</html>
