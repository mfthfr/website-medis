$(document).ready(function() {
    function loadIstilahMedis() {
        $.ajax({
            url: 'load_istilah.php',
            type: 'GET',
            success: function(data) {
                $('#istilahTable tbody').html(data);
            }
        });
    }

    loadIstilahMedis();

    $(document).on('click', '.edit-btn', function() {
        var id = $(this).data('id');
        window.location.href = 'edit_istilah.php?id=' + id;
    });

    $('#simpanEditBtn').click(function() {
        var id = $('#editId').val();
        var istilahMedis = $('#editIstilahMedis').val();
        var unsurKata = $('#editUnsurKata').val();
        var informasiMedis = $('#editInformasiMedis').val();
        var kodeICD = $('#editKodeICD').val();

        $.ajax({
            url: 'update_istilah.php',
            type: 'POST',
            data: {
                id: id,
                istilahMedis: istilahMedis,
                unsurKata: unsurKata,
                informasiMedis: informasiMedis,
                kodeICD: kodeICD
                // Add other fields if needed
            },
            success: function(response) {
                alert('Data berhasil diupdate');
                window.location = 'daftar_istilah.php';
            }
        });
    });

    $(document).on('click', '.hapus-btn', function() {
        var id = $(this).data('id');
        if (confirm('Apakah Anda yakin ingin menghapus istilah medis ini?')) {
            $.ajax({
                url: 'hapus_istilah.php',
                type: 'POST',
                data: {id: id},
                success: function(response) {
                    alert(response);
                    loadIstilahMedis();
                }
            });
        }
    });

    // Tambah daftar istilah button click event
    $('#tambahIstilahBtn').click(function() {
        var istilahMedis = $('#istilahMedis').val();
        var unsurKata = $('#unsurKata').val();
        var informasiMedis = $('#informasiMedis').val();
        var kodeICD = $('#kodeICD').val();

        $.ajax({
            url: 'tambah_istilah.php',
            type: 'POST',
            data: {
                istilahMedis: istilahMedis,
                unsurKata: unsurKata,
                informasiMedis: informasiMedis,
                kodeICD: kodeICD
            },
            success: function() {
                loadIstilahMedis();
                $('#istilahMedis, #unsurKata, #informasiMedis, #kodeICD').val('');
                alert('Data berhasil disimpan');
                window.location = 'daftar_istilah.php';
            }
        });
    });
});


// Materi

$(document).ready(function() {
    function loadMateri() {
        $.ajax({
            url: 'load_materi.php',
            type: 'GET',
            success: function(data) {
                $('#materiTable tbody').html(data);
            }
        });
    }

    loadMateri();

    $(document).on('click', '.view-btn', function() {
        var id = $(this).data('id');
        window.location.href = 'view_materi.php?id=' + id;
    });

    $(document).on('click', '.edit-btn', function() {
        var id = $(this).data('id');
        window.location.href = 'edit_materi.php?id=' + id;
    });

    $('#simpanEditBtn').click(function() {
        var id = $('#editIdMateri').val();
        var judulMateri = $('#editJudulMateri').val();
        var isiMateri = $('#editIsiMateri').val();
        var fileMateri = $('editFileMateri')[0].files[0];
        var tanggalPublikasi = $('#editTanggalPublikasi').val();

        $.ajax({
            url: 'update_materi.php',
            type: 'POST',
            data: {
                id: id,
                judulMateri: judulMateri,
                isiMateri: isiMateri,
                fileMateri: fileMateri,
                tanggalPublikasi: tanggalPublikasi
                // Add other fields if needed
            },
            success: function(response) {
                alert('Data berhasil diupdate');
                window.location = 'daftar_materi.php';
            }
        });
    });

    $(document).on('click', '.hapus-btn', function() {
        var id = $(this).data('id');
        if (confirm('Apakah Anda yakin ingin menghapus istilah medis ini?')) {
            $.ajax({
                url: 'hapus_materi.php',
                type: 'POST',
                data: {id: id},
                success: function(response) {
                    alert(response);
                    loadMateri();
                }
            });
        }
    });
    

    // Tambah daftar istilah button click event
    $('#tambahMateriBtn').click(function() {
        var judulMateri = $('#judulMateri').val();
        var isiMateri = $('#isiMateri').val();
        var tanggalPublikasi = $('#tanggalPublikasi').val();
        var fileMateri = $('#fileMateri')[0].files[0];

        var formData = new FormData();
        formData.append('judulMateri', judulMateri);
        formData.append('isiMateri', isiMateri);
        formData.append('tanggalPublikasi', tanggalPublikasi);
        formData.append('fileMateri', fileMateri);

        $.ajax({
            url: 'tambah_materi.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function() {
                loadMateri();
                $('#judulMateri, #isiMateri, #tanggalPublikasi, #fileMateri' ).val('');
                alert('Data berhasil disimpan');
                window.location = 'daftar_materi.php';
            }
        });
    });
});
