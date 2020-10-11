var nav = document.getElementById("nav");

function menubar() {
  if (nav.style.display !== "" && nav.style.display !== "none") {
    nav.style.display = "none";
  } else {
    nav.style.display = "flex";
  }
}
