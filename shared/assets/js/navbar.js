document.addEventListener("DOMContentLoaded", function () {
    const primaryCategoryRadios = document.querySelectorAll('input[name="flexRadioPrimary"]');
    const subCategoryRadios = document.querySelectorAll('input[name="flexRadioSecondary"]');

    function toggleSubCategories(disabled) {
        subCategoryRadios.forEach(radio => {
            radio.disabled = disabled;
            if (disabled) {
                radio.checked = false;
            }
        });
    }

    primaryCategoryRadios.forEach(radio => {
        radio.addEventListener("change", function () {
            if (radio.id === "flexRadioDefault4" || radio.id === "flexRadioDefault5") {
                toggleSubCategories(true);
            } else {
                toggleSubCategories(false);
            }
        });
    });

    var searchInput = document.querySelector(".search-input");
    var searchButton = document.querySelector(".btn-enter-search");
    var recipeRadio = document.getElementById("btnradio1");
    var galleryRadio = document.getElementById("btnradio2");
    var primaryCategories = document.getElementsByName("flexRadioPrimary");
    var secondaryCategories = document.getElementsByName("flexRadioSecondary");

    var orderByOptions = document.getElementsByName("orderByOption");

    function updateButtonState() {
        searchButton.style.pointerEvents = "auto";
        searchButton.style.opacity = "1";
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

    orderByOptions.forEach(function (radio) {
        radio.addEventListener("change", updateButtonState);
    });

    searchButton.addEventListener("click", function (e) {
        e.preventDefault();

        var searchText = searchInput.value.trim();

        var selectedPrimary = Array.from(primaryCategories).find(function (input) {
            return input.checked;
        })?.nextElementSibling?.innerText || "";

        var selectedSecondary = Array.from(secondaryCategories).find(function (input) {
            return input.checked;
        })?.nextElementSibling?.innerText || "";

        var selectedMode = recipeRadio?.checked ? "Recipe" : (galleryRadio?.checked ? "Gallery" : "");

        var selectedOrderBy = "";
        var selectedOrderByRadio = Array.from(orderByOptions).find(radio => radio.checked);
        if (selectedOrderByRadio) {
            selectedOrderBy = selectedOrderByRadio.value;
        }

        var query = new URLSearchParams({
            searchText: searchText,
            primaryCategory: selectedPrimary,
            secondaryCategory: selectedSecondary,
            orderBy: selectedOrderBy
        }).toString();

        var resultPage = selectedMode == "Gallery" ? "galleryResult.php" : "recipeResult.php";
        window.location.href = resultPage + "?" + query;
    });

    updateButtonState();
});