<?php include('functions.php');

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images\final680-6806063_university-logo-design-school-cartoon-png-and-vector .png">
  <link rel="stylesheet" href="css\style.css">
  <title>Student Portal</title>
</head>

<body>
  <main class="main-page">
    <div class="navbar">
      <ul>
        <img src="images\avatar-372-456324.png" alt="admin icon" style="width:120px; margin: 10px 60px ;">
        <li><a href="index.php">HOME</a></li>
        <li><a href="">FORUM</a></li>
        <li><a href="">DASHBOARD</a></li>
        <li><a href="admin_page.php" class="active">GRADES</a></li>
        <li><a href="#">MESSAGE INBOX </a></li>
        <li><a href="#">SCHEDULE</a></li>
        <li><a href="login.php">LOGOUT</a></li>
      </ul>
    </div>
    <div class="content">
      <!--notification message-->

      <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success">
        <h4>
          <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
        </h4>
      </div>
      <?php endif ?>
      <div class="logo-image">
        <a href="index.php">
          <img
            src="images\kisspng-education-logo-graphic-design-school-vector-hat-books-5aa734307dd1d0.9723635615209073125154.png"
            alt="logo">
        </a>
      </div>

      <div class="table-container" style="width: 60%; margin: auto" >
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>English Language</th>
              <th>Social Studies</th>
              <th>Physical Education</th>
              <th>History</th>
              <th>Maths</th>
             </tr>
          </thead>

          <tbody>
            <tr>
              <td><?php echo $_SESSION['user']['id']; ?></td>
              <td><?php echo $_SESSION['user']['username']; ?></td>
              <td><?php echo $_SESSION['user']['english']; ?></td>
              <td><?php echo $_SESSION['user']['socialstudies']; ?></td>
              <td><?php echo $_SESSION['user']['physicaleducation']; ?></td>
              <td><?php echo $_SESSION['user']['history']; ?></td>
              <td><?php echo $_SESSION['user']['maths']; ?></td>

            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>

</html>