// Set the recipeID in the modal
document.querySelectorAll('[data-recipeid]').forEach(button => {
    button.addEventListener('click', function () {
        const recipeID = this.getAttribute('data-recipeid');
        document.getElementById('recipeID').value = recipeID;
    });
});

// Set the gallery post ID in the modal
document.querySelectorAll('[data-galleryid]').forEach(button => {
    button.addEventListener('click', function () {
        const galleryID = this.getAttribute('data-galleryid');
        document.getElementById('galleryID').value = galleryID;
    });
});
