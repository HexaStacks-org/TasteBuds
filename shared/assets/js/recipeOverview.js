function openTab(evt, tabName) {
    // Hide all tab contents
    const tabContents = document.getElementsByClassName("tab-content");
    for (let i = 0; i < tabContents.length; i++) {
      tabContents[i].style.display = "none";
    }
  
    // Remove the 'active' class from all tab links
    const tabLinks = document.getElementsByClassName("tablink");
    for (let i = 0; i < tabLinks.length; i++) {
      tabLinks[i].classList.remove("active");
    }
  
    // Show the selected tab and mark the link as active
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.classList.add("active");
  }
  
  // Automatically click the first tab on page load
  document.addEventListener("DOMContentLoaded", function () {
    const firstTab = document.querySelector(".tablink");
    if (firstTab) {
      firstTab.click();
    }
  });
  
// Get all buttons
const buttons = document.querySelectorAll('.btn-like, .btn-bookmark, .btn-report');

// Add click event listener to each button
buttons.forEach(button => {
  button.addEventListener('click', () => {
    const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
    loginModal.show();
  });
});
