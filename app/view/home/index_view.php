<?php 
require_once('./app/config/Database.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>WEB MOBILE</title>
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MOBILE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?c=login">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-danger" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="row container-fluid pt-3">
  <div class="col-lg-3">
    <div class="card" style="width: 20rem;">
      <div class="card-header bg-primary text-white" style="text-align: center;">
        Menu
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">An item</li>
        <li class="list-group-item">A second item</li>
        <li class="list-group-item">A third item</li>
        <li class="list-group-item">A third item</li>
        <li class="list-group-item">A third item</li>
        <li class="list-group-item">A third item</li>
      </ul>
   </div>
  </div>
  <div class="col-lg-9">
     <img src="public/image/bannerMobile.jpg" class="img-fluid" alt="...">
     <div class="pt-2">
       <div class="card-header bg-primary text-white" style="text-align: center;">
        Sản phẩm mới nhất
      </div>
     </div>
      
  </div>
</div>

<div class="row container-fluid pt-5">
   <?php foreach($brands as $key =>$item): ?>
	 <div class="col-lg-3">
		<div class="card">
    <img src="..." class="card-img-top" alt="..."><!-- // logo -->
    <div class="card-body">
      <h5 class="card-title"><?= $item['name'];?></h5><!-- // tên sp -->
      <p class="card-text"><?= $item['description']; ?></p> <!-- description -->
      <p class="card-text"><small class="text-muted"><?= $item['address']; ?></small></p><!--  address -->
    </div>
  </div>
	</div>
	<div class="col-lg-3">
		<div class="card">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
	</div>
	<div class="col-lg-3">
		<div class="card">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
	</div>
  <div class="col-lg-3">
    <div class="card">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  </div>
    <?php endforeach ; ?>
</div>
</body>
</html>