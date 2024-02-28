<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Materi</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Daftar Materi</h2>
        <button type="button" id="tampilFormTambahMateri">Tambah</button>
        <!-- Tampilan daftar istilah -->
        <table id="materiTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Materi</th>
                    <th>Tanggal Publikasi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="assets/javascript/script.js"></script>
    <script>
    // Script untuk menampilkan formulir tambah istilah saat tombol diklik
    $('#tampilFormTambahMateri').click(function() {
        window.location.href = 'input_daftarmateri.php';
    });
    </script>
</body>
</html>