window.addEventListener("resize", function (event) {
  var cur_width = screen.width;
  profile_hid = document.getElementById("dropbar-1");
  profile_view = document.getElementById("dropbar-2");

  if (cur_width > 991) {
    profile_hid.style.display = "none";
    profile_view.style.dispay = "block";
  } else if (cur_width < 992) {
    profile_hid.style.display = "block";
    profile_view.style.dispay = "none";
  }
});

var cur_width = screen.width;
profile_hid = document.getElementById("dropbar-1");
profile_view = document.getElementById("dropbar-2");

if (cur_width > 991) {
  profile_hid.style.display = "none";
  profile_view.style.dispay = "block";
} else if (cur_width < 992) {
  profile_hid.style.display = "block";
  profile_view.style.dispay = "none";
}
