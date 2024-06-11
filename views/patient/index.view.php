<?php

require 'views/partials/header.php';
require 'views/partials/nav.php';
?>
<section
      id="hero">
      <!-- The sidebar -->
    <div class="mySidebar">
    <h3 class="text-info text-center mb-4">
        <?php echo $_SESSION['user']['userName']?>
</h3>
<hr>
      <a
          href="appointment"
          class="bg-primary text-center m-2 text-white text-decoration-none p-2 rounded"
          >Request new appointment</a
        >
    </div> 

    <!-- Page content -->
 <div class="container" id="myContainer">
      <div class="row mt-2">
        <div class="col">
          <!-- vaccination table  -->
          <div id="pvaccination_card" class="card mt-2">
            <div class="card-header">
      <h3 class="display-6 fw-bold text-center text-primary">Vaccinations Schedule</h3>
    </div>
    <div class="card-body">
      <table id="table" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
        <th class="bg-primary text-white text-center">Sr.</th>
          <th class="bg-primary text-white text-center">Patient Name</th>
          <th class="bg-primary text-white text-center">Date</th>
          <th class="bg-primary text-white text-center">Status</th>
        </tr>
        </thead>
        <tbody id="pvaccination_data">
        <?php 
              $sn = 1;
              foreach ($vaccinations as $vaccination){
                if($vaccination['patient_name'] == $_SESSION['user']['userName']){
                ?>
                <tr>
                <td> <?= $sn?></td>
                <td><?= $vaccination['patient_name'] ?></td>
                <td class="text-center"><?= $vaccination['vaccination_date'] ?></td>
                <td><?= $vaccination['vaccination_status'] ?></td>
              </tr>
              <?php
               $sn++; } }
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