let image = "";
let storedFiles = [];
$(document).ready(function () {
  $("#image-input").on("change", handleFileSelect);
  image = $("#image");
});

function handleFileSelect(e) {
  let files = e.target.files;
  let filesArr = Array.prototype.slice.call(files);
  filesArr.forEach(function (f) {
    if (!f.type.match("image.*")) {
      return;
    }
    storedFiles.push(f);

    let reader = new FileReader();
    reader.onload = function (e) {
      var html = '<img src="' + e.target.result + "\" alt='Profile Image'>";
      image.html(html);
    };
    reader.readAsDataURL(f);
  });
}

let validPetName = false;
let validColor = false;
let validDescription = false;

const addPetBtn = document.getElementById("add-pet");
addPetBtn.addEventListener("click", (e) => {
  let petName = document.getElementById("pet_name");
  let color = document.getElementById("color");
  let description = document.getElementById("description");

  // Pet Name
  if (validateName(petName.value)) {
    validPetName = true;
    petName.classList.remove("is-invalid");
    petName.nextElementSibling.classList.add("d-none");
  } else {
    validPetName = false;
    petName.classList.add("is-invalid");
    petName.nextElementSibling.classList.remove("d-none");
  }

  // Color
  if (validateName(color.value)) {
    validColor = true;
    color.classList.remove("is-invalid");
    color.nextElementSibling.classList.add("d-none");
  } else {
    validColor = false;
    color.nextElementSibling.classList.remove("d-none");
    color.classList.add("is-invalid");
  }

  // Description
  if (validateDescription(description.value)) {
    validDescription = true;
    description.classList.remove("is-invalid");
    description.nextElementSibling.classList.add("d-none");
  } else {
    validDescription = false;
    description.nextElementSibling.classList.remove("d-none");
    description.classList.add("is-invalid");
  }
  if (validPetName ==false || validColor == false || validDescription == false) {
    e.preventDefault();
  }
});
