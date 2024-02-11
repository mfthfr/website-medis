async function loadSoal() {
  const response = await fetch("getsoal.php");
  const data = await response.json();

  const nomorSoalContainer = document.getElementById("nomor-soal-container");
  const soalContainer = document.getElementById("soal-container");

  // Menampilkan nomor soal di layar
  data.forEach((soal, index) => {
    const nomorSoal = document.createElement("div");
    nomorSoal.textContent = index + 1;
    nomorSoal.classList.add("nomor-soal");

    nomorSoal.addEventListener("click", () => tampilkanSoal(soal));

    nomorSoalContainer.appendChild(nomorSoal);
  });

  // Secara default, tampilkan soal pertama
  if (data.length > 0) {
    tampilkanSoal(data[0]);
  }
}

function tampilkanSoal(soal) {
  // Tampilkan soal di layar
  const soalContainer = document.getElementById("soal-container");
  soalContainer.innerHTML = ""; // Menghapus isi container sebelumnya

  const pertanyaan = document.createElement("p");
  pertanyaan.textContent = soal.pertanyaan;

  // Tambahkan elemen untuk pilihan jawaban A, B, C, D
  const pilihanA = buatPilihanJawaban(soal.id, "A", soal.pilihan_a);
  const pilihanB = buatPilihanJawaban(soal.id, "B", soal.pilihan_b);
  const pilihanC = buatPilihanJawaban(soal.id, "C", soal.pilihan_c);
  const pilihanD = buatPilihanJawaban(soal.id, "D", soal.pilihan_d);

  // Tambahkan elemen ke soalContainer
  soalContainer.appendChild(pertanyaan);
  soalContainer.appendChild(pilihanA);
  soalContainer.appendChild(pilihanB);
  soalContainer.appendChild(pilihanC);
  soalContainer.appendChild(pilihanD);
}

function buatPilihanJawaban(soalId, jawaban, teks) {
  const pilihan = document.createElement("input");
  pilihan.type = "radio";
  pilihan.name = soalId;
  pilihan.value = jawaban;

  const label = document.createElement("label");
  label.appendChild(pilihan);
  label.innerHTML += ` ${teks}`;

  return label;
}

function selesai(){
  
}

loadSoal();
