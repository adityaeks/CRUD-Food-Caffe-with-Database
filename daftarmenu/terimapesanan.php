<?php
  session_start();
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $result = mysqli_query($conn, $query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu ITTS Coffee</title>
    <link rel="shortcut icon" href="../assets/logo itts coffe.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/terimastyle.css">
    <script src="https://kit.fontawesome.com/a2d192b20c.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div class="logo">
            <img src="../assets/logo itts coffe.png" alt="">
        </div>
        <ul>
            <li><a class="active" href="/adminuser/php/menu.php">Home</a></li>
            <!-- <li><a class="active" href="./gallery.html">Gallery</a></li> -->
            <li><a><i class="fa-regular fa-user" onclick="toggleMenu()"></i></a></li>
        </ul>

        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <img src="../assets/user.png" alt="">
                    <?php  if (isset($_SESSION['username'])) : ?>
                    <h2>User <strong><?php echo $_SESSION['username']; ?></strong></h2>
                    <?php endif ?>

                </div>
                <hr>

                <a href="#" class="sub-menu-link">
                    <!-- <img src="../assets/logout.png" alt=""> -->
                    <p><a href="login.php?logout='1'" style="color: red;">LogOut</a></p>
                </a>

            </div>
        </div>
    </nav>
    <div class="content" id="foodList"></div>

    <div class="sidebar" id="cartList"></div>
    <script src="./cart.js"></script>
    <script>
    let subMenu = document.getElementById("subMenu");

    function toggleMenu() {
        subMenu.classList.toggle("open-menu");
    }
    </script>
</body>

</html>