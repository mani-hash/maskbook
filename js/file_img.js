window.addEventListener("resize", function (event) {
  var input_file = document.getElementById("post_image");

  if (screen.width > 430) {
    input_file.classList.remove("form-control");
  } else if (screen.width < 431) {
    input_file.classList.add("form-control");
  }
});

function clearVal() {
  document.getElementById("post_image").value = "";
}

var input_file = document.getElementById("post_image");

if (screen.width > 430) {
  input_file.classList.remove("form-control");
} else if (screen.width < 431) {
  input_file.classList.add("form-control");
}
