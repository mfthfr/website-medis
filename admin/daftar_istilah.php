<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Istilah Medis</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Daftar Istilah Medis</h2>
        <button type="button" id="tampilFormTambah">Tambah</button>
        <!-- Tampilan daftar istilah -->
        <table id="istilahTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Istilah Medis</th>
                    <th>Unsur Kata</th>
                    <th>Informasi Medis</th>
                    <th>Kode ICD</th>
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
    $('#tampilFormTambah').click(function() {
        window.location.href = 'input_daftaristilah.php';
    });
</script>
</body>
</html>