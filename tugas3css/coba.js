
const modeButton = document.getElementById('mode-button');

modeButton.addEventListener('click', function() {
 
    const body = document.body;
    

    if (body.style.backgroundColor === 'white') {
        body.style.backgroundColor = '#333'; 
        body.style.color = '#ffffff'// Mengubah ke dark mode
    } else {
        body.style.backgroundColor = 'white';
        body.style.color = '#000000'
    }
});