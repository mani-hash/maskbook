//resize

var signup_div = document.getElementById("signup-maindiv");


window.addEventListener("resize", function (event) {
  if (screen.width > 620) {
    signup_div.classList.add("w-50");

  } else if (screen.width < 621) {
    signup_div.classList.remove("w-50");
  }
});

//signup.php

function verifyPasswords() {
  var p1 = document.getElementById("pass1").value;
  var p2 = document.getElementById("pass2").value;

  if (p1 == p2) {
    return true;
  } else {
    document.getElementById("error").style.display = "block";
    return false;
  }
}

function hideError() {
  document.getElementById("error").style.display = "none";
  hideFailed();
}

function hideFailed() {
  document.getElementById("failed").style.display = "none";
}


if (screen.width > 620) {

  signup_div.classList.add("w-50");

} else if (screen.width < 621) {

  signup_div.classList.remove("w-50");

}


