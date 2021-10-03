let doc_theme_name = document.getElementsByClassName("theme_name");

if (localStorage.getItem("theme_name") === null) {
  //alert("no");
  localStorage.setItem("theme_name", "Light");
  doc_theme_name.innerHTML = "Light";
} else {
  //alert("yes");
  doc_theme_name[0].innerHTML = localStorage.getItem("theme_name");
  doc_theme_name[1].innerHTML = localStorage.getItem("theme_name");
}

function changeTheme() {
  let doc_theme_name = document.getElementsByClassName("theme_name");
  let stored_theme = localStorage.getItem("theme_name");
  let main_div = document.getElementById("main-post");
  let sub_div = document.getElementsByClassName("sub_posts");
  let modal_div = document.getElementsByClassName("modal-content");

  if (stored_theme == "Dark") {
    doc_theme_name[0].innerHTML = "Light";
    doc_theme_name[1].innerHTML = "Light";
    localStorage.setItem("theme_name", "Light");

    //main div background
    main_div.classList.remove("bg-dark");
    main_div.classList.remove("text-white");

    //text-area background
    main_div.children[0].children[0].children[0].children[1].classList.remove(
      "bg-secondary"
    );
    main_div.children[0].children[0].children[0].children[1].classList.remove(
      "text-white"
    );

    //browse btn color
    document.getElementById("post_image").classList.remove("btn-secondary");
    document.getElementById("post_image").classList.remove("text-dark");
    document.getElementById("post_image").classList.add("btn-dark");

    //close btn color
    document.getElementById("clearFile").classList.remove("btn-outline-light");
    document.getElementById("clearFile").classList.add("btn-outline-dark");

    //post button
    main_div.children[0].children[0].children[2].classList.remove("btn-secondary");
    main_div.children[0].children[0].children[2].classList.remove("text-dark");
    main_div.children[0].children[0].children[2].classList.add("btn-dark");

    for (var i=0; i<sub_div.length; i++) {
      //main sub header
      sub_div[i].children[0].classList.remove("text-white");
      sub_div[i].children[0].classList.remove("bg-dark");
  
      //sub bg color
      sub_div[i].children[1].classList.remove("bg-secondary");
      sub_div[i].children[1].classList.remove("text-white");
  
      //post user name color
      sub_div[i].children[1].children[0].children[1].classList.remove("text-dark");

      //hearts
      sub_div[i].children[2].classList.remove("bg-dark");
  
    }

    //modal dark mode
    for (var k = 0; k < modal_div.length; k++) {
      modal_div[k].classList.remove("bg-dark");
    }


  } else {
    doc_theme_name[0].innerHTML = "Dark";
    doc_theme_name[1].innerHTML = "Dark";
    localStorage.setItem("theme_name", "Dark");

    //main div background
    main_div.classList.add("bg-dark");
    main_div.classList.add("text-white");

    //text-area background
    main_div.children[0].children[0].children[0].children[1].classList.add(
      "bg-secondary"
    );
    main_div.children[0].children[0].children[0].children[1].classList.add(
      "text-white"
    );

    //browse btn color
    document.getElementById("post_image").classList.remove("btn-dark");
    document.getElementById("post_image").classList.add("btn-secondary");
    document.getElementById("post_image").classList.add("text-dark");

    //close btn color
    document.getElementById("clearFile").classList.remove("btn-outline-dark");
    document.getElementById("clearFile").classList.add("btn-outline-light");

    //post button
    main_div.children[0].children[0].children[2].classList.remove("btn-dark");
    main_div.children[0].children[0].children[2].classList.add("btn-secondary");
    main_div.children[0].children[0].children[2].classList.add("text-dark");

    for (var i=0; i<sub_div.length; i++) {
      //main sub header
      sub_div[i].children[0].classList.add("text-white");
      sub_div[i].children[0].classList.add("bg-dark");
  
      //sub bg color
      sub_div[i].children[1].classList.add("bg-secondary");
      sub_div[i].children[1].classList.add("text-white");
  
      //post user name color
      sub_div[i].children[1].children[0].children[1].classList.add("text-dark");

      //hearts
      sub_div[i].children[2].classList.add("bg-dark");
  
    }

    //modal dark mode
    for (var k = 0; k < modal_div.length; k++) {
      modal_div[k].classList.add("bg-dark");
    }

  }
}

if (localStorage.getItem("theme_name") == "Dark") {
  let main_div = document.getElementById("main-post");
  let sub_div = document.getElementsByClassName("sub_posts");
  let modal_div = document.getElementsByClassName("modal-content");

  //main div background
  main_div.classList.add("bg-dark");
  main_div.classList.add("text-white");

  //text-area background
  main_div.children[0].children[0].children[0].children[1].classList.add(
    "bg-secondary"
  );
  main_div.children[0].children[0].children[0].children[1].classList.add(
    "text-white"
  );

  //browse btn color
  document.getElementById("post_image").classList.remove("btn-dark");
  document.getElementById("post_image").classList.add("btn-secondary");
  document.getElementById("post_image").classList.add("text-dark");

  //close btn color
  document.getElementById("clearFile").classList.remove("btn-outline-dark");
  document.getElementById("clearFile").classList.add("btn-outline-light");

  //post button
  main_div.children[0].children[0].children[2].classList.remove("btn-dark");
  main_div.children[0].children[0].children[2].classList.add("btn-secondary");
  main_div.children[0].children[0].children[2].classList.add("text-dark");
  
  //sub_posts
  for (var i=0; i<sub_div.length; i++) {
    //main sub header
    sub_div[i].children[0].classList.add("text-white");
    sub_div[i].children[0].classList.add("bg-dark");

    //sub bg color
    sub_div[i].children[1].classList.add("bg-secondary");
    sub_div[i].children[1].classList.add("text-white");

    //post user name color
    sub_div[i].children[1].children[0].children[1].classList.add("text-dark");

    //hearts
    sub_div[i].children[2].classList.add("bg-dark");

  }

  //modal dark mode
  for (var k = 0; k < modal_div.length; k++) {
    modal_div[k].classList.add("bg-dark");
  }

  // alert("yes");
}


function changeHeart(heart) {
  if (heart.children[0].getAttribute('src') == "images/heart-fill.svg") {
    heart.children[0].src = "images/suit-heart.svg";
  } else {
    heart.children[0].src = "images/heart-fill.svg";
  }
}