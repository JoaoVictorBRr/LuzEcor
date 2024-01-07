function abrirMenu() {
  const nav = document.getElementById("menu-lateral");
  nav.style.transition = "0.2s";
  nav.style.width = "250px";
}

function fecharMenu() {
  const nav = document.getElementById("menu-lateral");
  nav.style.width = "0px";
}
