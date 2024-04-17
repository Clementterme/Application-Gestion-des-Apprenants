// Générer le code pour valider sa présence
const chiffres = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

const code = document.querySelector("#code");
const boutonCode = document.querySelector("#boutonCode");

boutonCode.addEventListener("click", genererCode);
function genererCode() {
  let codeGenere = "";
  for (let i = 0; i < 5; i++) {
    codeGenere += getRandomCode();
  }
  code.textContent = codeGenere;
  localStorage.setItem("codeExistant", codeGenere);

  boutonCode.removeEventListener("click", genererCode);
  boutonCode.classList.remove("btn-primary");
  boutonCode.classList.add("btn-warning");

  boutonCode.textContent = "";
  boutonCode.textContent = "Signatures en cours";
}

function getRandomNumber(arraySize) {
  return Math.floor(Math.random() * arraySize);
}

function getRandomCode() {
  return chiffres[getRandomNumber(chiffres.length)];
}

// Récupérer le code depuis le localStorage au chargement de la page
window.onload = (event) => {
  let codeExitant = localStorage.getItem("codeExistant");
  code.textContent = codeExitant;
};

// Changer de page
let ongletAccueil = document.querySelector("#ongletAccueil");
let ongletPromotions = document.querySelector("#ongletPromotions");
let ajouterPromo = document.querySelector("#ajouterPromo");
let retourCreationPromo = document.querySelector("#retourCreationPromo");

let accueil = document.querySelector("#accueil");
let promotions = document.querySelector("#pomotions");
let creationPromo = document.querySelector("#creationPromo");

ongletPromotions.addEventListener("click", changerPage);
ongletAccueil.addEventListener("click", changerPage2);
ajouterPromo.addEventListener("click", changerPage3);
retourCreationPromo.addEventListener("click", changerPage);

// Page toutes les promotions
function changerPage() {
  ongletAccueil.classList.remove("active");
  ongletPromotions.classList.add("active");
  accueil.classList.add("hidden");
  promotions.classList.remove("hidden");
  creationPromo.classList.add("hidden");
}

function changerPage2() {
  ongletAccueil.classList.add("active");
  ongletPromotions.classList.remove("active");
  accueil.classList.remove("hidden");
  promotions.classList.add("hidden");
  creationPromo.classList.add("hidden");
}

// Page ajout promotion
function changerPage3() {
  creationPromo.classList.remove("hidden");
  promotions.classList.add("hidden");
}

function changerPage4() {
  creationPromo.classList.add("hidden");
  promotions.classList.remove("hidden");
}

// Requête AJAX
const sauvegarderCreationPromo = document.querySelector("#sauvegarderCreationPromo");
const body = document.getElementById("body");

const inputNomPromo = document.getElementById("nomPromo");
const inputDateDebut = document.getElementById("dateDebut");
const inputDateFin = document.getElementById("dateFin");
const inputPlaces = document.getElementById("places");

if (sauvegarderCreationPromo) {
  sauvegarderCreationPromo.addEventListener("click", handleFormSubmission);
}

function handleFormSubmission(event) {
  event.preventDefault();

  const inputNomPromoValue = inputNomPromo.value;
  const inputDateDebutValue = inputDateDebut.value;
  const inputDateFinValue = inputDateFin.value;
  const inputPlacesValue = inputPlaces.value;

  const url = "/dashboardFormateur";

  const user = {
    Nom: inputNomPromoValue,
    Date_debut: inputDateDebutValue,
    Date_Fin: inputDateFinValue,
    Places: inputPlacesValue,
  };

  fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(user),
  }).then((response) => {
    return response.text();
  }).then((result) => {
    body.innerHTML = ''
    body.innerHTML = result
  });
}

