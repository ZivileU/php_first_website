<?php

 $dbInfo = "mysql:host=localhost; dbname=Firt";
 $dbUser = "root";
 $dbPassword = "";
 $db = new PDO($dbInfo, $dbUser, $dbPassword);
 $title = "php orchid file";

  $sql="select * from Products";
  $result= $db->query($sql);
?>

<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <main class="pagewrap">
    <body>
    <h1>Orchids</h1>
    <article class="col">
      <?php
        while($row=$result->fetchObject()){
          echo "<div class='col-sm-12 col-md-4'>";
          echo "<h2>$row->product_name</h2>";
          echo "<p>DKK $row->product_price</p>";
          echo "<img src=images/".$row->product_image.".jpg alt='product image'>";
          echo "<br>";
          echo "<a href='product.php?product_id=$row->product_id'>Details</a>";
          echo "</div>";
        }
      ?>
    </article>
    </body>
    <br class="clear" />
    <footer>
      <a href="description.html">Technical documentation</a>
    </footer>
  </main>
</html>
