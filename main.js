function show(element) {
  document.getElementById(element).classList.toggle("hidden");
  showMultiplication(element);
}

function showMultiplication(element){
  if(element === "tabla-tablas-multiplicar"){
    show("show-multiplication");
  }
}

document.querySelector(".theme-switcher").addEventListener("click", () => {
  document.querySelector("body").classList.toggle("dark");
  document.querySelector("#theme-light").classList.toggle("theme-active");
  document.querySelector("#theme-dark").classList.toggle("theme-active");
});

