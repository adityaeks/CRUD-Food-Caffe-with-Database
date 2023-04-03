<?php
include 'koneksi.php';

$query = "SELECT * FROM menu;";
$sql = mysqli_query($conn, $query);
$no = 0;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu ITTS Coffee</title>
    <link rel="shortcut icon" href="../assets/logo itts coffe.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/daftarmenu2.css">
    <script src="https://kit.fontawesome.com/a2d192b20c.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div class="logo">
            <img src="../assets/logo itts coffe.png" alt="">
        </div>
        <ul>
            <li><a class="active" href="/adminuser/php/menu.php">Home</a></li>
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
    <a href="form2.php" class="plus">
        <i class="fa-solid fa-circle-plus">Tambah Menu</i>

    </a>

    <!-- card -->

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
                <a href="form2.php?ubah=<?php echo $result['id_menu']; ?>" class="icon1"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <a href="proses.php?hapus=<?php echo $result['id_menu']; ?>" type="button" class="icon2"
                    onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut????')"><i
                        class="fa-solid fa-trash-can-arrow-up"></i></a>
            </div>
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