<?php
    session_start();
    require_once 'database/adduser_process.php';

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
          <img src="./assets/image/logo_two.jpg" alt="BSU">
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
            <a href="#">
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
            <img src="./assets/image/logo.jpg" alt="">
          </div>
        </div>

        <div class="details">
             <!--Detail lIst-->

             <?php $result = $mysqli->query("SELECT * FROM users") ?>
             <div class="recent_container">
              <div class="card_header">
                <h2>Uploads</h2>
              </div>
              <table>
                <thead>
                  <tr>
                    <td>Name</td>
                    <td>Username</td>
                    <td>Password</td>
                    <td>Usertype</td>
                    <td>Action</td>

                  </tr>
                </thead>
                <tbody>
                <?php
                    while($row = $result-> fetch_assoc()):  
                ?>
                  <tr>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['password'] ?></td>
                    <td><?php echo $row['usertype'] ?></td>
                    <td>
                      <a href="./adduser.php?edit=<?php echo $row['id']; ?>" class="btn btn_edit">Edit</a>
                      <a href="./database/adduser_process.php?delete=<?php echo $row['id']; ?>" class="btn btn_delete">Delete</a>
                    </td>
                  </tr>
                <?php endwhile; ?>
                </tbody>
              </table>
            </div>
            <form action="./database/adduser_process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <h1>Add Users</h1>
            <input type="text" value="<?php echo $name?>" name="name" placeholder="Name" >
            <input type="text" value="<?php echo $username?>" name="username" placeholder="User Name">
            <input type="text" value="<?php echo $password?>" name="password" placeholder="Password">
            <select name="usertype" value="<?php echo $usertype?>"> 
              <option>User</option>
              <option>Admin</option>
            </select>
            <?php if($update == true): ?>
                <button type="submit" class="btn_update" name="update">UPADATE</button>
            <?php else: ?>
                <button type="submit" class="btn_save" name="save">SAVE</button>
            <?php endif ?>   
            </form>
            
      </div>
    </div>
      
  
      


    
    <script src="assets/js/main.js"></script>
    
</body>
</html>