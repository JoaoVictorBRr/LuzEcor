const botao = document.getElementById("addImg");

let i = 0;

function AddImg() {

  i++;

  const input = document.createElement("input");
  input.type = "file";
  input.className = "input-item";
  input.name = `foto${i}`;
  input.id = "foto"

  document.querySelector(".input_foto").appendChild(input);
}
