// toggle modal
function toggleModal() {
  console.log("toggleModal() called");
  var modal = document.getElementsByClassName("modal")[0];
  if (modal.style.display == "none" || modal.style.display == "") {
    modal.style.display = "flex";
  } else {
    modal.style.display = "none";
  }
}
