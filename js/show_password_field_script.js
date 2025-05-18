
// eyeIcon = document.getElementById("eye");
// function showPassword(eyeField) {
//   if (eyeField.type == "password") {
//     eyeField.type = "text";
//   } else {
//     eyeField.type = "password";
//     // eyeIcon.innerHTML=eyeIcon;

//   }
// }


// // prevent form submit
// const form = document.querySelector("form");
// form.addEventListener('submit', function (e) {
//     e.preventDefault();
// });

const togglePassword = document.querySelector("#eyeSlash");
const password = document.querySelector("#password");
    

    // for first field
togglePassword.addEventListener("click", function() {
  // toggle the type attribute
  const type = password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);

  // toggle the icon
  this.classList.toggle("fa-eye");
});

// prevent form submit
const form = document.querySelector("form");
form.addEventListener('submit', function(e) {
  e.preventDefault();
});


    // for anther field
const togglePassword2 = document.querySelector("#eyeSlashNew");
const password2 = document.querySelector("#confirm_password");
    

    // for first field
togglePassword2.addEventListener("click", function(e) {
  // toggle the type attribute

  const type = password2.getAttribute("type") === "password" ? "text" : "password";
  password2.setAttribute("type", type);

  // toggle the icon
  this.classList.toggle("fa-eye");
});

