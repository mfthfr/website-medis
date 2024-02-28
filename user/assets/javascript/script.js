// let jawabanUser = {};
// async function loadSoal() {
//   const response = await fetch("getsoal.php");
//   const data = await response.json();

//   const nomorSoalContainer = document.getElementById("nomor-soal-container");
//   const soalContainer = document.getElementById("soal-container");

//   // Menampilkan nomor soal di layar
//   data.forEach((soal, index) => {
//     const nomorSoal = document.createElement("div");
//     nomorSoal.textContent = index + 1;
//     nomorSoal.classList.add("nomor-soal");

//     nomorSoal.addEventListener("click", () => tampilkanSoal(soal));

//     nomorSoalContainer.appendChild(nomorSoal);
//   });

//   // Secara default, tampilkan soal pertama
//   if (data.length > 0) {
//     tampilkanSoal(data[0]);
//   }

//   const selesaiButton = document.getElementById("selesai-button");
//   selesaiButton.addEventListener("click", selesai);
// }

// function tampilkanSoal(soal) {
//   // Tampilkan soal di layar
//   const soalContainer = document.getElementById("soal-container");
//   soalContainer.innerHTML = ""; // Menghapus isi container sebelumnya

//   const pertanyaan = document.createElement("p");
//   pertanyaan.textContent = soal.pertanyaan;

//   // Tambahkan elemen untuk pilihan jawaban A, B, C, D
//   const pilihanA = buatPilihanJawaban(soal.id, "A", soal.pilihan_a);
//   const pilihanB = buatPilihanJawaban(soal.id, "B", soal.pilihan_b);
//   const pilihanC = buatPilihanJawaban(soal.id, "C", soal.pilihan_c);
//   const pilihanD = buatPilihanJawaban(soal.id, "D", soal.pilihan_d);

//   // Menandai jawaban yang sudah dipilih sebelumnya
//   if (jawabanUser[soal.id]) {
//     const jawabanTerpilih = jawabanUser[soal.id];
//     const inputJawabanTerpilih = soalContainer.querySelector(`input[value='${jawabanTerpilih}']`);
//     if(inputJawabanTerpilih){
//       inputJawabanTerpilih.checked = true;
//     }
//   }

//   // Tambahkan elemen ke soalContainer
//   soalContainer.appendChild(pertanyaan);
//   soalContainer.appendChild(pilihanA);
//   soalContainer.appendChild(pilihanB);
//   soalContainer.appendChild(pilihanC);
//   soalContainer.appendChild(pilihanD);
// }

// function buatPilihanJawaban(soalId, jawaban, teks) {
//   const pilihan = document.createElement("input");
//   pilihan.type = "radio";
//   pilihan.name = soalId;
//   pilihan.value = jawaban;

//   // menyimpan jawaban terpilih ke dalam variabel jawabanUser
//   pilihan.addEventListener("change", () => {
//     jawabanUser[soalId] = pilihan.value;
//   })

//   const label = document.createElement("label");
//   label.appendChild(pilihan);
//   label.innerHTML += ` ${teks}`;

//   return label;
// }

// function selesai() {
//   const konfirmasi = confirm("Apakah anda yakin ingin menyelesaikan tes?");
//   if(konfirmasi){
//     const nilai = hitungNilai();
//     alert (`Nilai anda: ${nilai}`);
//   }
// }

// function hitungNilai() {
//   const totalSoal = document.querySelectorAll(".nomor-soal").length;

//   // Memastikan jawabanUser tidak kosong
//   const jumlahBenar = Object.values(jawabanUser).reduce((acc, jawabanUser) => {
//     if (Object.keys(jawabanUser).length > 0) {
//       const soal = data.find(soal => soal.id === Object.keys(jawabanUser)[0]);
//       const jawabanBenarDariDatabase = soal.jawaban_benar;
//       return acc + (jawabanUser === jawabanBenarDariDatabase ? 1 : 0);
//     } else {
//       return acc;
//     }
//   }, 0);

//   const nilai = (jumlahBenar / totalSoal) * 100;
//   return nilai;
// }


// loadSoal();


// // materi
// document.addEventListener("DOMContentLoaded", function() {
//   // Mendapatkan data materi dari PHP dan menampilkannya dengan JavaScript
//   fetchMateri();
// });

// function fetchMateri() {
//   fetch('materi.php')
//       .then(response => response.json())
//       .then(data => displayMateri(data))
//       .catch(error => console.error('Error:', error));
// }

// function displayMateri(data) {
//   var contentDiv = document.getElementById("content");

//   // Loop melalui data materi dan tampilkan di halaman
//   data.forEach(function(materi) {
//       var materiDiv = document.createElement("div");
//       materiDiv.classList.add("materi-item");
//       materiDiv.innerHTML = "<h2>" + materi.judul + "</h2><p>" + materi.konten + "</p>";
//       contentDiv.appendChild(materiDiv);
//   });
// }

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
