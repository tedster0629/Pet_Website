let validEmail = false;
const loginBtn = document.getElementById("loginBtn");

loginBtn.addEventListener("click", (e) => {
    const floatingEmail = document.getElementById("floatingEmail");
    const floatingPassword = document.getElementById("password");

    // Email
    if (validateEmail(floatingEmail.value)) {
        floatingEmail.classList.remove("is-invalid");
        document.getElementById("emailSpan").classList.add("d-none");
    } else {
        e.preventDefault();
        document.getElementById("emailSpan").classList.remove("d-none");
        floatingEmail.classList.add("is-invalid");
    }

    // Password
    if (validatePassword(floatingPassword.value)) {
        floatingPassword.classList.remove("is-invalid");
        document.getElementById("passwordSpan").classList.add("d-none");
    } else {
        e.preventDefault();
        document.getElementById("passwordSpan").classList.remove("d-none");
        floatingPassword.classList.add("is-invalid");
    }
});
