<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css">
  <title>Add Stocks</title>
</head>

<body>
  <div class="container">
    <form action="" method="post">
      <label for="stock_name">Enter Stock Name : </label>
      <input type="text" name="stock_name" id="stock_name">

      <label for="stock_price">Enter Stock Price : </label>
      <input type="number" name="stock_price" id="stock_price">

      <input type="submit" name="submit" id="submit">
    </form>
    <p class="error-message"><?= $data['error_msg'] ?? '' ?></p>
    <p class="success-message"><?= $data['success_msg'] ?? '' ?></p>
  </div>
</body>

</html>
