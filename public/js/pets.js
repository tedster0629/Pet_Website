// Toggling the sidebar menu
$(document).ready(function () {
  $("#sideBarCollapse").on("click", function () {
    $("#sidebar").toggleClass("active");
  });
});

var editModal = new bootstrap.Modal(document.getElementById("editModal"));
edits = document.getElementsByClassName("edit");
Array.from(edits).forEach((element) => {
  element.addEventListener("click", (e) => {
    tr = e.target.parentNode.parentNode;
    pet_id = tr.getElementsByTagName("td")[0].innerText;
    pet_name = tr.getElementsByTagName("td")[1].innerText;
    age = tr.getElementsByTagName("td")[2].innerText;
    gender = tr.getElementsByTagName("td")[3].innerText;
    animalType = tr.getElementsByTagName("td")[4].innerText;
    coatLength = tr.getElementsByTagName("td")[5].innerText;
    color = tr.getElementsByTagName("td")[6].innerText;
    characteristic = tr.getElementsByTagName("td")[7].innerText.split(", ");
    description = tr.getElementsByTagName("td")[8].innerText;
    pet_status = tr.getElementsByTagName("td")[9].innerText;

    idEdit.value = pet_id;
    petnameEdit.value = pet_name;
    ageEdit.value = age;
    if (gender=='Male') {
      Male.setAttribute("checked", true);
    } else {
      Female.setAttribute("checked", true);
    }
    animalTypeEdit.value = animalType;
    coatEdit.value = coatLength;
    colorEdit.value = color;
    if (pet_status=='Adopted') {
      adopted.setAttribute("checked", true);
    } else {
      not_adopted.setAttribute("checked", true);
    }
    descriptionEdit.value = description;

    const characteristicEdit=document.querySelectorAll('input[type="checkbox"]');
    for(let i=0;i<characteristicEdit.length;i++){
      if(characteristic.includes(characteristicEdit[i].value)){
        characteristicEdit[i].setAttribute('checked',true);
      }
      else{
        characteristicEdit[i].removeAttribute('checked');
      }
    }

    // Toggle the Modal
    editModal.toggle();
  });
});

let validPetName = false;
let validColor = false;
let validDescription = false;

let updateBtn = document.getElementById("update-btn");
updateBtn.addEventListener("click", (e) => {
  let petname = document.getElementById("petnameEdit");
  let color = document.getElementById("colorEdit");
  let description = document.getElementById("descriptionEdit");

  // Pet Name
  if (validateName(petname.value)) {
    validPetName = true;
    petname.classList.remove("is-invalid");
    petname.nextElementSibling.classList.add("d-none");
  } else {
    validPetName = false;
    petname.nextElementSibling.classList.remove("d-none");
    petname.classList.add("is-invalid");
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

  if (
    validPetName ==false ||
    validColor ==false ||
    validDescription ==false
  ) {
    e.preventDefault();
  }
});
