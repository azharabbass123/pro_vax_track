<?php
require "views/partials/header.php";
require "views/partials/nav.php";
require 'model/getRoles.php';
?>

<section
      id="hero" style="overflow-y: scroll;">
      <div class="d-flex mt-3 align-items-center justify-content-center">
        <form method="POST" class="p-5 mx-5 w-50 bg-light rounded">
          <h2 class="text-center text-primary">Login</h2>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input
              type="email"
              class="form-control"
              name="email"
              id="email"
              value="<?= old('email') ?>"
              aria-describedby="emailHelp"
            />
            <?php  if(isset($errors['email'])) : ?>
                <p class="text-danger text-xs mt-2"><?= $errors['email'] ?></p>
                <?php endif; ?>
            <div id="emailHelp" class="form-text">
              We'll never share your email with anyone else.
            </div>
          </div>
          <div class="mb-5">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" />
            <?php  if(isset($errors['password'])) : ?>
              <p class="text-danger  mt-2"><?= $errors['password'] ?></p>
              <?php endif; ?>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Login as:</label>
            <select
              class="form-select"
              id="role"
              name="role"
              aria-label="Default select example"
            >
              <option selected="" disabled="">select role</option>
              <?php 
              $roles = loadRole();
              foreach ($roles as $role){
                  echo "<option id='".$role['id']."' value='".$role['id']. "'>" .$role['name']."</option>"; 
              }
              ?>
            </select>
            <?php  if(isset($errors['role'])) : ?>
              <p class="text-danger"><?= $errors['role'] ?></p>
              <?php endif; ?>
          </div>
          <button type="submit" class="btn btn-primary my-3">Submit</button>
          <?php  if(isset($errors['misMatch'])) : ?>
              <p class="text-danger text-xs mt-2"><?= $errors['misMatch'] ?></p>
              <?php endif; ?>
          <p>
            Did not have account, register
            <a href="register">here</a>
          </p>
        </form>
      </div>
    </section>

    <?php 
    require "views/partials/bottom.php";