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

  // Fungsi untuk button "View"
  $(document).on('click', '.view-btn', function() {
      var id = $(this).data('id');
      window.location.href = 'view_materi.php?id=' + id;
  });

  // Fungsi untuk button "Download"
  $(document).on('click', '.download-btn', function() {
      var id = $(this).data('id');
      window.location.href = 'download_materi.php?id=' + id;
  });
});

// Daftar Istilah
$(document).ready(function() {
  function loadIstilahMedis(page) {
      $.ajax({
          url: 'load_istilah.php',
          type: 'GET',
          data: { page: page },
          success: function(data) {
              $('#istilahTable tbody').html(data);
          }
      });
  }

  // Memuat data saat halaman pertama di-load
  loadIstilahMedis(1);

  // Event handling untuk perubahan halaman
  $(document).on('click', '.pagination a', function(e) {
      e.preventDefault();
      var currentPage = $(this).text();
      loadIstilahMedis(currentPage);
  });
});
