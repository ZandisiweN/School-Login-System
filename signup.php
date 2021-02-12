<?php include('functions.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link rel="icon" href="images\final680-6806063_university-logo-design-school-cartoon-png-and-vector .png">
  <link href="css\style.css" rel="stylesheet">
</head>
<body>
<main>
<div class="container">
<div class = "logo-image">
    <a href="index.php" >
   <img src="images\kisspng-education-logo-graphic-design-school-vector-hat-books-5aa734307dd1d0.9723635615209073125154.png" alt="logo">
    </a>
    </div>
      <div class="form-wrap" style="font-family: 'Poppins', sans-serif">
        <h1>Sign Up</h1>
        <p>Upload a picture of yourself <a href="#"><b>here</b></a></p>
        
    <img class ="avatar-icon"src="images\avatar-372-456324.png" alt="avatar-icon">

        <form class="form-sign-up" action="signup.php" method="post">
              <?php echo display_error();?>
          
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" value="<?php echo $username;?>" placeholder="Enter your Username" />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $email;?>" placeholder="Enter a valid email" />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="no less than 8 characters " />
          </div>
          <div class="form-group">
            <label for="password-repeat">Confirm Password</label>
            <input type="password" name="passwordRepeat" id="passwordRepeat" placeholder="Re-type password"/>
          </div>
          <button type="submit" name="signup_submit" class="btn"><b>Sign Up<b></button>
          <p class="bottom-text">
            By clicking the Sign Up button, you agree to our
            <a href="#">Terms & Conditions</a> and
            <a href="#">Privacy Policy</a>
          </p>
        </form>
      </div>
      <footer>
        <p style="text-align: center; margin-top: 10px">Already have an account? <a href="login.php">Login Here</a></p>
      </footer>

</div>

</main>
</body>
</html>


