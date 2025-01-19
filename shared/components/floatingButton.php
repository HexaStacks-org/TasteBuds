<div class="floating-btn-container">
  <!-- Main Floating Button -->
  <button class="floating-btn rammetto-one" id="main-btn">+</button>

  <!-- Child Buttons -->
  <button class="child-btn open-sans-text" id="recipe-btn" onclick="location.href='createContent.php'">Recipe</button>
  <button class="child-btn open-sans-text" id="gallery-btn" onclick="location.href='gallery.php'">Gallery</button>
</div>

<script>
  // JavaScript functionality for the floating button
  const mainBtn = document.getElementById('main-btn');
  const recipeBtn = document.getElementById('recipe-btn');
  const galleryBtn = document.getElementById('gallery-btn');

  mainBtn.addEventListener('click', () => {
    recipeBtn.classList.toggle('show');
    galleryBtn.classList.toggle('show');
  });
</script>
