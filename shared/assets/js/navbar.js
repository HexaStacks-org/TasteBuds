var searchInput = document.querySelector(".search-input");
var searchButton = document.querySelector(".btn-enter-search");
var recipeRadio = document.getElementById("btnradio1");
var galleryRadio = document.getElementById("btnradio2");
var primaryCategories = document.getElementsByName("flexRadioPrimary");
var secondaryCategories = document.getElementsByName("flexRadioSecondary");

function updateButtonState() {
    var isPrimarySelected = Array.from(primaryCategories).some(function (input) {
        return input.checked;
    });
    var isSecondarySelected = Array.from(secondaryCategories).some(function (input) {
        return input.checked;
    });
    var isTextEntered = searchInput.value.trim() !== "";
    searchButton.style.pointerEvents = isTextEntered && isPrimarySelected && isSecondarySelected ? "auto" : "none";
    searchButton.style.opacity = isTextEntered && isPrimarySelected && isSecondarySelected ? "1" : "0.5";
}

searchInput.addEventListener("input", updateButtonState);

[...primaryCategories, ...secondaryCategories].forEach(function (input) {
    input.addEventListener("change", updateButtonState);
});

recipeRadio.addEventListener("change", function () {
    updateButtonState();
});

galleryRadio.addEventListener("change", function () {
    updateButtonState();
});

searchButton.addEventListener("click", function (e) {
    e.preventDefault();
    var searchText = searchInput.value.trim();
    var selectedPrimary = Array.from(primaryCategories).find(function (input) {
        return input.checked;
    })?.nextElementSibling.innerText;
    var selectedSecondary = Array.from(secondaryCategories).find(function (input) {
        return input.checked;
    })?.nextElementSibling.innerText;
    var selectedMode = recipeRadio.checked ? "Recipe" : "Gallery";

    alert("Searching " + selectedMode + ' for "' + searchText + '" in ' + selectedPrimary + " (" + selectedSecondary + ")");
});

updateButtonState();