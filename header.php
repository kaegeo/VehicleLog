<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vehicle Log</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
	  <div class="container-fluid">
		<a class="navbar-brand" href="index.php">Vehicle Log</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			<li class="nav-item">
			  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
			</li>
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="table_list.php?table_name=vehicle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				Vehicles
			  </a>
			  <ul class="dropdown-menu">
				<li><a class="dropdown-item" href="table_list.php?table_name=vehicle">Vehicle List</a></li>
				<li><a class="dropdown-item" href="vehicle_add.php">Add a Vehicle</a></li>
				<li><hr class="dropdown-divider"></li>
				<li><a class="dropdown-item" href="vehicle_search.php">Search/Edit Vehicles</a></li>
			  </ul>
			</li>
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="table_list.php?table_name=maintenance" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				Maintenance
			  </a>
			  <ul class="dropdown-menu">
				<li><a class="dropdown-item" href="table_list.php?table_name=maintenance">Maintenance List</a></li>
				<li><a class="dropdown-item" href="maintenance_add.php">Add Maintenance</a></li>
			  </ul>
			</li>
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="table_list.php?table_name=fuel" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				Fuel
			  </a>
			  <ul class="dropdown-menu">
				<li><a class="dropdown-item" href="table_list.php?table_name=fuel">Fuel List</a></li>
				<li><a class="dropdown-item" href="fuel_add.php">Add Fuel</a></li>
			  </ul>
			</li>
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="table_list.php?table_name=maintenance_type" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				Maintenance Types
			  </a>
			  <ul class="dropdown-menu">
				<li><a class="dropdown-item" href="table_list.php?table_name=maintenance_type">Maintenance Type List</a></li>
				<li><a class="dropdown-item" href="maintenance_type_add.php">Add a Maintenance Type</a></li>
			  </ul>
			</li>
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="table_list.php?table_name=user" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				Users
			  </a>
			  <ul class="dropdown-menu">
				<li><a class="dropdown-item" href="table_list.php?table_name=user">User List</a></li>
				<li><a class="dropdown-item" href="user_add.php">Add a User</a></li>
			  </ul>
			</li>
		  </ul>
		</div>
	  </div>
	</nav>