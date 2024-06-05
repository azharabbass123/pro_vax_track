<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Vax Tracker</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarText"
          aria-controls="navbarText"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] === '/pro_vax_track/') ? 'active': ''; ?>" aria-current="page" href="/pro_vax_track/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] === '/pro_vax_track/admin') ? 'active': ''; ?>" href="admin">Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] === '/pro_vax_track/health_worker') ? 'active': ''; ?>" href="health_worker">Health Workers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] === '/pro_vax_track/patient') ? 'active': ''; ?>" href="patient">patient</a>
            </li>
          </ul>
          <ul class="navbar-nav me-auto ml-5 mb-2 mb-lg-0">
          <li class="nav-item">
          <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] === '/pro_vax_track/session') ? 'active': ''; ?>" href="session">login</a>
          </li>
          <li class="nav-item">
          <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] === '/pro_vax_track/register') ? 'active': ''; ?>" href="register">register</a>
          </li>
          </ul>
        </div>
      </div>
    </nav>