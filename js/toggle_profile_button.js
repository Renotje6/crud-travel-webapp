const listItems = document.querySelectorAll(".dropdown-menu li");

listItems.forEach((item) => {
  item.addEventListener("mousedown", (e) => {
    e.preventDefault();
  });
});
