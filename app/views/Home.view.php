<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/header.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <title>Home</title>
</head>

<body>
  <!-- Header section -->
  <header>
    <div class="logo">
      <a href="<?php echo ROOT . '/home' ?>">
        <img src="<?= ROOT ?>/assets/logo/logo.png" alt="Logo">
      </a>
    </div>

    <div class="profile">
      <div class="user">
        <a href="<?php echo '/Profile/' . $_SESSION['email'] ?>">
          <img src=<?php
                    $user = $data['image_path'];
                    if (file_exists('assets/profile_images/' . $user)) {
                      echo ROOT . '/assets/profile_images/' . $user;
                    } else {
                      echo ROOT . '/assets/profile_images/user.png';
                    }
                    ?>>
        </a>
        <p class="username"><?= $_SESSION['email'] ?></p>
      </div>
      <a class="logout-btn" href="/logout">Logout</a>
    </div>
  </header>




  <!-- Main Section -->
  <main>
    <div class="stocks">
      <table>
        <thead>
          <th>Stock Name</th>
          <th>Stock Price</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Action</th>
        </thead>
        <tbody>
          <?php foreach ($data as $row): ?>
          <tr>
            <td><?= $row['stock_name'] ?? '' ?></td>
            <td><?= $row['stock_price'] ?? '' ?></td>
            <td><?= $row['created_at'] ?? '' ?></td>
            <td><?= $row['updated_at'] ?? '' ?></td>
            <td>
              <?php if ($_SESSION['email'] == $row['email']): ?>
              <a href="/Action/update/<?= $row['email']. '/' . $row['id'] ?>">Update</a>
              <a href="/Action/delete/<?= $row['id'] ?>">Delete</a>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php echo var_dump($_SESSION) . '/' . $row['email'] ?>
  </main>
</body>

</html>
