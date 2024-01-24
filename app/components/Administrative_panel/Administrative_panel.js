// Recuperar o estado do menu do localStorage, se existir
let isNavClosed = localStorage.getItem("navClosed") === "true";

let menuicn = document.getElementById("menuicn");
let nav = document.getElementById("verticalNav");
let cnt = document.getElementById("content");

// Atualizar a classe com base no estado armazenado
if (isNavClosed) {
    nav.classList.add("navclose");
    cnt.classList.add("cntclose");
}

menuicn.addEventListener("click", () => {
    nav.classList.toggle("navclose");
    cnt.classList.toggle("cntclose");
    // Atualizar o estado no localStorage
    localStorage.setItem("navClosed", nav.classList.contains("navclose"));
});
