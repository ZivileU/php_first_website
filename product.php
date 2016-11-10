<?php
    $product_id=$_GET['product_id'];
    $dbInfo = "mysql:host=localhost; dbname=Firt";
    $dbUser = "root";
    $dbPassword = "";
    $db = new PDO($dbInfo, $dbUser, $dbPassword);
    $title = "Orchids";

    if(isset($_POST['username'])){
      $username = $_POST['username'];
      $comment = $_POST['comment'];
      $sql = "insert into product_comments(product_id, username, comment, time)
        values ($product_id, '$username', '$comment', NOW())";
      $db->query($sql);
    }

    if(isset($_GET['likes'])) {
      $c_id = $_GET['c_id'];
      $sql = "update product_comments set likes=likes+1 where comment_id=$c_id";
      $db->query($sql);
    }

    if(isset($_GET['delete'])) {
      $c_id = $_GET['c_id'];
      $sql = "delete from product_comments where comment_id=$c_id";
      $db->query($sql);
    }

    $sql = "select * from Products where product_id = $product_id";
    $result = $db->query($sql);
    $row = $result->fetchObject();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
  <link href="bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

  <body>
    <h1><?php echo $row->product_name; ?></h1>
    <p><?php echo $row->product_description; ?></p>
    <img src="images/<?php echo $row->product_image.'.jpg'; ?>" alt="product image">
    <h2>User comments</h2>
    <?php
    $sql = "select * from product_comments where product_id = $product_id";
    $result = $db->query($sql);
      while($row = $result->fetchObject()){
      $c_id = $row->comment_id;
      echo "<h4>$row->username</h4>";
      echo "<p>$row->comment</p>";
      echo "<p>$row->likes<a href='?likes&c_id=$c_id&product_id=$product_id'>Like</a></p>";
      echo "<p><code>$row->time</code></p>";
      echo "<p><a href='?delete&c_id=$c_id&product_id=$product_id'>Delete</a></p>";
      }
    ?>
    <br />
    <a href='products.php'>Back</a>

    <form action="" method="post">
      <label>Username</label>
      <input type="text" name="username" required="">
      <label>Comment</label>
      <textarea name="comment" required=""></textarea>
      <input type="hidden" name="p_id" value="<?php echo $product_id; ?>">
      <input type="submit">
    </form>

  </body>
</html>

