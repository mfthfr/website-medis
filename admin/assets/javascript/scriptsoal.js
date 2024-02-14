$(document).ready(function() {
    function loadSoal() {
        $.ajax({
            url: 'load_soal.php',
            type: 'GET',
            success: function(data) {
                $('#soalTable tbody').html(data);
            }
        });
    }
    
    loadSoal();

    $(document).on('click', '.edit-btn', function() {
        var id = $(this).data('id');
        window.location.href = 'edit_soal.php?id=' + id;
    });

    $('#simpanEditBtn').click(function() {
        var id = $('#editId').val();
        var pertanyaan = $('#editPertanyaan').val();
        var pilihan_a = $('#editPilihan_a').val();
        var pilihan_b = $('#editPilihan_b').val();
        var pilihan_c = $('#editPilihan_c').val();
        var pilihan_d = $('#editPilihan_d').val();
        var jawaban_benar = $('#editJawabanBenar').val();

        $.ajax({
            url: 'update_soal.php',
            type: 'POST',
            data: {
                id: id,
                pertanyaan: pertanyaan,
                pilihan_a: pilihan_a,
                pilihan_b: pilihan_b,
                pilihan_c: pilihan_c,
                pilihan_d: pilihan_d,
                jawaban_benar: jawaban_benar
            },
            success: function(response) {
                alert('Data berhasil diupdate');
                window.location = 'daftar_soal.php';
            }
        });
    });

    $(document).on('click', '.hapus-btn', function() {
        var id = $(this).data('id');
        if (confirm('Apakah Anda yakin ingin menghapus istilah medis ini?')) {
            $.ajax({
                url: 'hapus_soal.php',
                type: 'POST',
                data: {id: id},
                success: function(response) {
                    alert(response);
                    loadSoal();
                }
            });
        }
    });

    // Tambah daftar istilah button click event
    $('#tambahSoalBtn').click(function() {
        var pertanyaan = $('#pertanyaan').val();
        var pilihan_a = $('#pilihan_a').val();
        var pilihan_b = $('#pilihan_b').val();
        var pilihan_c = $('#pilihan_c').val();
        var pilihan_d = $('#pilihan_d').val();
        var jawaban_benar = $('#jawaban_benar').val();

        $.ajax({
            url: 'tambah_soal.php',
            type: 'POST',
            data: {
                pertanyaan: pertanyaan,
                pilihan_a: pilihan_a,
                pilihan_b: pilihan_b,
                pilihan_c: pilihan_c,
                pilihan_d: pilihan_d,
                jawaban_benar: jawaban_benar
            },
            success: function() {
                loadSoal();
                $('#pertanyaan, #pilihan_a, #pilihan_b, #pilihan_c, #pilihan_d, #jawaban_benar').val('');
                alert('Data berhasil disimpan');
                window.location = 'daftar_soal.php';
            }
        });
    });
});
