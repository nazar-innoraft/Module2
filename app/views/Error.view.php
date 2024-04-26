<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css">
  <title>Error Page</title>
</head>

<body>
  <div class="container">
    <h1>Error Page</h1>
    <h3 style="color: white;"><?= $data['error_msg'] ?? '' ?></h3>
  </div>
</body>

</html>
