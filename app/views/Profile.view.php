<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/header.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/profile.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css">

  <title>Home</title>
</head>

<body>
  <header>
    <div class="logo">
      <a href="<?php echo ROOT . '/home' ?>">
        <img src="<?= ROOT ?>/assets/logo/logo.png" alt="Logo">
      </a>
    </div>

    <div class="profile">
      <div class="user">
        <a href="<?php echo '/Profile/' . $_SESSION['username'] ?>">
          <img src=<?php
                    $user = $data['image_path'];
                    if (file_exists('assets/profile_images/' . $user)) {
                      echo ROOT . '/assets/profile_images/' . $user;
                    } else {
                      echo ROOT . '/assets/profile_images/user.png';
                    }
                    ?>>
        </a>
        <p class="username"><?= $_SESSION['username'] ?></p>
      </div>
      <a class="logout-btn" href="/logout">Logout</a>
    </div>
  </header>

  <section class="profile-view">
    <h2>Profile</h2>
    <hr>

    <?php
    if ($_SESSION['username'] != $data['email']) :
    ?>

      <div class="card">
        <img src=<?php
                  $user = $_SESSION['username'];
                  if (file_exists('assets/profile_images/' . $user . '.jpg')) {
                    echo ROOT . '/assets/profile_images/' . $user . '.jpg';
                  } else {
                    echo ROOT . '/assets/profile_images/user.png';
                  }
                  ?>>
        <div class="deatils">
          <p>First Name : <span><?= $data['first_name'] ?></span></p>
          <p>Last Name : <span><?= $data['last_name'] ?></span></p>
          <p>Email : <span><?= $data['email'] ?></span></p>
          <p>Phone number : <span><?= $data['phone'] ?></span></p>

        </div>
      </div>
    <?php else : ?>
      <form class="card" method="post" enctype="multipart/form-data">
        <label for="imageFile">
        <img width="30px" id="imagePreview" src=<?php
                                                $user = $data['image_path'];
                                                if (file_exists('assets/profile_images/' . $user)) {
                                                  echo ROOT . '/assets/profile_images/' . $user;
                                                } else {
                                                  echo ROOT . '/assets/profile_images/user.png';
                                                }
                                                ?>>
        </label>
        <input onchange="readURL(this);" style="display: none;" type="file" name="imageFile" id="imageFile">
        <label for="first_name">First Name :</label>
        <input type="text" name="first_name" value="<?= $data['first_name'] ?>">

        <label for="last_name">Last Name :</label>
        <input type="text" name="last_name" value="<?= $data['last_name'] ?>" pattern="[A-Za-z]+">

        <label for="phone">Phone number :</label>
        <input type="tel" name="phone" value="<?= $data['phone'] ?>" pattern="^\+91[6-9]{1}[2-9]{1}[0-9]{8}">

        <input type="submit" name="update" value="Update" id="submit">
        <p id="wrong"></p>
      </form>
      <p class="error-message"><?= $data['error_message'] ?? '' ?></p>
      <p class="success-message"><?= $data['success_message'] ?? '' ?></p>
    <?php endif; ?>
    <script src="<?= ROOT ?>/assets/js/signup.js"></script>
  </section>
</body>

</html>
