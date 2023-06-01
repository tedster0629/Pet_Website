let newUrl = "http://localhost:8000/filter-pets";

const genderSelect = document.getElementById("gender");
const typeSelect = document.getElementById("type");
const ageSelect = document.getElementById("age");
const breedSelect = document.getElementById("breed");
const coatSelect = document.getElementById("coat");
const citySelect = document.getElementById("city");

typeSelect.addEventListener("change", changedAnimalType);

genderSelect.addEventListener("change", changedFilterCriteria);
ageSelect.addEventListener("change", changedFilterCriteria);
breedSelect.addEventListener("change", changedFilterCriteria);
coatSelect.addEventListener("change", changedFilterCriteria);
citySelect.addEventListener("change", changedFilterCriteria);

let url = window.location.href;

let urlType = findFilterInUrl("type");
let urlGender = findFilterInUrl("gender");
let urlAge = findFilterInUrl("age");
let urlBreed = findFilterInUrl("breed");
let urlCoat = findFilterInUrl("coat");
let urlCity = findFilterInUrl("city");

initializeFilterBarValues();

function changedAnimalType() {
    let type = typeSelect.value;

    newUrl = `${newUrl}?type=${type}`;
    location.href = newUrl;
}

function changedFilterCriteria() {
    let type = typeSelect.value;
    let gender = genderSelect.value;
    let age = ageSelect.value;
    let coat = coatSelect.value;
    let breed = breedSelect.value.replace(" ", "%20");
    let city = citySelect.value;

    let genderQStr = "";
    let ageQStr = "";
    let breedQStr = "";
    let coatQStr = "";
    let cityQStr = "";

    if (gender != "any") {
        genderQStr = `&gender=${gender}`;
    } else {
        genderQStr = "";
    }

    if (age != "any") {
        ageQStr = `&age=${age}`;
    } else {
        ageQStr = "";
    }

    if (breed != "any") {
        breedQStr = `&breed=${breed}`;
    } else {
        breedQStr = "";
    }

    if (coat != "any") {
        coatQStr = `&coat=${coat}`;
    } else {
        coatQStr = "";
    }
    if (city != "any") {
        cityQStr = `&city=${city}`;
    } else {
        cityQStr = "";
    }

    newUrl = `${newUrl}?type=${type}&limit=100${genderQStr}${ageQStr}${breedQStr}${coatQStr}${cityQStr}`;

    location.href = newUrl;
}

function findFilterInUrl(field) {
    const initIndex = url.indexOf(field);
    if (initIndex == -1) return "";
    let endIndex = url.indexOf("&", initIndex + 1);

    endIndex = endIndex == -1 ? url.length - 1 : endIndex - 1;

    let urlFieldPart = url.substring(initIndex, endIndex + 1);

    let actualValueOfFilter = urlFieldPart.substring(
        urlFieldPart.indexOf("=") + 1
    );
    return actualValueOfFilter.replace("%20", " ");
}

function initializeFilterBarValues() {
    if (urlType != "") typeSelect.value = urlType;
    if (urlGender != "") genderSelect.value = urlGender;
    if (urlAge != "") ageSelect.value = urlAge;
    if (urlBreed != "") breedSelect.value = urlBreed;
    if (urlCoat != "") coatSelect.value = urlCoat;
    if (urlCity != "") citySelect.value = urlCity;
}
