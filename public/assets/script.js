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

// Récupérer le code dans le localStorage
window.onload = (event) => {
  let codeExitant = localStorage.getItem("codeExistant");
  code.textContent = codeExitant;
};

// Changer de page
let ongletAccueil = document.querySelector("#ongletAccueil");
let ongletPromotions = document.querySelector("#ongletPromotions");

let accueil = document.querySelector("#accueil");
let promotions = document.querySelector("#pomotions");

ongletPromotions.addEventListener("click", changerPage);
ongletAccueil.addEventListener("click", changerPage2);
function changerPage() {
  ongletAccueil.classList.remove("active");
  ongletPromotions.classList.add("active");
  accueil.classList.add("hidden");
  promotions.classList.remove("hidden");
}

function changerPage2() {
  ongletAccueil.classList.add("active");
  ongletPromotions.classList.remove("active");
  accueil.classList.remove("hidden");
  promotions.classList.add("hidden");
}
