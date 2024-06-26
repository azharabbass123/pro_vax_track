<?php 
require "views/partials/header.php";
require "views/partials/nav.php";
?>

<section
      id="hero" style="overflow-y: scroll;">
      <div class="d-flex align-items-center justify-content-center">
        <form method="POST" class="p-4 mt-4 w-50 bg-light rounded">
          <h2 class="text-center text-dark">Enter your data</h2>
          <div class="mb-3">
            <label for="username" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="username" name="name" />
            <?php  if(isset($errors['name'])) : ?>
              <p class="text-danger"><?= $errors['name'] ?></p>
              <?php endif; ?>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" />
            <?php  if(isset($errors['email'])) : ?>
              <p class="text-danger"><?= $errors['email'] ?></p>
              <?php endif; ?>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="date" />
            <?php  if(isset($errors['date'])) : ?>
                <p class="text-danger text-xs"><?= $errors['date'] ?></p>
                <?php endif; ?>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Register as:</label>
            <select
              class="form-select"
              id="role"
              name="role"
              aria-label="Default select example"
            >
              <option selected="" disabled="">select role</option>
              <?php 
              foreach ($roles as $role){
                if($role['id'] != 1){
                  echo "<option id='".$role['id']."' value='".$role['id']. "'>" .$role['name']."</option>";
                }
                
              }
              ?>
            </select>
            <?php  if(isset($errors['role'])) : ?>
              <p class="text-danger"><?= $errors['role'] ?></p>
              <?php endif; ?>
          </div>
          <div class="mb-3">
            <label for="province" class="form-label">Province</label>
            <select
              class="form-select"
              id="province"
              name="province"
              aria-label="Default select example"
            >
              <option selected="" disabled="">select province</option>
              <?php 
              
              foreach ($provinces as $province){
                echo "<option id='".$province['id']."' value='".$province['id']. "'>" .$province['name']."</option>";
              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="city" class="form-label">Select your city</label>
            <select
              id="city"
              class="form-select"
              name="city"
              aria-label="Default select example"
            ></select>
            <?php  if(isset($errors['city'])) : ?>
              <p class="text-danger"><?= $errors['city'] ?></p>
              <?php endif; ?>
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" />
            <?php  if(isset($errors['password'])) : ?>
              <p class="text-danger"><?= $errors['password'] ?></p>
              <?php endif; ?>
          </div>
          
          <button type="submit" class="btn btn-primary my-3">Submit</button>
        </form>
      </div>
    </section>
  
    <?php 
    require "views/partials/bottom.php";

    ?>