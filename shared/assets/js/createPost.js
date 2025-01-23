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
});

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form[action='create-post.php']");
    const createButton = document.querySelector(".btn-create");

    form.addEventListener("submit", function (event) {
        if (!validateForm()) {
            event.preventDefault();
            alert("Please fill out all fields and make the required selections.");
        }
    });

    function validateForm() {
        const title = document.getElementById("title").value.trim();
        const description = document.getElementById("description").value.trim();
        const image = document.getElementById("image").files.length > 0;
        const primaryCategorySelected = document.querySelector('input[name="flexRadioPrimary"]:checked') !== null;
        const subCategorySelected = document.querySelector('input[name="flexRadioSecondary"]:checked') !== null;

        if (!title || !description || !image || !primaryCategorySelected) {
            return false;
        }

        const requiresSubCategory = !["flexRadioDefault4", "flexRadioDefault5"].includes(
            document.querySelector('input[name="flexRadioPrimary"]:checked').id
        );

        if (requiresSubCategory && !subCategorySelected) {
            return false;
        }

        return true;
    }
});
