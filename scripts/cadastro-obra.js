function Cadastrar() {

    var titulo = document.getElementById("titulo");
    var categoria = document.getElementById("nomeid");
    var duracao = document.getElementById("duracao");
    var genero = document.getElementById("genero");
    var dataLancamento = document.getElementById("dataLancamento");
    var classificacãoIndicativa = document.getElementById("classificacãoIndicativa");
    var enredo = document.getElementById("enredo");
    

    if (titulo.value == "") {
        alert('O título é obrigatório');
    }    
    if (genero.value == "") {
        alert('O gênero é obrigatório');
    }
    if (enredo.value == "") {
        alert('O enredo é obrigatório');
    }

}

function upload() {

    // const file = document.getElementById("imagemObra");
    // console.log(file)
    // const fileReader = new FileReader();
    // fileReader.onload = function() {
    //     console.log(fileReader.result);
    // }
    // fileReader.readAsDataURL(file)
}