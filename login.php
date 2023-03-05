<?php
    //start session.
    session_start();
    if(isset($_SESSION['user'])) header('location: admin/home.php');

    $error_message = '';

    if($_POST){
        include('database/connection.php');

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = 'SELECT * FROM users WHERE users.username="'. $username .'" AND users.password ="'. $password .'"';
        $stmt = $conn->prepare($query);
        $stmt->execute();

        
        if($stmt->rowCount() > 0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetchAll()[0];
            $_SESSION['user'] = $user;    
            
            header('Location: ./admin/home.php');
        }
        else
        {
            $error_message = 'Warning! Check your username or password';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
    <div class="container login_container">
        <div class="left">
            <img src="./Image/Phone.png" alt="">
        </div>
        <div class="right">
        <?php if(!empty($error_message)) { ?>
            <div class="alert">
                <span class="uil uil-exclamation-octagon"></span>
                <span class="msg"><?= $error_message?></span>
            </div>
         <?php } ?>

            <form action="login.php" method="POST">
                <img src="./Image/Logo.png" alt="">
                <input type="text" placeholder="Phone number, username, email"name="username" required>
                <input type="password" placeholder="Password" name="password" required>
    
                <button type="submit">Log In</button>
            </form>

        </div>
    </div>
</body>
</html>