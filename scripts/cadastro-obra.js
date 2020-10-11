function Cadastrar() {
  var titulo = document.getElementById("titulo");
  var categoria = document.getElementById("nomeid");
  var duracao = document.getElementById("duracao");
  var genero = document.getElementById("genero");
  var dataLancamento = document.getElementById("dataLancamento");
  var classificacãoIndicativa = document.getElementById(
    "classificacãoIndicativa"
  );
  var enredo = document.getElementById("enredo");

  if (titulo.value == "") {
    alert("O título é obrigatório");
  }
  if (genero.value == "") {
    alert("O gênero é obrigatório");
  }
  if (enredo.value == "") {
    alert("O enredo é obrigatório");
  }
}
function showPreview(event) {
  if (event.target.files.length > 0) {
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-1-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}
