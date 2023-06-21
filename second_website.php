<!DOCTYPE html>
<html>
<head>
  <title>Your Cart</title>
  <style>
    body {
      display: flex;
      background-color:lavender;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .product-grid {
      display: grid;
      grid-template-columns: repeat(10, 1fr);
      gap: 20px;
      justify-items: center;
      align-items: center;
    }

    .product {
      display: flex;
      flex-direction: column;
      align-items: center;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .product img {
      width: 130px;
      height: 80px;
    }


    .product-price {
      color: red;
    }

    .cart-heading {
      margin-bottom: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>
<body>
  <header>
    <a href="index.html">Back to Shopping</a>
  </header>

  <section>
    <h2 class="cart-heading">My Cart</h2>
    <div class="product-grid">
      <?php

      session_start();

      $savedProducts = $_SESSION['savedProducts'] ?? [];

      if (isset($_POST['name'])) {
        $productContents = array($_POST['name'], $_POST['price'], $_POST['img']);
        $savedProducts[] = $productContents;
        $_SESSION['savedProducts'] = $savedProducts;
      }

      if (count($savedProducts) > 0) {
        foreach ($savedProducts as $product) {
          echo '<div class="product">';
          echo '<span class="product-name"><u>' . $product[0] . '</u></span>';
          echo '<div class="product-price" style="color: red;">' . $product[1] . '</div>';
          echo '<img src="' . $product[2] . '" alt="My image" />';
          echo '</div>';
        }
      } else {
        echo 'No products added to cart.';
      }
      ?>
    </div>
  </section>
</body>
</html>
