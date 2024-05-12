<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
	
</head>
<body>
        
        @extends('master.master')
        @section('content')
        <section class="shop-section">
      <div class="shop-images">
        <div class="shop-link">
          <h3>Shop Laptops &amp; Tables</h3>
          <img src="images/img-1.png" alt="card">
          <a href="#">Shop now</a>
        </div>
        <div class="shop-link">
          <h3>Shop Smartwatches</h3>
          <img src="images/img-2.png" alt="card">
          <a href="#">Shop now</a>
        </div>
        <div class="shop-link">
          <h3>Create with Strip Lights</h3>
          <img src="images/img-3.png" alt="card">
          <a href="#">Shop now</a>
        </div>
        <div class="shop-link">
          <h3>Home Refresh Ideas</h3>
          <img src="images/img-4.png" alt="card">
          <a href="#">Shop now</a>
        </div>
      </div>
    </section>
        @endsection
</body>
</html>