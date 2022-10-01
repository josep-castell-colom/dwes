function show(element) {
  console.log(element);
  document.getElementById(element).classList.toggle("hidden");
}

document.querySelector(".theme-switcher").addEventListener("click", () => {
  document.querySelector("body").classList.toggle("dark");
  document.querySelector("#theme-light").classList.toggle("theme-active");
  document.querySelector("#theme-dark").classList.toggle("theme-active");
});
