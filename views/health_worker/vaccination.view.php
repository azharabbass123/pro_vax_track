<?php 
require 'views/partials/header.php';
require 'views/partials/nav.php';
require 'model/getPatient.php';
?>

<section id="appointment" class="mt-5">

      <!-- Section Title -->
      <div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2>Vaccination Schedule</h2>
        <p>Create new vaccination schedule for available patient</p>
      </div><!-- End Section Title -->

      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

        <form method="POST">
          <div class="row">
            <div class="col-md-4 form-group mt-3">
            <label for="name">Health Worker Name</label>
             <input class="form-control" type="text" name="name" id="name" value="<?php echo $_SESSION['user']['userName']?>" disabled>
             </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
            <label for="date">Vaccination date</label>
              <input type="date" name="date" id="date" class="form-control datepicker" id="date" placeholder="Appointment Date" required="">
              <?php  if(isset($errors['date'])) : ?>
                <p class="text-danger text-xs"><?= $errors['date'] ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-4 form-group mt-3">
            <label for="patient">Patient</label>
              <select name="patient" id="patient" class="form-select" required="">
                <option selected="" disabled="">Select Patient</option>
                <?php 
              $patients = loadPatient();
              foreach ($patients as $patient){
                echo "<option id='".$patient['id']."' value='".$patient['id']. "'>" .$patient['name']."</option>";
              }
              ?>
              </select>
              <?php  if(isset($errors['patient'])) : ?>
                <p class="text-danger text-xs"><?= $errors['patient'] ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-4 form-group my-3 ">
              <label for="status">Vaccination status</label>
             <input class="form-control" type="text" name="status" id="status" value="schedule">
             </div>
          </div>
          </div>

          <!-- <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
          </div> -->
          <!-- <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
          </div> -->
          <div class="text-center m-5"><button class="btn bg-primary" type="submit">Create Schedule</button></div>
        </form>

      </div>

    </section>

<?php
require 'views/partials/bottom.php';