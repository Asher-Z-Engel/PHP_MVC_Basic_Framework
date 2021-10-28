<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>
<body>
  <h1>Welcome!</h1>
  <p>Hello from our first view!!</p>
  <p>Hi <?php echo htmlspecialchars($name);?>!</p>
  <ul>
    <?php foreach ($colors as $color) { ?>
      <li><?php echo htmlspecialchars($color); ?></li>
    <?php } ?>
  </ul>
  
</body>
</html>