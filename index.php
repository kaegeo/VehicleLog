<?php include "./header.php"; ?>
<br><br><br>
<div class="container text-center">
  <div class="row align-items-start">
    <div class="col">
      <div class="list-group">
          <li class="list-group-item active" aria-current="true" style="font-size:175%;">Vehicles</li>
          <a href="table_list.php?table_name=vehicle" class="list-group-item list-group-item-action">Vehicle List</a>
          <a href="vehicle_add.php" class="list-group-item list-group-item-action">Add a Vehicle</a>
          <a href="vehicle_search.php" class="list-group-item list-group-item-action">Search Vehicles</a>
      </div>
    </div>
    <div class="col">
      <div class="list-group">
          <li class="list-group-item active" aria-current="true" style="font-size:175%;">Maintenance</li>
          <a href="table_list.php?table_name=maintenance" class="list-group-item list-group-item-action">Maintenance List</a>
          <a href="maintenance_add.php" class="list-group-item list-group-item-action">Add Maintenance</a>
          <a href="table_list.php?table_name=maintenance_type" class="list-group-item list-group-item-action">Maintenance Type List</a>
          <a href="maintenance_type_add.php" class="list-group-item list-group-item-action">Add Maintenance Type</a>
      </div>  
    </div>
    <div class="col">
      <div class="list-group">
          <li class="list-group-item active" aria-current="true" style="font-size:175%;">Fuel</li>
          <a href="table_list.php?table_name=fuel" class="list-group-item list-group-item-action">Fuel List</a>
          <a href="fuel_add.php" class="list-group-item list-group-item-action">Add Fuel</a>
      </div> 
    </div>
  </div>
</div>


<?php include "./footer.php"; ?>