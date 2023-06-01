// Toggling the sidebar menu
$(document).ready(function () {
    $("#sideBarCollapse").on("click", function () {
        $("#sidebar").toggleClass("active");
    });
});

// Show/Hide Password Value
function togglePassword(eyeIcon, passwordInput) {
    // toggle the type attribute
    const type =
        passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);

    // toggle the eye slash icon
    if (eyeIcon.classList.contains("fa-eye")) {
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    } else {
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    }
}

function displayNone(element) {
    element.style.display = "none";
}

function displayInlineBlock(element) {
    element.style.display = "inline-block";
}

function displayBlock(element) {
    element.style.display = "block";
}

const passEditBtn = document.getElementById("passEditBtn");
const passCancelBtn = document.getElementById("passCancelBtn");
const passUpdateBtn = document.getElementById("passUpdateBtn");

const newPasswordContainer = document.getElementById("new-password-container");
const confirmPasswordContainer = document.getElementById(
    "confirm-password-container"
);

// On load hide cancel, upload button and new password, confirm password option
addEventListener("load", (e) => {
    displayNone(passCancelBtn);
    displayNone(passUpdateBtn);
    displayNone(newPasswordContainer);
    displayNone(confirmPasswordContainer);
});

// Show and Hide Password on clicking eye icon
const toggleCurrentEye = document.getElementById("toggleCurrentEye");
const toggleNewEye = document.getElementById("toggleNewEye");
const toggleConfirmEye = document.getElementById("toggleConfirmEye");

const currentPass = document.getElementById("current_password");
const newPass = document.getElementById("password");
const confirmPass = document.getElementById("password_confirmation");

toggleCurrentEye.addEventListener("click", (e) => {
    togglePassword(toggleCurrentEye, currentPass);
});

toggleConfirmEye.addEventListener("click", (e) => {
    togglePassword(toggleConfirmEye, confirmPass);
    togglePassword(toggleNewEye, newPass);
});

// Password Input Events
passEditBtn.addEventListener("click", (e) => {
    e.preventDefault();
    displayNone(passEditBtn);
    displayInlineBlock(passCancelBtn);
    displayInlineBlock(passUpdateBtn);

    document.getElementById("current_password").removeAttribute("readonly");
    document.getElementById("password").removeAttribute("readonly");
    document
        .getElementById("password_confirmation")
        .removeAttribute("readonly");
    document.getElementById("current_password").focus();
    document.getElementById("current_password").value = "";

    // Display New Password and Confirm Password
    displayBlock(newPasswordContainer);
    displayBlock(confirmPasswordContainer);
});

passCancelBtn.addEventListener("click", (e) => {
    e.preventDefault();
    location.reload();
});

// Password Validation
let validCurrentPassword = false;
let validPassword = false;
let validConfirmPassword = false;

passUpdateBtn.addEventListener("click", (e) => {
    let currentPassword = document.getElementById("current_password");
    let password = document.getElementById("password");
    let confirmPassword = document.getElementById("password_confirmation");

    if (currentPassword.value == "") {
        validCurrentPassword = false;
        currentPassword.nextElementSibling.nextElementSibling.classList.remove(
            "d-none"
        );
        currentPassword.style.borderColor = "red";
    } else {
        validCurrentPassword = true;
        currentPassword.nextElementSibling.nextElementSibling.classList.add("d-none");
        currentPassword.style.borderColor = "#ced4da";
    }

    if (validatePassword(password.value)) {
        validPassword = true;
        password.nextElementSibling.classList.add("d-none");
        password.style.borderColor = "#ced4da";
    } else {
        validPassword = false;
        password.nextElementSibling.classList.remove(
            "d-none"
        );
        password.style.borderColor = "red";
    }

    if (password.value === confirmPassword.value) {
        validConfirmPassword = true;
        confirmPassword.nextElementSibling.nextElementSibling.classList.add(
            "d-none"
        );
        confirmPassword.style.borderColor = "#ced4da";
    } else {
        validConfirmPassword = false;
        confirmPassword.nextElementSibling.nextElementSibling.classList.remove(
            "d-none"
        );
        confirmPassword.style.borderColor = "red";
    }

    if (validPassword ==false || validConfirmPassword == false || validCurrentPassword==false) {
        e.preventDefault();
    }
});
