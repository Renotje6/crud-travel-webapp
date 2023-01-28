const element = document.getElementsByClassName("navigation-links")[0];
const closeElement = document.getElementsByClassName("close-btn")[0];
const hamburgerElement = document.getElementsByClassName("toggle")[0];

hamburgerElement.addEventListener("click", function () {
  element.classList.toggle("active");
});

closeElement.addEventListener("click", function () {
  element.classList.toggle("active");
});
