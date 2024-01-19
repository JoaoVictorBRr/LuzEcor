const botao = document.getElementById("addImg");

let i = 1;

function AddImg() {

  i++;
  // Verificação se ID do input ja existe
  let id = 0;
  for(let j = 0; j < i;  j++){
  if(!document.querySelector(`[name="foto-${j}"]`)){

    id = j;
    break;
  }
  }
  //////////////

  const label = document.createElement("label");
  let idLabel = `foto-${id}`;
  label.setAttribute("for", idLabel);

  const input = document.createElement("input");
  input.type = "file";
  input.className = "input-item arquivo";
  input.name = `foto-${id}`;
  input.id = `foto-${id}`;

  const btnRemove = document.createElement("button");
  btnRemove.name = `removeBtn`;
  btnRemove.className = `removeBtn`;
  btnRemove.textContent = "X";

  btnRemove.addEventListener('click', ()=>{
    i--;
    input.remove();
    btnRemove.remove();
    label.remove();

  })
  document.querySelector(".input_foto").append(label ,input, btnRemove);
}

