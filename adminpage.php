<?php
include('functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin </title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
  <link rel="icon" href="images\final680-6806063_university-logo-design-school-cartoon-png-and-vector .png">
  <link rel="stylesheet" href="css\style.css">
</head>

<body>
  <sector class="flex-container" ></sector>
  <main class="main-page">
    <div class="navbar">
      <ul>
        <img src="images\ic_admin-512.png" alt="admin icon" style="width:120px; margin: 10px 60px ;">
        <li><a href="index.php">HOME</a></li>
        <li><a href="">FORUM</a></li>
        <li><a href="">DASHBOARD</a></li>
        <li><a href="admin_page.php" class="active">STUDENT GRADES</a></li>
        <li><a href="#">MESSAGE INBOX </a></li>
        <li><a href="#">SCHEDULE</a></li>
        <li><a href="login.php">LOGOUT</a></li>
      </ul>
    </div>


    <div class="content">
      <div class="logo-image">
        <a href="index.php">
          <img
            src="images\kisspng-education-logo-graphic-design-school-vector-hat-books-5aa734307dd1d0.9723635615209073125154.png"
            alt="logo">
        </a>
      </div>

      <?php
            $db = mysqli_connect('localhost', 'root', '', 'school_login_system');
            $query = "SELECT * FROM personal_information";
            $results = mysqli_query($db, $query);
            //pre_r($results);
            ?>

      <div class="table-container">
        <table style="font-family:'Poppins', sans-serif ;text-align:center">
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>English Language</th>
              <th>Social Studies</th>
              <th>Physical Education</th>
              <th>History</th>
              <th>Maths</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>

          <tbody>
            <?php while ($row = $results->fetch_assoc()) : ?>
            <tr>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['username'] ?></td>
              <td><?php echo $row['english'] ?></td>
              <td><?php echo $row['socialstudies'] ?></td>
              <td><?php echo $row['physicaleducation'] ?></td>
              <td><?php echo $row['maths'] ?></td>
              <td><?php echo $row['history'] ?></td>
              <td><a href="adminpage.php?edit=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
                <a href="functions.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Form  -->
    <div class="form-wrap" style="font-family: 'Poppins', sans-serif; background-image: linear-gradient(rgb(24, 52, 83), rgb(138, 158, 179));">
      <h2 style="text-align: center;">Grades</h2>
      <form class="form-sign-up" action="adminpage.php" method="post">

      <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Enter Username" />
        </div>
        <!-- Subjects -->
        <div class="form-group">
          <label for="english">English Language</label>
          <input type="text" name="english" value="<?php echo $englishLanguage; ?>" placeholder="English Language" />
        </div>

        <div class="form-group">
          <label for="socialstudies">Social Studies</label>
          <input type="text" name="socialstudies" value="<?php echo $socialStudies; ?>" placeholder="Social Studies" />
        </div>



        <div class="form-group">
          <label for="physicaleducation">Physical Education</label>
          <input type="text" name="physicaleducation" value="<?php echo $physicalEducation; ?>"
            placeholder="Physical Education" />
        </div>



        <div class="form-group">
          <label for="maths">Maths</label>
          <input type="text" name="maths" value="<?php echo $maths; ?>" placeholder="Maths" />
        </div>



        <div class="form-group">
          <label for="history">History</label>
          <input type="text" name="history" value="<?php echo $history; ?>" placeholder="History" />
        </div>

        <div class="form-group">
          <?php
                    if ($update == true) :
                    ?>
          <button type="submit" name="update" class="btn btn-warning">Update</button>
          <?php else : ?>
          <button type="submit" name="" class="btn btn-success">Save</button>
          <?php endif; ?>
        </div>

      </form>
    </div>




  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
  </script>
</body>

</html>