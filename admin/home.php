<?php 
    session_start();
    require_once 'database/connection.php';
  if(!isset($_SESSION['user'])) header('location: ../login.php');
  
  $user = $_SESSION['user'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>BSU</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Cosutme style-->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- UniIcon-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
      <div class="sidebar_menu">
        <a class="nav_logo">
          <img src="assets/image/logo_two.jpg" alt="BSU">
        </a>
        <ul>
          <li>
            <a href="home.php">
              <span class="icon"><i class="uil uil-home"></i></span>
              <span class="title">Home</span>
            </a>
          </li>
          <li>
            <a href="document.php">
              <span class="icon"><i class="uil uil-file-check-alt"></i></span>
              <span class="title">Document</span>
            </a>
          </li>
          <li>
            <a href="upload.php">
              <span class="icon"><i class="uil uil-upload"></i></span>
              <span class="title">Upload</span>
            </a>
          </li>
          <li>
            <a href="adduser.php">
              <span class="icon"><i class="uil uil-user-plus"></i></span>
              <span class="title">Add User</span>
            </a>
          </li>
          <li>
            <a href="../database/logout.php">
              <span class="icon"><i class="uil uil-sign-out-alt"></i></span>
              <span class="title">Sign Out</span>
            </a>
          </li>
        </ul>
      </div>

        <!--=============top bar================-->

      <div class="main">
        <div class="topbar">

          <div class="toggle">
            <i class="uil uil-bars"></i>
          </div>
          
          <div class="search">
            <label for="">
              <input type="text" placeholder="Search here">
              <i class="uil uil-search"></i>
            </label>
          </div>
          <div class="user">
            <img src="./image/logo.jpg" alt="">
          </div>
        </div>
        <div class="card_box">
          <div class="card">
            <div>
              <div class="numbers">12</div>
              <div class="card_name">Documents</div>
            </div>
            <div class="icon_box">
              <i class="uil uil-file-check-alt"></i>
            </div>
          </div>
          <div class="card">
            <div>
              <div class="numbers">
              <?php 
                  $query = "SELECT id FROM users ORDER BY id";
                  $totalUser = mysqli_query($mysqli, $query);

                  $row = mysqli_num_rows($totalUser);

                  echo '<p>' .$row. '</p>';
                ?>
              </div>
              <div class="card_name">Users</div>
            </div>
            <div class="icon_box">
              <i class="uil uil-users-alt"></i>
            </div>
          </div>
          <div class="card">
            <div>
              <div class="numbers">12</div>
              <div class="card_name">Downloads</div>
            </div>
            <div class="icon_box">
              <i class="uil uil-download-alt"></i>
            </div>
          </div>
          <div class="card">
            <div>
              <div class="numbers">4</div>
              <div class="card_name">Admin User</div>
            </div>
            <div class="icon_box">
              <i class="uil uil-user"></i>
            </div>
          </div>
        </div>

        <div class="details">
             <!--Detail lIst-->
            <div class="recent_container">
              <div class="card_header">
                <h2>Recent Upload</h2>
                <a href="document.php" class="btn">Documents</a>
              </div>
              <table>
                <thead>
                  <tr>
                    <td>Title</td>
                    <td>Type</td>
                    <td>Size(kb)</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Development</td>
                    <td>docx</td>
                    <td>1532</td>
                  </tr>
                  <tr>
                    <td>Development</td>
                    <td>docx</td>
                    <td>1532</td>
                  </tr>
                  <tr>
                    <td>Development</td>
                    <td>docx</td>
                    <td>1532</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="recent_container">
              <div class="card_header">
                <h2>Users</h2>
              </div>
              <table>
                <thead>
                  <tr>
                    <td>Profile</td>
                    <td>Name</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><img src="./image/myprofile.jpg" alt=""></td>
                    <td>Dastine Jhay Bernardo</td>
                  </tr>
                  <tr>
                    <td><img src="./image/albert.jpg" alt=""></td>
                    <td>John Albert Adonis Gatmaitan</td>
                  </tr>
                  
                </tbody>
              </table>

            
        </div>
      </div>
    </div>
      
  
      


    
    <script src="js/main.js"></script>
    
</body>
</html>