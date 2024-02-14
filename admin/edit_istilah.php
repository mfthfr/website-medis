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

        $query = "SELECT * FROM tb_istilahmedis WHERE id_istilah = '$id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
    ?>
            <form id="formEditIstilah">
                <input type="hidden" id="editId" name="editId" value="<?php echo $row['id_istilah']; ?>">

                <label for="istilahMedis">Istilah Medis:</label>
                <input type="text" id="editIstilahMedis" name="editIstilahMedis" value="<?php echo $row['istilah_medis']; ?>" required>

                <label for="unsurKata">Unsur Kata:</label>
                <input type="text" id="editUnsurKata" name="editUnsurKata" value="<?php echo $row['unsur_kata']; ?>" required>
                
                <label for="informasiMedis">Informasi Medis:</label>
                <textarea id="editInformasiMedis" name="editInformasiMedis" cols="30" rows="10" required><?php echo $row['informasi_medis']; ?></textarea>
                
                <label for="kodeICD">Istilah Medis:</label>
                <input type="text" id="editKodeICD" name="editKodeICD" value="<?php echo $row['kode_icd']; ?>" required>

                <button type="button" id="simpanEditBtn">Simpan Perubahan</button>
                <button type="button" id="btnKembali" onclick="window.location.href='daftar_istilah.php'">Kembali</button>
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
