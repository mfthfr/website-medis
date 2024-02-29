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


// halaman awal soal
document.addEventListener("DOMContentLoaded", function () {
    const mulaiButton = document.getElementById("mulaiButton");

    if (mulaiButton) {
        mulaiButton.addEventListener("click", function () {
            // Navigasi ke halaman soal saat tombol "Mulai/kerjakan soal" ditekan
            window.location.href = "soal.php";
        });
    }
});

// soal
let jawabanBenarServer = [];
let jawabanBenarUser = [];
let jumlahSoal = 0;

document.addEventListener("DOMContentLoaded", function () {
    fetch('ambil_jawaban_benar.php')
        .then(response => response.json())
        .then(data => {
            jawabanBenarServer = data;
            jumlahSoal = jawabanBenarServer.length;
        })
        .catch(error => console.error('Error:', error));

    const submitButton = document.getElementById("submit-button");
    if (submitButton) {
        submitButton.addEventListener("click", submitJawaban);
    }

    const radioButtons = document.querySelectorAll('input[type="radio"]');
    radioButtons.forEach((radio) => {
        radio.addEventListener("change", simpanJawaban);
    });
});

function simpanJawaban() {
    jawabanBenarUser = [];
    const radioButtons = document.querySelectorAll('input[type="radio"]:checked');
    radioButtons.forEach((radio) => {
        jawabanBenarUser.push(radio.value);
    });
}

function submitJawaban() {
    if (jawabanBenarUser.length !== jumlahSoal) {
        alert("Harap isi semua soal sebelum menekan tombol Submit.");
        return;
    }

    let jawabanBenarCount = 0;
    for (let i = 0; i < jumlahSoal; i++) {
        if (jawabanBenarUser[i] === jawabanBenarServer[i]) {
            jawabanBenarCount++;
        }
    }

    const nilai = ((jawabanBenarCount / jumlahSoal) * 100).toFixed(1);

    const namaUser = prompt("Masukkan nama Anda:");
    const tanggalPengerjaan = new Date().toISOString().slice(0, 10);

    fetch('simpan_hasil.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            namaUser: namaUser,
            tanggalPengerjaan: tanggalPengerjaan,
            jawabanBenar: jawabanBenarCount,
            jawabanSalah: jumlahSoal - jawabanBenarCount,
            nilai: nilai,
        }),
    })
    .then(response => response.json())
    .then(data => {
        alert(`Pengerjaan selesai!\nNilai Anda: ${nilai}`);
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan. Silakan coba lagi.');
    });
}
