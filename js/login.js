
var login_div = document.getElementById("login-maindiv");

window.addEventListener("resize", function (event) {
  if (screen.width > 620) {
    login_div.classList.add("w-50");

  } else if (screen.width < 621) {
    login_div.classList.remove("w-50");
  }
});


if (screen.width > 620) {
  login_div.classList.add("w-50");

} else if (screen.width < 621) {
  login_div.classList.remove("w-50");
}

//finger print javascript code

const vij_container = document.querySelector(".vij-container");
vij_container.addEventListener("animationend", () => {
  vij_container.classList.remove("active");
});

//hide invalid

function hideInvalid() {
  document.getElementById("invalid").style.display = "none";
}