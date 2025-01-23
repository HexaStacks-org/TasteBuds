var galleryModal = document.getElementById('deleteGalleryModal');
galleryModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget; // Button that triggered the modal
    var galleryID = button.getAttribute('data-galleryid');
    var modalInput = galleryModal.querySelector('.modal-footer #galleryID');
    modalInput.value = galleryID;
});

// Set the modal's recipeID value
var recipeModal = document.getElementById('deleteRecipeModal');
recipeModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget; // Button that triggered the modal
    var recipeID = button.getAttribute('data-recipeid');
    var modalInput = recipeModal.querySelector('.modal-footer #recipeID');
    modalInput.value = recipeID;
});