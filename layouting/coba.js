// Mendapatkan elemen tombol mode
const modeButton = document.getElementById('mode-button');

// Mendengarkan klik pada tombol mode
modeButton.addEventListener('click', function() {
    // Mendapatkan elemen body
    const body = document.body;
    
    // Mengubah latar belakang (background) body
    if (body.style.backgroundColor === 'white') {
        body.style.backgroundColor = '#333'; // Mengubah ke dark mode
    } else {
        body.style.backgroundColor = 'white'; // Mengubah ke light mode
    }
});