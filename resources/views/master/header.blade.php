<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amazon Website Clone | CodingNepal</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Open Sans", sans-serif;
}

html {
  scroll-behavior: smooth;
}

a {
  text-decoration: none;
  color: #fff;
}

a:hover {
  color: #ddd;
}

/* Header or Navbar */
header {
  width: 100%;
  background-color: #0f1111;
}

.navbar {
  height: 60px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  cursor: pointer;
  color: #fff;
  max-width: 1280px;
  margin: 0 auto;
}

.nav-logo img {
  margin-top: 10px;
  width: 128px;
}

.address .deliver {
  margin-left: 20px;
  font-size: 0.75rem;
  color: #ccc;
}

.address .map-icon {
  display: flex;
  align-items: center;
}


.nav-search {
  display: flex;
  justify-content: space-evenly;
  max-width: 620px;
  width: 100%;
  height: 40px;
  border-radius: 4px;
}

.select-search {
  background: #f3f3f3;
  width: 50px;
  text-align: center;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
  border: none;
}

.search-input {
  max-width: 600px;
  width: 100%;
  font-size: 1rem;
  border: none;
  outline: none;
  padding-left: 10px;
}

.search-icon {
  max-width: 45px;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 1.2rem;
  background: #febd68;
  color: #000;
  cursor: pointer;
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}

.sign-in p,
.returns p {
  font-size: 0.75rem;
}

.sign-in,
.returns span {
  font-size: 0.875rem;
  font-weight: 600;
}

.cart {
  display: flex;
}

.cart .cart-icon {
  font-size: 2.5rem
}

.cart p {
  margin-top: 20px;
  font-weight: 500;
}

.banner {
  padding: 10px 20px;
  background: #222f3d;
  color: #fff;
  font-size: 0.875rem;
}

.banner-content {
  margin: 0 auto;
  max-width: 1280px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.panel {
  max-width: 1280px;
  display: flex;
  align-items: center;
  gap: 5px;
  cursor: pointer;
}

.panel span {
  margin-right: 7px;
}

.links {
  display: flex;
  align-items: center;
  list-style: none;
  gap: 15px;
  flex-grow: 1;
  margin-left: 15px;
}

.links a {
  padding: 10px 0;
}

.deals a {
  font-size: 0.9rem;
  font-weight: 500;
  white-space: nowrap;
}

/* Hero Section */
.hero-section {
  height: 400px;
  background-image: url("images/hero-img.jpg");
  background-position: center;
  background-size: cover;
}

/* Shop Section */
.shop-section {
  display: flex;
  align-items: center;
  flex-direction: column;
  background-color: #f3f3f3;
  padding: 50px 0;
}

.shop-images {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 40px;
  max-width: 1280px;
  width: 100%;
}

.shop-link {
  background-color: #fff;
  padding: 30px;
  display: flex;
  cursor: pointer;
  flex-direction: column;
  white-space: nowrap;
}


.shop-link img {
  width: 100%;
  height: 280px;
  object-fit: cover;
  margin-bottom: 10px;
}

.shop-link h3 {
  margin-bottom: 10px;
}

.shop-link a {
  display: inline-block;
  margin-top: 10px;
  font-size: 0.9rem;
  color: blue;
  font-weight: 500;
  transition: color 0.3s ease;
}

.shop-link:hover a {
  color: #c7511f;
  text-decoration: underline;
}

/* Footer */
.footer-title {
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #37475a;
  color: #fff;
  font-size: 0.875rem;
  font-weight: 600;
  height: 60px;
}

.footer-items {
  display: flex;
  justify-content: space-evenly;
  width: 100%;
  margin: 0 auto;
  background: #232f3e;
}

.footer-items h3 {
  font-size: 1rem;
  font-weight: 500;
  color: #fff;
  margin: 20px 0 10px 0;
}

.footer-items ul {
  list-style: none;
  margin-bottom: 20px;
}

.footer-items li a {
  color: #ddd;
  font-size: 0.875rem;
}

.footer-items li a:hover {
  text-decoration: underline;
}

</style>
<body>
    <header>
      <nav class="navbar">
        <div class="nav-logo">
          <a href="#"><img src="images/amazon_logo.png" alt="logo"></a>
        </div>
        <div class="address">
          <a href="#" class="deliver">Deliver</a>
          <div class="map-icon">
            <span class="material-symbols-outlined">location_on</span>
            <a href="#" class="location">Nepal</a>
          </div>
        </div>

        <div class="nav-search">
          <select class="select-search">
            <option>All</option>
            <option>All Categories</option>
            <option>Amazon Devices</option>
          </select>
          <input type="text" placeholder="Search Amazon" class="search-input">
          <div class="search-icon">
            <span class="material-symbols-outlined">search</span>
          </div>
        </div>

        <div class="sign-in">
         <a href="#"> <p>Hello, sign in</p>
          <span>Account &amp; Lists</span></a>
        </div>

        <div class="returns">
          <a href="#"><p>Returns</p>
            <span>&amp; Orders</span></a>
        </div>

        <div class="cart">
          <a href="#">
            <span class="material-symbols-outlined cart-icon">shopping_cart</span>
            </a>
            <p>Cart</p>
        </div>
      </nav>
      
      <div class="banner">
        <div class="banner-content">
          <div class="panel">
            <span class="material-symbols-outlined">menu</span>
            <a href="#">All</a>
          </div>
  
          <ul class="links">
            <li><a href="#">Today's Deals</a></li>
            <li><a href="#">Customer Service</a></li>
            <li><a href="#">Registry</a></li>
            <li><a href="#">Gift Cards</a></li>
            <li><a href="#">Sell</a></li>
          </ul>
          <div class="deals">
            <a href="#">Shop deals in Electronics</a>
          </div>
        </div>
      </div>
    </header>

    

   
</body>
</html>