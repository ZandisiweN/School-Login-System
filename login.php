<?php include('functions.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="icon" href="images\final680-6806063_university-logo-design-school-cartoon-png-and-vector .png">
  <link href="css\style.css" rel="stylesheet">
</head>

<body>
  <main>
    <div class="container">
      <div class="logo-image">
        <a href="index.php">
          <img
            src="images\kisspng-education-logo-graphic-design-school-vector-hat-books-5aa734307dd1d0.9723635615209073125154.png"
            alt="logo">
        </a>
      </div>

      <div class="form-wrap" style="font-family: 'Poppins', sans-serif ">
        <h1>Login</h1>
        <p>Please fill in your credentials to login.</p>

        <form method="POST" action="login.php" class="form">
          <?php echo display_error(); ?>

          <div class="form-group">
            <label for="username">Username (email)</label>
            <input type="text" name="username" id="password" placeholder="Enter a valid email" />
          </div>
          <div class="form-group">
            <label for="password"> Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" />
          </div>
          <button type="submit" class="btn-btn1" name="login_button"><b>Accept<b></button>
          <p class="bottom-text">
            <a href="#">forgot your password?</a>
          </p>
        </form>

      </div>
      <footer>
        <p style="text-align: center; margin-top: 10px">Don't have an account? <a href="signup.php">Sign up now</a></p>
      </footer>
    </div>

  </main>

</body>

</html>