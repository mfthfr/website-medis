<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM INPUT SOAL</title>
</head>
<body>
    <h1>FORM INPUT SOAL-SOAL</h1>
    <form action="proses_inputsoal.php" method="post">
        <label for="pertanyaan">Pertanyaan:</label>
        <input type="text" name="pertanyaan" placeholder="Masukan soal" required>
        
        <label for="pilihan_a">Pilihan A:</label>
        <input type="text" name="pilihan_a" placeholder="Masukan jawaban" required>
        
        <label for="pilihan_b">Pilihan B:</label>
        <input type="text" name="pilihan_b" placeholder="Masukan jawaban" required>
        
        <label for="pilihan_c">Pilihan C:</label>
        <input type="text" name="pilihan_c" placeholder="Masukan jawaban" required>
        
        <label for="pilihan_d">Pilihan D:</label>
        <input type="text" name="pilihan_d" placeholder="Masukan jawaban" required>

        <label for="jawaban_benar">Jawaban Benar (A, B, C, atau D):</label>
        <input type="text" name="jawaban_benar" placeholder="Masukan jawaban benar" required>

        <button type="submit">Submit</button>
    </form>
</body>
</html>