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



function validateInputs() {
  var p1 = document.getElementById("pass1").value;
  var p2 = document.getElementById("pass2").value;
  var user_name = document.getElementById("InputName");
  var error_div1 = document.getElementById("error1");
  var error_div2 = document.getElementById("error2");

  var p_val = false;
  var u_val = false;

  var pass_length = p1.trim().length;
  var pass_value = p1.trim();

  if (pass_length == 0) {
    error_div2.innerHTML = "Invalid Password! Passwords must contain characters!";
    p_val = false;
  } else {
    if (pass_value == p2) {
      p_val = true;
    } else {
      if (pass_value == p2.trim()) {
        if (/^[\s]|[\s]$/g.test(p1) == 1) {
          error_div2.innerHTML = "Passwords cannot start or end with empty spaces!";
          p_val = false;
        }
      } else {
        error_div2.innerHTML = "Passwords Do Not Match!";
        p_val = false;
      }
    }
  }

  var user_length = user_name.value.trim().length;
  var user_value = user_name.value.trim();
  
  // alert(user_value);
  // var pattern_reject = /^([0-9])|(\s)|^([_])|^([.])/g;

  var pattern_reject = /^([0-9])|(\s)/g;

  var pattern_accept = /^[a-zA-Z0-9_.]*$/g;

  if (user_length == 0) {
    u_val = false;
  } else {
    if ((user_length >= 4) & (user_length <= 15)) {
      if (pattern_reject.test(user_value) == 1) {
        u_val = false;
      } else if (pattern_accept.test(user_value) == 1) {
        u_val = true;
      } else {
        u_val = false;
      }
    } else {
      u_val = false;
    }
  }

  if (u_val & (p_val == 1)) {
    return true;
  } else if (u_val | (p_val == 1)) {
    if (u_val == 0) {
      error_div1.style.display = "block";
      return false;
    } else if (p_val == 0) {
      error_div2.style.display = "block";
      return false;
    }
  } else if (u_val | p_val == 0) {
    error_div1.style.display = "block";
    error_div2.style.display = "block";
    return false;
  }
}

function hideError() {
  document.getElementById("error1").style.display = "none";
  document.getElementById("error2").style.display = "none";
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


//password-visible

function eyeBtn1(btn1) {
   
  var lis1 = btn1.children;
  var log_btn = document.getElementById("pass1");
  
  if (lis1[0].classList.contains("closeEye")) {
    
    btn1.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'><path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z' /><path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z' /></svg>"
    log_btn.type = "text"
  } else {
    
    btn1.innerHTML = "<svg class='closeEye' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-slash-fill' viewBox='0 0 16 16'><path d='m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z'/><path d='M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z'/></svg>";
    log_btn.type = "password"
  }
  
}

function eyeBtn2(btn2) {
   
  var lis1 = btn2.children;
  var log_btn = document.getElementById("pass2");
  
  if (lis1[0].classList.contains("closeEye")) {
    
    btn2.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'><path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z' /><path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z' /></svg>"
    log_btn.type = "text"
  } else {
    
    btn2.innerHTML = "<svg class='closeEye' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-slash-fill' viewBox='0 0 16 16'><path d='m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z'/><path d='M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z'/></svg>";
    log_btn.type = "password"
  }

  
  
}
