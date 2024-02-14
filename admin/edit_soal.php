<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Istilah Medis</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

<div class="container">
    <h2>Edit Istilah Medis</h2>

    <?php
    include "../koneksi/koneksi.php";

    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $query = "SELECT * FROM tb_soal WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
    ?>
            <form id="formEditSoal">
                <input type="hidden" id="editId" name="editId" value="<?php echo $row['id']; ?>">

                <label for="pertanyaan">Pertanyaan:</label>
                <textarea id="editPertanyaan" name="editPertanyaan" cols="30" rows="10" required><?php echo $row['pertanyaan']; ?></textarea>

                <label for="pilihan_a">Pilihan A:</label>
                <input type="text" id="editPilihan_a" name="editPilihan_a" value="<?php echo $row['pilihan_a']; ?>" required>
                
                <label for="pilihan_b">Pilihan B:</label>
                <input type="text" id="editPilihan_b" name="editPilihan_b" value="<?php echo $row['pilihan_b']; ?>" required>
                
                <label for="pilihan_c">Pilihan C:</label>
                <input type="text" id="editPilihan_c" name="editPilihan_c" value="<?php echo $row['pilihan_c']; ?>" required>
                
                <label for="pilihan_d">Pilihan D:</label>
                <input type="text" id="editPilihan_d" name="editPilihan_d" value="<?php echo $row['pilihan_d']; ?>" required>

                <label for="jawaban_benar">Jawaban Benar (A, B, C, atau D):</label>
                <input type="text" id="editJawaban_benar" name="editJawaban_benar" value="<?php echo $row['jawaban_benar']?>" required>

                <button type="button" id="simpanEditBtn">Simpan Perubahan</button>
                <button type="button" id="btnKembali" onclick="window.location.href='daftar_soal.php'">Kembali</button>
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
<script src="assets/javascript/scriptsoal.js"></script>

</body>
</html>
