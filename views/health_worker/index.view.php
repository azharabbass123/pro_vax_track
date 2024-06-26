<?php

require 'views/partials/header.php';
require 'views/partials/nav.php';
?>
<section
      id="hero" style="overflow-y: scroll">
      <!-- The sidebar -->
    <div class="mySidebar">
    <h3 class="text-info text-center mb-4">
        <?php echo $_SESSION['user']['userName']?>
</h3>
<hr>
      
      <button class="myActive-button mySidebar-btn " onclick="hwappointment_card()" id="hwappointment">Appointments</button>
      <button class="mySidebar-btn" onclick="hwvaccination_card()" id="hwvaccination">Vaccination</button>
      <button class="mySidebar-btn" onclick="trackPatients_card()" id="trackPatients">Track Patients</button>
      <a
          href="vaccination"
          class="mySidebar-btn text-center text-decoration-none p-2 rounded"
          >Schedule new vax plan</a
        >
      <a
          href="editProfile?id=<?=$_SESSION['user']['curUserId']?>"
          class="bg-info w-50 mt-5 mx-2 text-center text-white text-decoration-none p-2 rounded"
          >Edit Profile</a>
    </div> 
 <!-- Page content -->
 <div class="container" id="myContainer">
      <div class="row mt-2">
        <t class="col">
          <!-- appointments table  -->
          <div id="hwappointment_card" class="card mt-2">
            <div class="card-header">
      <h3 class="display-6 fw-bold text-center text-primary">Appointments</h3>
    </div>
    <div class="card-body">
      <table id="table" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
        <th class="bg-primary text-white text-center">Sr.</th>
          <th class="bg-primary text-white text-center">Patient Name</th>
          <th class="bg-primary text-white text-center">Health Worker</th>
          <th class="bg-primary text-white text-center">Apt. Date</th>
          <th class="bg-primary text-white text-center">Status</th>
          <th class="bg-primary text-white text-center">Edit</th>
          <th class="bg-primary text-white text-center">Delete</th>
        </tr>
        </thead>
        <tbody id="appointment_data">
        <?php 
              $sn = 1;  
              foreach ($appointments as $appointment){
                if($appointment['health_worker_name'] == $_SESSION['user']['userName']){
                ?>
                <tr id="<?=$appointment['appointment_id']?>">
                <td> <?= $sn?></td>
                <td><?= $appointment['patient_name'] ?></td>
                <td><?= $appointment['health_worker_name'] ?></td>
                <td><?= $appointment['appointment_date'] ?></td>
                <td><?= $appointment['appointment_status'] ?></td>
                <td><a href='editAppointment?edit=<?=$appointment['appointment_id']?>' class="btn btn-sm btn-primary">Edit</a></td>
                <td><a href='#' onclick="deleteAptRec(<?=$appointment['appointment_id']?>)" class="btn btn-sm btn-danger">Delete</a></td>
              </tr>
              <?php $sn++; } }
              ?>
              
        </tbody>
      </table>
    </div>
          </div>
          <!-- vaccination table  -->
          <div id="hwvaccination_card" class="card mt-2">
            <div class="card-header">
      <h3 class="display-6 fw-bold text-center text-primary">Vaccinations Schedule</h3>
    </div>
    <div class="card-body">
      <table id="table" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
        <th class="bg-primary text-white text-center">Sr.</th>
          <th class="bg-primary text-white text-center">Patient Name</th>
          <th class="bg-primary text-white text-center">Vax. Date</th>
          <th class="bg-primary text-white text-center">Status</th>
          <th class="bg-primary text-white text-center">Edit</th>
          <th class="bg-primary text-white text-center">Delete</th>
        </tr>
        </thead>
        <tbody id="vaccination_data">
        <?php 
              $sn = 1;
              foreach ($vaccinations as $vaccination){
                ?>
                <tr id="<?=$vaccination['vaccination_id']?>">
                <td> <?= $sn?></td>
                <td class="text-center"><?= $vaccination['patient_name'] ?></td>
                <td class="text-center"><?= $vaccination['vaccination_date'] ?></td>
                <td><?= $vaccination['vaccination_status'] ?></td>
                <td><a href='editVaccination?edit=<?=$vaccination['vaccination_id']?>' class="btn btn-sm btn-primary">Edit</a></td>
                <td><a href='#' onclick="deleteVaxRec(<?=$vaccination['vaccination_id']?>)" class="btn btn-sm btn-danger">Delete</a></td>
              </tr>
              <?php
               $sn++; }
              ?>
              
        </tbody>
      </table>
    </div>
          </div>

          <!-- track patients table  -->
          <div id="trackPatients_card" class="card mt-2">
            <div class="card-header">
      <h3 class="display-6 fw-bold text-center text-primary">Patient Details</h3>
    </div>
    <div class="card-body">
      <table id="table" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
          <th class="bg-primary text-white text-center">Sr.</th>
          <th class="bg-primary text-white text-center">Name</th>
          <th class="bg-primary text-white text-center">Email</th>
          <th class="bg-primary text-white text-center">City</th>
          <th class="bg-primary text-white text-center">Province</th>
          <th class="bg-primary text-white text-center">Vax date</th>
          <th class="bg-primary text-white text-center">Vax status</th>
        </tr>
        </thead>
        <tbody id="appointment_data">
        <?php 
              $sn = 1;
              foreach ($trackPatientsByProvince as $trackPatientByProvince){
                ?>
            <tr>
            <td> <?= $sn?></td>
            <td><?= $trackPatientByProvince['patient_name'] ?></td>
            <td><?= $trackPatientByProvince['patient_email'] ?></td>
            <td><?= $trackPatientByProvince['city_name'] ?></td>
            <td><?= $trackPatientByProvince['province_name'] ?></td>
            <td><?= $trackPatientByProvince['vaccination_date'] ?></td>
            <td><?= $trackPatientByProvince['vaccination_status'] ?></td>
            </tr>
              <?php 
              $sn++ ;}
              ?>
              
        </tbody>
      </table>
    </div>
          </div>
        </div>
      </div>
    </div>
    </section>
    <?php
require 'views/partials/bottom.php';