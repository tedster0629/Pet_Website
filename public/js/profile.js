$(document).ready(function () {
    $("#sideBarCollapse").on("click", function () {
        $("#sidebar").toggleClass("active");
    });
});

function enableEdit(inputElements) {
    for (let i = 0; i < inputElements.length; i++) {
        inputElements[i].setAttribute("readonly", true);
    }
    // Disable Dropdown
    document.getElementById("province").setAttribute("disabled", true);
    //Disable Image Upload
    document.getElementById("upload-img").style.display = "none";
}

function disableEdit(inputElements) {
    for (let i = 0; i < inputElements.length; i++) {
        inputElements[i].removeAttribute("readonly");
    }
    // Enable Dropdown
    document.getElementById("province").removeAttribute("disabled");
    // Enable Upload Image
    document.getElementById("upload-img").style.display = "block";
}

const editBtn = document.getElementById("editBtn");
const cancelBtn = document.getElementById("cancelBtn");
const saveBtn = document.getElementById("saveBtn");

addEventListener("load", (e) => {
    cancelBtn.style.display = "none";
    saveBtn.style.display = "none";
    document.getElementById("upload-img").style.display = "none";
});

editBtn.addEventListener("click", (e) => {
    e.preventDefault();
    cancelBtn.style.display = "inline-block";
    saveBtn.style.display = "inline-block";
    editBtn.style.display = "none";

    // Removing readonly property from input fields
    let inputElements = document.getElementsByTagName("input");
    disableEdit(inputElements);

    // Focus on email input element
    inputElements[2].focus();
});
cancelBtn.addEventListener("click", (e) => {
    e.preventDefault();
    location.reload();
});

// Validation
let validFname = false;
let validLname = false;
let validPhone = false;
let validStreet = false;
let validCity = false;
let validPostalCode = false;

saveBtn.addEventListener('click',(e)=>{
    const fname = document.getElementById("fname");
    const lname = document.getElementById("lname");
    const phone = document.getElementById("phone");
    const streetAddress = document.getElementById("streetAddress");
    const city = document.getElementById("city");
    const postalCode = document.getElementById("postal-code");

    // First Name
    if (validateName(fname.value)) {
        validFname = true;
        fname.classList.remove("is-invalid");
        fname.nextElementSibling.classList.add("d-none");
    } else {
        validFname = false;
        fname.nextElementSibling.classList.remove("d-none");
        fname.classList.add("is-invalid");
    }

    // Last Name
    if (validateName(lname.value)) {
        validLname = true;
        lname.classList.remove("is-invalid");
        lname.nextElementSibling.classList.add("d-none");
    } else {
        validLname = false;
        lname.nextElementSibling.classList.remove("d-none");
        lname.classList.add("is-invalid");
    }

    // Phone
    if (validatePhone(phone.value)) {
        validPhone = true;
        phone.classList.remove("is-invalid");
        phone.nextElementSibling.classList.add("d-none");
    } else {
        validPhone = false;
        phone.nextElementSibling.classList.remove("d-none");
        phone.classList.add("is-invalid");
    }

    //Street Address
    if (streetAddress.value != "") {
        console.log("valid");
        validStreet = true;
        streetAddress.classList.remove("is-invalid");
        streetAddress.nextElementSibling.classList.add("d-none");
    } else {
        validStreet = false;
        streetAddress.nextElementSibling.classList.remove("d-none");
        streetAddress.classList.add("is-invalid");
    }

    //City
    if (city.value != "") {
        validCity = true;
        city.classList.remove("is-invalid");
        city.nextElementSibling.classList.add("d-none");
    } else {
        validCity = false;
        city.nextElementSibling.classList.remove("d-none");
        city.classList.add("is-invalid");
    }

    // PostalCode
    if (validatePostalCode(postalCode.value)) {
        validPostalCode = true;
        postalCode.classList.remove("is-invalid");
        postalCode.nextElementSibling.classList.add("d-none");
    } else {
        validPostalCode = false;
        postalCode.nextElementSibling.classList.remove("d-none");
        postalCode.classList.add("is-invalid");
    }

    if (
        validFname == false ||
        validLname == false ||
        validPhone == false ||
        validStreet == false ||
        validCity == false ||
        validPostalCode == false
    ) {
        e.preventDefault();
    }
})

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
            var html =
                '<img src="' + e.target.result + "\" alt='Profile Image'>";
            image.html(html);
        };
        reader.readAsDataURL(f);
    });
}


var editModal = new bootstrap.Modal(document.getElementById("editModal"));
edits = document.getElementsByClassName("edit");
Array.from(edits).forEach((element) => {
  element.addEventListener("click", (e) => {
    div=e.target.parentNode.parentNode.parentNode;
    pet_id = div.getElementsByTagName('input')[2].value
    pet_name = div.getElementsByTagName('h5')[0].innerText
    pet_status = div.getElementsByTagName("small")[0].innerText;
    gender = div.getElementsByTagName("small")[1].innerText;
    color = div.getElementsByTagName("small")[2].innerText;
    age = div.getElementsByTagName("small")[3].innerText;
    coatLength = div.getElementsByTagName("small")[4].innerText.split(" ")[0];
    characteristic = div.getElementsByTagName("small")[6].innerText;
    description = div.getElementsByTagName("p")[0].innerText;

    idEdit.value = pet_id;
    petnameEdit.value = pet_name;
    ageEdit.value = age;
    if (gender=='Male') {
      Male.setAttribute("checked", true);
    } else {
      Female.setAttribute("checked", true);
    }
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
