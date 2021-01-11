<?php
require "header.php";

?>
<main>
<div class="container">
      <div class="form-wrap">
        <h1>Login</h1>
       <p>Please fill in your credentials to login.</p>

        <form>
         
          <div class="form-group">
            <label for="username">Username (email)</label>
            <input type="text" name="username" id="password" placeholder="Enter a valid email" />
          </div>
          <div class="form-group">
            <label for="password"> Password</label>
            <input type="password" name="pasword" id="password" placeholder="Enter your password"/>
          </div>
          <button type="submit" class="btn-btn1"><b>Accept<b></button>
          <p class="bottom-text">
            <a href="#">forgot your password?</a> 
          </p>
        </form>

      </div>
      <footer>
        <p>Don't have an account? <a href="signup.php">Sign up now</a></p>
      </footer>
</div>

</main>


<?php
require "footer.php";
?>