<?php 
require 'views/partials/header.php';
require 'views/partials/nav.php';
?>

<section id="appointment" class="mt-5">

      <!-- Section Title -->
      <div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2>Appointment</h2>
        <p>Update appointment schedule</p>
      </div><!-- End Section Title -->

      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

        <form method="POST">
          <div class="row">
          <input type="hidden" name="_method" value="PATCH">
          <input type="hidden" name="id" value="<?php echo $id ?>">
          <input type="hidden" name="prevUrl" id="prevUrl" value="<?=$_SERVER['HTTP_REFERER']?>">
            <div class="col-md-4 form-group mt-3">
            <label for="name">Patient Name</label>
             <input class="form-control" type="text" name="name" id="name" value="<?=$patientName?>" disabled>
             </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
            <label for="date">Appointment date</label>
              <input type="date" name="date" id="date" class="form-control datepicker" id="date" placeholder="Appointment Date" required="" value="<?=$appointmentDate?>">
              <?php  if(isset($errors['date'])) : ?>
                <p class="text-danger text-xs"><?= $errors['date'] ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-4 form-group mt-3">
            <label for="hw">Health worker</label>
              <select name="health_worker" id="hw" class="form-select" required="">
                <?php 
              foreach ($healthWorkers as $healthWorker){
                if ($healthWorker['name'] == $healthWorkerName) {
                  echo "<option id='" . $healthWorker['id'] . "' value='" . $healthWorker['id'] . "' selected='selected'>" . $healthWorker['name'] . "</option>";
              }
              }
              ?>
              </select>
              <?php  if(isset($errors['health_worker'])) : ?>
                <p class="text-danger text-xs"><?= $errors['health_worker'] ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-4 form-group my-3 ">
              <label for="status">Appointment status</label>
              <select
              class="form-select"
              id="status"
              name="status"
            >
              <option select=""><?php echo ($appointmentStatus != 'schedule') ? 'done' : 'schedule'; ?></option>
              <option><?php echo ($appointmentStatus == 'schedule') ? 'done' : 'schedule'; ?></option>
            </select>
             </div>
          </div>
          </div>
          <div class="text-center m-5"><button class="btn bg-primary" type="submit">Update Schedule</button></div>
        </form>

      </div>

    </section>

<?php
require 'views/partials/bottom.php';