<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
      <div class="container-fluid">
        <h3 class="navbar-brand text-white bold">VAX MANAGER</h3>
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
          <ul class="navbar-nav me-auto mb-1 mb-lg-0">
            <li class="nav-item">
            </li>
          </ul>
          
          <?php if ($_SESSION['user'] ?? false) : ?>
                <div class="ml-3 mt-2">
                <form action="session" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="bg-transparent text-white rounded">Log Out</button>
                  </form>
            </div>
              <?php else: ?>
                <ul class="navbar-nav ml-5 mb-2 mb-lg-0">
          <li class="nav-item">
          <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] === '/pro_vax_track/session') ? 'active': ''; ?>" href="session">Sign In</a>
          </li>
          <li class="nav-item">
          <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] === '/pro_vax_track/register') ? 'active': ''; ?>" href="register">Register</a>
          </li>
          </ul>
                  <?php endif; ?>
          
          
        </div>
      </div>
    </nav>