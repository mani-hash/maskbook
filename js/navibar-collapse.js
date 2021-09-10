window.addEventListener("resize", function (event) {
  var cur_width = screen.width;
  profile_hid = document.getElementById("dropbar-1");
  profile_view = document.getElementById("dropbar-2");
  var user_email = document.getElementsByClassName("temp_collapse");
  var user_email2 = document.getElementsByClassName("per_collapse");
 
  // child_bar1 = profile_hid.nextElementSibling;

  // list_1 = child_bar1.tagName;

  // list_1 = list_1.toLowerCase();

  

  if (cur_width > 991) {

    profile_hid.style.display = "none";
    profile_view.style.dispay = "block";
    user_email[0].style.display = "none";
    user_email2[0].style.display = "block";
    

  } else if (cur_width < 992) {

    profile_hid.style.display = "block";
    profile_view.style.dispay = "none";
    user_email[0].style.display = "block";
    user_email2[0].style.display = "none";
    

  }
});

var cur_width = screen.width;
var profile_hid = document.getElementById("dropbar-1");
var profile_view = document.getElementById("dropbar-2");
var user_email = document.getElementsByClassName("temp_collapse");
var user_email2 = document.getElementsByClassName("per_collapse");

if (cur_width > 991) {
  profile_hid.style.display = "none";
  profile_view.style.dispay = "block";
  user_email[0].style.display = "none";
  user_email2[0].style.display = "block";
 

} else if (cur_width < 992) {
  profile_hid.style.display = "block";
  profile_view.style.dispay = "none";
  user_email[0].style.display = "block";
  user_email2[0].style.display = "none";
 
}







