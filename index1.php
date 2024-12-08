<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New Glasses Store</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="icon" href="./assets/img/logo.png" type="jpg/png" />
  </head>
  <body>
    <header>
      <div class="brand-name">
        <img
          src="./assets/img/logo_brand.png"
          alt="Brand Logo"
          class="brand-logo"
        />
      </div>
      <nav>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#best-sale">Best Sale</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="./pages/login.php">Login</a></li>
        </ul>
      </nav>
    </header>
    <hr class="divider" />
    <main>
      <div class="image-card full-width">
        <img src="./assets/img/about-us-page-heading.jpg" alt="Product 1" />
      </div>
      <div class="image-grid">
        <div class="image-card half-width">
          <img src="./assets/img/single-product-01.jpg" alt="Product 2" />
        </div>
        <div class="image-card half-width">
          <img src="./assets/img/single-product-02.jpg" alt="Product 3" />
        </div>
      </div>

      <!-- Konten Best Sale -->
      <section class="best-sale" id="best-sale">
        <h2>Best Sale</h2>
        <div class="product-grid" id="product-grid"></div>
      </section>
    </main>

    <script src="./data/products.js"></script>
    <script src="./assets/js/main.js"></script>
  </body>
</html>
