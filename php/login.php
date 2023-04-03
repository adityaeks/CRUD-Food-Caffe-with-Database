<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['loggedin'] = true;
        header("Location: menu.php");
        exit;
    } else {
        $error = "Username or password is incorrect.";
    }
    
    // if (mysqli_num_rows($result) == 0) {
    //     $error = "Username or password is incorrect.";
    // } else {
    //     $_SESSION['loggedin'] = true;
    //     header("Location: menu.php");
    //     exit;
    // }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITTS Coffee</title>
    <link rel="shortcut icon" href="/adminuser/assets/logo itts coffe.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/loginstyle.css">
</head>

<body>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>Login Admin</header>
                <?php if (isset($error)) { echo "<p class='error'>" . $error . "</p>"; } ?>
                <form method="post" action="">
                    <div class="field input-field">
                        <input type="text" name="username" placeholder="Username" class="input">
                    </div>

                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Password" class="password">
                    </div>

                    <div class="field button-field">
                        <center><button type="submit" name="submit" value="Login">Login</button></center>
                    </div>
                    <!-- 
                    <div class="form-link">
                        <span>Tidak Memiliki Akun? <a href="./signup.html" class="Signup-link">Buat Akun</a></span>
                    </div> -->
                </form>
            </div>
        </div>
    </section>
</body>