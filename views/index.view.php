<?php
require 'views/partials/header.php';
require 'views/partials/nav.php';
?>
<section
      id="hero"
      class="d-flex align-items-end pb-5"
      style="
        height: 630px;
        background-image: url(<?php echo "assets/img/heroimg.jpg" ?>);
        background-size: cover;
        background-repeat: no-repeat;
      "
    >
      <div class="container">
        <h1 class="text-primary">Welcome to Vax Tracker</h1>
        <h2 class="text-info mb-4">
          We are team of talented Docters and Health Workers
        </h2>
        <a
          href="#about"
          class="bg-primary text-white text-decoration-none p-2 rounded"
          >Get Started</a
        >
      </div>
    </section>

    <?php
    require 'views/partials/footer.php';
    ?>