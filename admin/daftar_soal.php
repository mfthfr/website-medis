<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Soal</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Daftar Soal</h2>
        <button type="button" id="tampilFormTambahSoal">Tambah</button>
        <!-- Tampilan daftar istilah -->
        <table id="soalTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Soal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="assets/javascript/scriptsoal.js"></script>
    <script>
    // Script untuk menampilkan formulir tambah istilah saat tombol diklik
    $('#tampilFormTambahSoal').click(function() {
        window.location.href = 'input_daftarsoal.php';
    });
</script>
</body>
</html>