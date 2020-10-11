function carregarCards() {
  var container = document.getElementById("page-consulta-obras");

  for (var i = 0; i < lista.length; i++) {
    var card = document.createElement("div");
    card.classList.add("card");

    var img = document.createElement("img");
    card.appendChild(img);

    var cardContainer = document.createElement("div");
    cardContainer.classList.add("card-container");
    card.appendChild(cardContainer);

    var cardTitulo = document.createElement("div");
    cardTitulo.classList.add("card-titulo");
    cardTitulo.innerHTML = lista[i];
    cardContainer.appendChild(cardTitulo);

    var a = document.createElement("a");
    a.classList.add("cardLink");
    a.href = "obra.html";

    a.appendChild(card);

    container.appendChild(a);
  }
}

function carregarCardsHome() {
  var container = document.getElementById("consulta-obras");

  for (var i = 0; i < 3; i++) {
    console.log("5r");
    console.log(lista[i]);
    var card = document.createElement("div");
    card.classList.add("card");

    var img = document.createElement("img");
    card.appendChild(img);

    var cardContainer = document.createElement("div");
    cardContainer.classList.add("card-container");
    card.appendChild(cardContainer);

    var cardTitulo = document.createElement("div");
    cardTitulo.classList.add("card-titulo");
    cardTitulo.innerHTML = lista[i];
    cardContainer.appendChild(cardTitulo);

    container.appendChild(card);
  }
}

function redirectToCards() {
  window.location.href = "consulta-obras.html";
}

const lista = [
  "TEnet",
  "teste",
  "TEnet",
  "teste",
  "TEnet",
  "teste",
  "TEnet",
  "teste",
  "TEnet",
  "teste",
  "TEnet",
  "teste",
  "TEnet",
  "teste",
  "TEnet",
  "teste",
  "TEnet",
  "teste",
  "TEnet",
  "teste",
  "outro",
];
