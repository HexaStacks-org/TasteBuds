<div class="off-canvas d-flex justify-content-end p-3">
  <button class="btn offcanvas-button" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
    aria-controls="offcanvasNavbar">
    <h1 style="font-weight: bold;">≡</h1>
  </button>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ADMIN</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="list-unstyled">
      <li class="li"><a href="index.php" class="text">Dashboard</a></li>
      <li class="li"><a href="users.php" class="text">Users</a></li>
      <li class="li"><a href="management.php" class="text">Management</a></li>
      <li class="li">
        <a href="insightsAnalytics.php" class="text">Insights and Analytics</a>
      </li>
      <li class="li"><a href="reports.php" class="text">Reports</a></li>
      <li class="li"><a href="adminCreatePost.php" class="text">Create Content</a></li>
      <li class="li"><a href="adminEditContent.php" class="text">Edit Content</a></li>
    </ul>
    <div class="off-btn">
      <a href="../login.php" class="off-logout">
        Log Out
      </a>
    </div>
  </div>
</div>