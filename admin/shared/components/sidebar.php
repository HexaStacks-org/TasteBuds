<div class="col-md-4 col-lg-2 sidebar">
    <div class="sidebar-inner">

        <div class="img-holder">
            <img src="shared/assets/logo/Logo Combination 2.png" alt="" />
        </div>

        <div class="sidebar-btn-holder" id="btnHolder"></div>

        <div class="container logout-holder">
            <button class="btn-logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                    <path fill-rule="evenodd"
                        d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                </svg>
                Log out
            </button>
        </div>
    </div>
</div>

<script>
    const sideBarBtns = ["Dashboard", "Users", "Management", "Insights & analytics", "Reports", "Post"];
    const hrefs = ["dashboard.php", "users.php", "management.php", "insightsAnalytics.php", "reports.php", "adminCreatePost.php"];

    const getCurrentPage = (url) => url.split("/").pop();

    // Function to highlight the current page button
    const highlightCurrentPage = (buttons, hrefs, currentPage) => {
        buttons.forEach((button, index) => {
            if (hrefs[index] === currentPage) {
                button.classList.add("active");
            } else {
                button.classList.remove("active");
            }
        });
    };

    // Generate the sidebar buttons
    const btnHolder = document.getElementById("btnHolder");
    sideBarBtns.forEach(function (btnNames, i) {
        btnHolder.innerHTML +=
            '<div class="col d-flex flex-column">' +
            '<a href="' + hrefs[i] + '">' +
            '<button class="button" id="btnHighlight' + i + '">' +
            btnNames +
            '</button>' +
            '</a>' +
            '</div>';
    });

    // Get the current page
    const currentPage = getCurrentPage(window.location.pathname);

    // Highlight the button for the current page
    document.addEventListener("DOMContentLoaded", () => {
        const buttons = document.querySelectorAll(".button");
        highlightCurrentPage(buttons, hrefs, currentPage);
    });
</script>