function validateForm() {
  let usernameElement = document.forms["registration-form"]["username"];
  let emailElement = document.forms["registration-form"]["email"];
  let passwordElement = document.forms["registration-form"]["password"];

  let username = usernameElement.value;
  let email = emailElement.value;
  let password = passwordElement.value;

  // Get the error message elements
  let usernameError = document.getElementsByClassName("error username")[0];
  let emailError = document.getElementsByClassName("error email")[0];
  let passwordError = document.getElementsByClassName("error password")[0];

  let valid = true;

  username = username.trim();
  email = email.trim();

  // check if username does not contain any spaces
  if (username.indexOf(" ") >= 0) {
    usernameElement.style.borderBottom = "1px solid red";
    usernameError.innerHTML = "Gebruikersnaam mag geen spaties bevatten";
    valid = false;
  }

  // check if username is valid
  if (username.length < 3) {
    usernameElement.style.borderBottom = "1px solid red";
    usernameError.innerHTML =
      "Gebruikersnaam moet minimaal 3 karakters lang zijn";
    valid = false;
  }

  // check if email is valid
  var atpos = email.indexOf("@");
  var dotpos = email.lastIndexOf(".");
  if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
    emailElement.style.borderBottom = "1px solid red";
    emailError.innerHTML = "Ongeldig email adres";
    valid = false;
  }

  // check if password is valid
  var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
  if (!re.test(password)) {
    passwordElement.style.borderBottom = "1px solid red";
    passwordError.innerHTML =
      "Wachtwoord moet minimaal 6 karakters lang zijn <br />en moet minimaal 1 hoofdletter, <br/> 1 kleine letter en 1 cijfer bevatten";
    valid = false;
  }

  return valid;
}
