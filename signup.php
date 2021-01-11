<?php
require "header.php";

?>
<main>

<div class="container">
      <div class="form-wrap">
        <h1>Sign Up</h1>
        <p>Upload a picture of yourself <a href="#"><b>here</b></a></p>
        
    <img class ="avatar-icon"src="images\avatar-372-456324.png" alt="avatar-icon">

        <form class="form-sighn-up" action="includes/signup.inc.php" method="post">
          
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
            <input type="password" name="password-repeat" id="password-repeat" placeholder="Re-type password"/>
          </div>
          <button type="submit" name="signup-submit" class="btn"><b>Sign Up<b></button>
          <p class="bottom-text">
            By clicking the Sign Up button, you agree to our
            <a href="#">Terms & Conditions</a> and
            <a href="#">Privacy Policy</a>
          </p>
        </form>
      </div>
      <footer>
        <p>Already have an account? <a href="login.php">Login Here</a></p>
      </footer>

</section>

</div>

</main>

<?php
require "footer.php";
?>