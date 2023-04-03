<?php
include 'koneksi.php';

$query = "SELECT * FROM menu;";
$sql = mysqli_query($conn, $query);
$no = 0;


?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin ITTS Coffee</title>
    <link rel="shortcut icon" href="../assetsbar/logo itts coffe.png" type="image/x-icon">
    <link rel="stylesheet" href="/adminuser/css/pesananmanual2.css">
    <script src="https://kit.fontawesome.com/a2d192b20c.js" crossorigin="anonymous"></script>
</head>

<body>
<nav>
        <div class="logo">
            <img src="../assets/logo itts coffe.png" alt="">
        </div>
        <ul>
            <!-- <li><a class="home" href="/adminuser/php/menu.php">Home</a></li> -->
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
                    <p><a href="/adminuser/php/login.php?logout='1'" style="color: red;">LogOut</a></p>
                </a>
            </div>
        </div>
    </nav>

    <div class="tes">
        <div id="root"></div>
        <div class="sidebar" >
            <h2>Pembelian</h2>
            <div class="cart"><i class="fa-solid fa-cart-shopping"></i>
                <p id="count">0</p>
            </div>
            <hr>
            <div id="cartitem">Your cart is empty</div>
            <div class="foot">
                <h3>Total</h3>
                <h2 id="total">$ 0.00</h2>
            </div>
        </div>
    </div>



    <div class="container">
        <?php
    while($result = mysqli_fetch_assoc($sql)){
    ?>
        <div class="card">
            <div class="foto">
                <a href="img/<?php echo $result['foto_menu']; ?>">
                    <img src="img/<?php echo $result['foto_menu']; ?>">
                </a>
            </div>
            <div class="nama-menu">
                <h2>
                    <?php echo $result['nama_menu']; ?>
                </h2>
            </div>
            <div class="harga-menu">
                <p>Rp <?php echo $result['harga_menu']; ?>
                </p>
            </div>
            <button type="submit" class="buy" value="0" onclick="addtoCart(this.value)"><i class="fas fa-cart-plus"
                    aria-hidden="true"></i> Pesan</button>
            <input type="hidden" name="nama_menu" value="<?php echo $username; ?>">
            <input type="hidden" name="Item_name" value="Bag 1">
        </div>
        <?php
    }
    ?>
    </div>
    <script>
    let subMenu = document.getElementById("subMenu");

    function toggleMenu() {
        subMenu.classList.toggle("open-menu");
    }
    </script>
</body>