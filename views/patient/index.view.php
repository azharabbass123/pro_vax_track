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
        <h1>Welcome to PRO VAX</h1>
        <h2 class=" mb-4">
          Patient Dashboard
        </h2>
        <a
          href="appointment"
          class="bg-primary text-white text-decoration-none p-2 rounded"
          >Make new appointment</a
        >
      </div>
    </section>
    <?php
require 'views/partials/bottom.php';