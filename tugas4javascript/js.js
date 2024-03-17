document.getElementById("submitButton").addEventListener("click", function() {
    var nama = document.getElementById("nama").value;
    var jumlahPilihan = parseInt(document.getElementById("jumlahPilihan").value);

    if (isNaN(jumlahPilihan) || jumlahPilihan < 1) {
      alert("Masukkan jumlah pilihan yang valid (minimal 1).");
      return;
    }

    var textInputsContainer = document.getElementById("textInputsContainer");
    textInputsContainer.innerHTML = "";

    for (var i = 0; i < jumlahPilihan; i++) {
      var label = document.createElement("label");
      label.innerHTML = "Teks Pilihan " + (i + 1) + ": ";
      
      var input = document.createElement("input");
      input.type = "text";
      input.name = "teksPilihan" + (i + 1);
      
      textInputsContainer.appendChild(label);
      textInputsContainer.appendChild(input);
      textInputsContainer.appendChild(document.createElement("br"));
    }

    document.getElementById("textInputsSubmitButton").style.display = "block";
    document.getElementById("textInputs").style.display = "block";
});

document.getElementById("textInputsSubmitButton").addEventListener("click", function() {
    var textInputsContainer = document.getElementById("textInputsContainer");
    var inputs = textInputsContainer.getElementsByTagName("input");
    var allInputsFilled = true;

    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i].value === "") {
        allInputsFilled = false;
        break;
      }
    }

    if (allInputsFilled) {
      var radioButtonsContainer = document.getElementById("radioButtonsContainer");
      radioButtonsContainer.innerHTML = "";

      for (var i = 0; i < inputs.length; i++) {
        var input = inputs[i];
        var label = document.createElement("label");
        label.innerHTML = input.value;

        var radioButton = document.createElement("input");
        radioButton.type = "radio";
        radioButton.name = "pilihan";
        radioButton.value = input.value;

        radioButtonsContainer.appendChild(radioButton);
        radioButtonsContainer.appendChild(label);
        radioButtonsContainer.appendChild(document.createElement("br"));
      }

      document.getElementById("radioButtonsSubmitButton").style.display = "block";
      document.getElementById("radioButtons").style.display = "block";
    } else {
      alert("Mohon isi semua teks pilihan terlebih dahulu.");
    }
});

document.getElementById("radioButtonsSubmitButton").addEventListener("click", function() {
    var selectedRadioButton = document.querySelector('input[name="pilihan"]:checked');

    if (selectedRadioButton) {
      var nama = document.getElementById("nama").value;
      var jumlahPilihan = parseInt(document.getElementById("jumlahPilihan").value);

      var selectedOptions = [];
      var inputs = document.querySelectorAll('input[name^="teksPilihan"]');
      for (var i = 0; i < inputs.length; i++) {
        selectedOptions.push(inputs[i].value);
      }

      var message = "Hallo, nama saya " + nama + ", saya mempunyai sejumlah " + jumlahPilihan + " pilihan yaitu " + selectedOptions.join(", ") + ", dan saya memilih " + selectedRadioButton.value + ".";
      console.log(message);
      alert(message);
    } else {
      alert("Pilih salah satu opsi terlebih dahulu.");
    }
});

function setHeaderImage() {
  var header = document.getElementById('header');
  var images = ['header.jpg']; // Ganti dengan daftar gambar Anda
  var randomIndex = Math.floor(Math.random() * images.length);
  var selectedImage = images[randomIndex];
  header.style.backgroundImage = 'url(' + selectedImage + ')';
}

window.onload = function() {
  setHeaderImage();
};
