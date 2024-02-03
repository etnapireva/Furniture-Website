<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="produktet.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produktet</title>
  <link rel="stylesheet" href="produktet.css">

  

  <style>

body{
  background: rgb(244,239,230);
background: linear-gradient(0deg, rgba(244,239,230,1) 0%, rgba(244,239,230,1) 31%, rgba(244,239,230,1) 100%);
}

.product-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around; 
  max-width: 1200px; 
  margin: 0 auto; 
}

.product {
  width: 30%; 
  margin: 10px; 
  text-align: center;
}

.product img {
  max-width: 100%;
  height: 200px; 
  object-fit: cover;
}
.buy-button {
  display: block;
  padding: 8px 16px;
  margin-top: 10px;
  text-align: center;
  text-decoration: none;
  background-color: #DEB887;
  color: #fff;
  border-radius: 4px;
}

.buy-button:hover {
  background-color: #CD853F;
}




  </style>
</head>

<?php

include 'header.php';

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "limon";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function __destruct() {
        $this->conn->close();
    }
}

?>

<body>
  <header>
    <h1>Produktet</h1>
  </header>
  <div class="product-container">
  <?php
  $database = new Database();
  $product = new Product($database);
  $product->displayProducts();
  ?>
  <?php

  class Product {
      private $database;
  
      public function __construct(Database $database) {
          $this->database = $database;
      }
  
      public function displayProducts() {
          $sql = "SELECT product_id, price, image_path, description FROM products";
          $result = $this->database->conn->query($sql);
  
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  $this->displayProduct($row);
              }
          } else {
              echo "Nuk ka produkte në bazën e të dhënave.";
          }
      }
  
      private function displayProduct($row) {
          echo '<div class="product" id="' . $row["product_id"] . '">';
          echo '<img src="' . $row["image_path"] . '" alt=" ">';
          echo '<p>#' . $row["product_id"] . '</p>';
          echo '<p>"' . $row["description"] . '"</p>';
          echo '<a href="kontakti.php" class="buy-button">BLEJ</a>';
          echo '</div>';
      }
  }
  
  ?>
  
<!-- // $database = new Database();
// $sql = "SELECT product_id, price,  image_path,description FROM products";
// $result = $database->conn->query($sql);

// if ($result->num_rows > 0) {
//   while ($row = $result->fetch_assoc()) {
//     echo '<div class="product" id="' . $row["product_id"] . '">';
//     echo '<img src="' . $row["image_path"] . '" alt=" ">';
//     echo '<p>#' . $row["product_id"] . '</p>';
//     echo '<p>"' . $row["description"] . '"</p>';
//     echo '<a href="kontakti.php" class="buy-button">BLEJ</a>';
//     echo '</div>';
//   }
// } else {
//   echo "Nuk ka produkte në bazën e të dhënave.";
// } -->



</div>
</body>
  <hr>


<?php include 'footer.php';?>

</body>
</html>
