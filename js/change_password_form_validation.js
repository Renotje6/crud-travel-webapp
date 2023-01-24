function validateForm() {
  // Get the form elements
  let passwordElement = document.forms["change-password-form"]["password"];
  let repeatPasswordElement =
    document.forms["change-password-form"]["repeat-password"];

  let password = passwordElement.value;
  let repeatPassword = repeatPasswordElement.value;

  // Get the error message elements
  let passwordError = document.getElementsByClassName("error password")[0];
  let repeatPasswordError = document.getElementsByClassName(
    "error repeat-password"
  )[0];

  let valid = true;

  // check if password is valid
  var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
  if (!re.test(password)) {
    passwordElement.style.borderBottom = "1px solid red";
    passwordError.innerHTML =
      "Wachtwoord moet minimaal 6 karakters lang zijn <br />en moet minimaal 1 hoofdletter, <br/> 1 kleine letter en 1 cijfer bevatten";
    valid = false;
  }

  // check if repeat password is valid
  if (repeatPassword != password) {
    repeatPasswordElement.style.borderBottom = "1px solid red";
    repeatPasswordError.innerHTML = "Wachtwoorden komen niet overeen";
    valid = false;
  }

  return valid;
}
