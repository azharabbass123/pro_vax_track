<?php
require "views/partials/header.php";
require "views/partials/nav.php";
?>

<section
      id="hero"
      class="py-5"
      style="
        height: 700px;
        background-image: url(assets/img/heroimg.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        opacity: 0.8;
      "
    >
      <div class="d-flex align-items-center justify-content-center">
        <form class="p-5 mx-5 w-50 bg-light rounded">
          <h2 class="text-center text-primary">Login</h2>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input
              type="email"
              class="form-control"
              id="email"
              aria-describedby="emailHelp"
            />
            <div id="emailHelp" class="form-text">
              We'll never share your email with anyone else.
            </div>
          </div>
          <div class="mb-5">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" />
          </div>
          <div class="mb-3">
            <select class="form-select" aria-label="Default select example">
              <option selected>Login as</option>
              <option value="1">Patient</option>
              <option value="2">Health Worker</option>
              <option value="3">Admin</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary my-3">Submit</button>
          <p>
            Did not have account,
            <a href="#">register</a> here.
          </p>
        </form>
      </div>
    </section>

    <?php 
    require "views/partials/footer.php";