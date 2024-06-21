<?php

require 'views/partials/header.php';
require 'views/partials/nav.php';
?>

<section class="hero">
 
<!-- sidebar  -->
<div class="mySidebar">
    </div> 

<!-- Page content -->
<div class="container" id="myContainer">
      <div class="row mt-2">
        <div class="col">
<!-- appointments table  -->
<div id="patient_details" class="card mt-2">
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