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
  <body>
    <h1>Details</h1>
    <h2><?php echo $row->product_name; ?></h2>
    <a href="#lbox">
      <img src="images/<?php echo $row->image_name ?>.jpg" alt="product image">
    </a>
    <a href="#"></a>

  </body>
</html>
