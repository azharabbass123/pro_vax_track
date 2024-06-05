<?php 
require "views/partials/header.php";
require "views/partials/nav.php";
?>

<section
      id="hero"
      class="py-4"
      style="
        height: 850px;
        background-image: url(assets/img/heroimg.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        opacity: 0.7;
      "
    >
      <div class="d-flex align-items-center justify-content-center">
        <form class="p-4 mx-2 w-50 bg-light rounded">
          <h2 class="text-center text-dark">Enter your data</h2>
          <div class="mb-5">
            <label for="username" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="username" />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" />
          </div>
          <div class="mb-5">
            <label for="role" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" />
          </div>
          <div class="mb-5">
            <input
              type="hidden"
              class="form-control"
              id="role"
              value="pateint"
            />
          </div>
          <div class="mb-5">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" />
          </div>
          <div class="mb-3">
            <label for="province" class="form-label">Province</label>
            <select
              class="form-select"
              id="province"
              aria-label="Default select example"
            >
              <option selected>Punjab</option>
              <option value="2">KPK</option>
              <option value="3">Sindh</option>
              <option value="3">Balochistan</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <select
              id="city"
              class="form-select"
              aria-label="Default select example"
            ></select>
          </div>
          <button type="submit" class="btn btn-primary my-3">Submit</button>
        </form>
      </div>
    </section>

    <?php 
    require "views/partials/footer.php";

    ?>