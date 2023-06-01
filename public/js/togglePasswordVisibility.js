(function () {
  "use strict";

  var elToggle = document.querySelector(".toggle-btn");
  var passwordInput = Array.from(
    document.getElementsByClassName("floatingPassword")
  );
  elToggle.addEventListener("click", (e) => {
    e.preventDefault();
    console.log("Entre");
    if (elToggle.classList.contains("active")) {
      passwordInput.forEach((e) => {
        e.setAttribute("type", "password");
      });
      elToggle.classList.remove("active");
    } else {
      passwordInput.forEach((e) => {
        e.setAttribute("type", "text");
      });
      elToggle.classList.add("active");
    }
  });
})();
