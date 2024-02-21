<div id="sidebar" class="d-flex flex-column bg-light ms-2 mt-3 mb-3 flex-shrink-0">
  <ul class="nav nav-pills flex-column mb-auto">
    <button id="pageAccess" class="border-0 fs-5 p-1 align-items-center text-light collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard" aria-expanded="true">Dashboard</button>
    <div class="collapse" id="dashboard">
      <li><a class="nav_bar nav-link" href="../admin/dashboard.php#analytics"><i class="fa-solid fa-arrow-right fa-2xs"></i> Analytics</a></li>
      <li><a class="nav_bar nav-link" href="../admin/dashboard.php#collection"><i class="fa-solid fa-arrow-right fa-2xs"></i> Collection</a></li>
      <li><a class="nav_bar nav-link" href="../admin/dashboard.php#userSatisfaction"><i class="fa-solid fa-arrow-right fa-2xs"></i> User Satisfaction</a></li>
    </div>

    <button id="pageAccess" class="border-0 fs-5 p-1 align-items-center text-light collapsed" data-bs-toggle="collapse" data-bs-target="#circulation" aria-expanded="false">Circulation</button>
    <div class="collapse" id="circulation">
      <li><a class="nav_bar nav-link" href="../admin/circulation.php#bookReservation"><i class="fa-solid fa-arrow-right fa-2xs"></i> Book Reservation</a></li>
      <li><a class="nav_bar nav-link" href="../admin/circulation.php#bookBorrowed"><i class="fa-solid fa-arrow-right fa-2xs"></i> Book Borrowed</a></li>
      <li><a class="nav_bar nav-link" href="../admin/circulation.php#bookTransaction"><i class="fa-solid fa-arrow-right fa-2xs"></i> Book Transaction</a></li>
    </div>

    <button id="pageAccess" class="border-0 fs-5 p-1 align-items-center text-light collapsed" data-bs-toggle="collapse" data-bs-target="#userAccounts" aria-expanded="false">User Accounts</button>
    <div class="collapse" id="userAccounts">
      <li><a class="nav_bar nav-link" href="../admin/userAccounts.php#list"><i class="fa-solid fa-arrow-right fa-2xs"></i> List</a></li>
      <li><a class="nav_bar nav-link" href="../admin/userAccounts.php#view"><i class="fa-solid fa-arrow-right fa-2xs"></i> View</a></li>
      <!-- <li><a class="nav_bar nav-link" href="../admin/userAccounts.php#profile"><i class="fa-solid fa-arrow-right fa-2xs"></i> Profile</a></li> -->
    </div>

    <button id="pageAccess" class="border-0 fs-5 p-1 align-items-center text-light collapsed" data-bs-toggle="collapse" data-bs-target="#library-pages" aria-expanded="false">Library Pages</button>
    <div class="collapse" id="library-pages">
        <li><a class="nav_bar nav-link" href="../libraryPages/opacSearch.php"><i class="fa-solid fa-arrow-right fa-2xs"></i> OPAC Search</a></li>
        <li><a class="nav_bar nav-link" href="../libraryPages/home.php"><i class="fa-solid fa-arrow-right fa-2xs"></i> Home</a></li>
        <li><a class="nav_bar nav-link" href="../libraryPages/books.php"><i class="fa-solid fa-arrow-right fa-2xs"></i> Books</a></li>
        <li><a class="nav_bar nav-link" href="../libraryPages/services.php"><i class="fa-solid fa-arrow-right fa-2xs"></i> Services</a></li>
        <li><a class="nav_bar nav-link" href="../libraryPages/acquisition.php"><i class="fa-solid fa-arrow-right fa-2xs"></i> Acquisition</a></li>
        <li><a class="nav_bar nav-link" href="../libraryPages/tutorials.php"><i class="fa-solid fa-arrow-right fa-2xs"></i> Documentation</a></li>
        <li><a class="nav_bar nav-link" href="../libraryPages/eventActivities.php"><i class="fa-solid fa-arrow-right fa-2xs"></i> Calendar of Events</a></li>
        <li><a class="nav_bar nav-link" href="../libraryPages/about.php"><i class="fa-solid fa-arrow-right fa-2xs"></i> About</a></li>
        <li><a class="nav_bar nav-link" href="../libraryPages/links.php"><i class="fa-solid fa-arrow-right fa-2xs"></i> Quick Links</a></li>
    </div>

    <!-- <button class="border-0 fs-5 align-items-center text-light collapsed" data-bs-toggle="collapse" data-bs-target="#accountSettings" aria-expanded="false">Account Settings</button>
    <div class="collapse" id="accountSettings">
      <li><a class="nav-link" href="accountSettings.php#profile"><i class="fa-solid fa-arrow-right fa-2xs"></i> Profile</a></li>
      <li><a class="nav-link" href="accountSettings.php"><i class="fa-solid fa-arrow-right fa-2xs"></i> Personal Info</a></li>
    </div> -->
  </ul>

  <ul class="nav flex-column">
    <div class="btn-group dropup">
      <button id="pageAccess" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Account Settings
      </button>
      <ul class="dropdown-menu">
        <li><a class="nav_bar nav-link" href="../admin/accountSettings.php#profile"><i class="fa-solid fa-arrow-right fa-2xs"></i> Profile</a></li>
        <li><a class="nav_bar nav-link" href="../admin/accountSettings.php#personalInfo"><i class="fa-solid fa-arrow-right fa-2xs"></i> Personal Info</a></li>

        <li class="border-top"><a id="adminLogoutBtn" class="nav-link" data-bs-toggle="modal" data-bs-target="#adminLogOut" href="logout.php"><i class="fa-solid fa-right-from-bracket fa-2xs"></i> Log out</a></li>
      </ul>
    </div>
  </ul>

</div>