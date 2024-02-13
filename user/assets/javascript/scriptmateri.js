document.addEventListener("DOMContentLoaded", function() {
    // Mendapatkan data materi dari PHP dan menampilkannya dengan JavaScript
    fetchMateri();
});

function fetchMateri() {
    fetch('materi.php')
        .then(response => response.json())
        .then(data => displayMateri(data))
        .catch(error => console.error('Error:', error));
}

function displayMateri(data) {
    var contentDiv = document.getElementById("content");

    // Loop melalui data materi dan tampilkan di halaman
    data.forEach(function(materi) {
        var materiDiv = document.createElement("div");
        materiDiv.classList.add("materi-item");
        materiDiv.innerHTML = "<h2>" + materi.judul + "</h2><p>" + materi.konten + "</p>";
        contentDiv.appendChild(materiDiv);
    });
}
