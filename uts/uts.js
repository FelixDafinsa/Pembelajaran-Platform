document.getElementById("submitButton").addEventListener("click", function() {
    var jumlahPilihanHobi = parseInt(document.getElementById("jumlahPilihanHobi").value);

    if (isNaN(jumlahPilihanHobi) || jumlahPilihanHobi < 1) {
        alert("Masukkan jumlah pilihan hobi yang valid (minimal 1).");
        return;
    }

    var pilihanHobiHTML = '<div class="form-group">';
    for (var i = 0; i < jumlahPilihanHobi; i++) {
        pilihanHobiHTML += '<label for="hobi' + i + '">Pilihan Hobi ' + (i + 1) + '</label>';
        pilihanHobiHTML += '<input type="text" class="form-control" id="hobi' + i + '">';
    }
    pilihanHobiHTML += '<button type="button" class="btn btn-primary mt-3" onclick="tampilkanCheckboxHobi()">Oke</button>';
    pilihanHobiHTML += '</div>';

    document.getElementById("pilihanHobi").innerHTML = pilihanHobiHTML;
    document.getElementById("pilihanHobi").style.display = "block";
});

function tampilkanCheckboxHobi() {
    var jumlahPilihanHobi = parseInt(document.getElementById("jumlahPilihanHobi").value);
    var hobiArray = [];

    for (var i = 0; i < jumlahPilihanHobi; i++) {
        var hobi = document.getElementById("hobi" + i).value;
        hobiArray.push(hobi);
    }

    var checkboxHTML = '<div class="form-group">';
    for (var i = 0; i < hobiArray.length; i++) {
        checkboxHTML += '<div class="form-check">';
        checkboxHTML += '<input class="form-check-input" type="checkbox" id="hobiCheckbox' + i + '" value="' + hobiArray[i] + '">';
        checkboxHTML += '<label class="form-check-label" for="hobiCheckbox' + i + '">' + hobiArray[i] + '</label>';
        checkboxHTML += '</div>';
    }
    checkboxHTML += '<button type="button" class="btn btn-primary mt-3" onclick="tampilkanHasil()">Oke</button>';
    checkboxHTML += '</div>';

    document.getElementById("checkboxHobi").innerHTML = checkboxHTML;
    document.getElementById("checkboxHobi").style.display = "block";
}

function tampilkanHasil() { 
    var namaDepan = document.getElementById("namaDepan").value;
    var namaBelakang = document.getElementById("namaBelakang").value;
    var email = document.getElementById("email").value;
    
    var selectedCheckboxHobi = document.querySelectorAll('input[type="checkbox"]:checked');
    var hobiArray = [];

    selectedCheckboxHobi.forEach(function(checkbox) {
        hobiArray.push(checkbox.value);
    });

    var hasilHTML = '<p>Hallo, nama saya ' + namaDepan + ' ' + namaBelakang + ', dengan email ' + email + ', saya mempunyai sejumlah ' + hobiArray.length + ' pilihan hobi '
    hasilHTML += hobiArray.join(', ') + ', dan saya menyukai ' + hobiArray.join(', ') + '.</p>';

    document.getElementById("hasilTugas").innerHTML = hasilHTML;
}