<?php 
require "views/partials/header.php";
require "views/partials/nav.php";
?>

<section
      id="hero">
      <div class="d-flex align-items-center justify-content-center">
        <form method="POST" class="p-4 m-2 w-50 bg-light rounded">
          <h2 class="text-center text-dark">Update your data</h2>
          <div class="mb-3">
          <input type="hidden" name="prevUrl" id="prevUrl" value="<?=$_SERVER['HTTP_REFERER']?>">
          <input type="hidden" name="id"  id="id" value="<?=$_GET['id']?>">
            <label for="username" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="username" name="name" value="<?=$userData['name']?>"/>
            <?php  if(isset($errors['name'])) : ?>
              <p class="text-danger"><?= $errors['name'] ?></p>
              <?php endif; ?>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="date" value="<?=$userData['DOB']?>" />
            <?php  if(isset($errors['date'])) : ?>
                <p class="text-danger text-xs"><?= $errors['date'] ?></p>
                <?php endif; ?>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Role:</label>
            <select
              class="form-select"
              id="role"
              name="role"
              aria-label="Default select example"
            >
              <option selected="" disabled=""><?=($userData['role_id'] == 2) ? 'health_worker' : 'patient'?></option>
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
            
          
          <button type="submit" class="btn btn-primary my-3">Submit</button>
        </form>
      </div>
    </section>
  
    <?php 
    require "views/partials/bottom.php";

    ?>