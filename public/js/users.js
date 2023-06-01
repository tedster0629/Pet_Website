// Toggling the sidebar menu
$(document).ready(function () {
    $("#sideBarCollapse").on("click", function () {
        $("#sidebar").toggleClass("active");
    });
});

function removeErrorMessages() {
    const fname = document.getElementById("fnameEdit");
    const lname = document.getElementById("lnameEdit");
    const email = document.getElementById("emailEdit");
    const phone = document.getElementById("phoneEdit");
    const streetAddress = document.getElementById("addressEdit");
    const city = document.getElementById("cityEdit");
    const postalCode = document.getElementById("postalcodeEdit");
    fname.classList.remove("is-invalid");
    fname.nextElementSibling.classList.add("d-none");
    lname.classList.remove("is-invalid");
    lname.nextElementSibling.classList.add("d-none");
    email.classList.remove("is-invalid");
    email.nextElementSibling.classList.add("d-none");
    phone.classList.remove("is-invalid");
    phone.nextElementSibling.classList.add("d-none");
    streetAddress.classList.remove("is-invalid");
    streetAddress.nextElementSibling.classList.add("d-none");
    city.classList.remove("is-invalid");
    city.nextElementSibling.classList.add("d-none");
    postalCode.classList.remove("is-invalid");
    postalCode.nextElementSibling.classList.add("d-none");
}

let editModal = new bootstrap.Modal(document.getElementById("editModal"));
edits = document.getElementsByClassName("edit");
Array.from(edits).forEach((element) => {
    element.addEventListener("click", (e) => {
        tr = e.target.parentNode.parentNode;
        id = tr.getElementsByTagName("td")[0].innerText;
        fname = tr.getElementsByTagName("td")[1].innerText;
        lname = tr.getElementsByTagName("td")[2].innerText;
        email = tr.getElementsByTagName("td")[3].innerText;
        phone = tr.getElementsByTagName("td")[4].innerText;
        address = tr.getElementsByTagName("td")[5].innerText;
        city = tr.getElementsByTagName("td")[6].innerText;
        province = tr.getElementsByTagName("td")[7].innerText;
        postalcode = tr.getElementsByTagName("td")[8].innerText;
        idEdit.value = id;
        fnameEdit.value = fname;
        lnameEdit.value = lname;
        emailEdit.value = email;
        phoneEdit.value = phone;
        addressEdit.value = address;
        cityEdit.value = city;
        provinceEdit.value = province;
        postalcodeEdit.value = postalcode;

        removeErrorMessages();
        // Toggle the Modal
        editModal.toggle();
    });
});

let validFname = false;
let validLname = false;
let validEmail = false;
let validPhone = false;
let validStreet = false;
let validCity = false;
let validPostalCode = false;

const updateBtn = document.getElementById("update-btn");
updateBtn.addEventListener("click", (e) => {
    const fname = document.getElementById("fnameEdit");
    const lname = document.getElementById("lnameEdit");
    const email = document.getElementById("emailEdit");
    const phone = document.getElementById("phoneEdit");
    const streetAddress = document.getElementById("addressEdit");
    const city = document.getElementById("cityEdit");
    const postalCode = document.getElementById("postalcodeEdit");

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

    // Email
    if (validateEmail(email.value)) {
        validEmail = true;
        email.classList.remove("is-invalid");
        email.nextElementSibling.classList.add("d-none");
    } else {
        validEmail = false;
        email.nextElementSibling.classList.remove("d-none");
        email.classList.add("is-invalid");
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
        validFname != true ||
        validLname != true ||
        validEmail != true ||
        validPhone != true ||
        validStreet != true ||
        validCity != true ||
        validPostalCode != true
    ) {
        e.preventDefault();
    }
});
