<?php
include 'koneksi.php';

$query = "SELECT * FROM products;";
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
    <link rel="stylesheet" href="./crudstyle.css">
    <script src="https://kit.fontawesome.com/a2d192b20c.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <!-- <div class="logo">
            <img src="../assets/logo itts coffe.png" alt="">
        </div> -->
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
                    <img src="../assets/logout.png" alt="">
                    <p><a href="/adminuser/php/login.php?logout='1'" style="color: red;">LogOut</a></p>
                </a>
            </div>
        </div>
    </nav>
    <div class="head">
        <h2>Admin Itts Coffee
            <button id="button1" class="button1">Add Product</button>
        </h2>
    </div>
    <!-- card -->
    <?php
    while($result = mysqli_fetch_assoc($sql)){
    ?>
    <h1>eeeee</h1>
    <div class="container">
        <div class="card">
            <div class="foto">
                <a href="img/<?php echo $result['image']; ?>">
                    <img src="img/<?php echo $result['image']; ?>">
                </a>
            </div>
            <div class="nama-menu">
                <h2>
                    <?php echo $result['name']; ?>
                </h2>
            </div>
            <div class="harga-menu">
                <p><?php echo $result['price']; ?>
                </p>
                <a href="form.php?ubah=<?php echo $result['id']; ?>" class="icon1"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <a href="proses.php?hapus=<?php echo $result['id']; ?>" type="button" class="icon2"
                    onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut????')"><i
                        class="fa-solid fa-trash-can-arrow-up"></i></a>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <!-- Modal content -->
    <!-- <div id="myModal" class="modal">

        
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <?php
        if (isset($_GET['ubah'])) {
        ?>
                <h2>Edit Menu</h2>
                <?php
            } else {
        ?>
                <h2>Tambah Menu</h2>
                <?php
            }
        ?>
            </div>
            <div class="modal-body">
                <form action="crud.php" method="POST" enctype="multipart/form-data">
                    <label>Name:</label><br>
                    <input required type="text" id="name" name="name" value="<?php echo $name?>"><br>
                    <label>Price:</label><br>
                    <input required min="1" type="number" name="price" id="price" value="<?php echo $price?>"><br>
                    <p><label>Descripton:</label></p>
                    <textarea required name="desc"></textarea><br>
                    <label>Foto:</label><br>
                    <input <?php if (!isset($_GET['ubah'])) {
            echo "required";}?> type="file" id="image" name="image" accept="image/*" value=""><br>
                </form>
            </div>
            <div class="modal-footer">
                <a href="index.php" type="reset" class="button2">cancel</a>
                <?php
        if (isset($_GET['ubah'])) {
        ?>
                <button type="submit" name="aksi" value="edit" class="simpan">Save</button>
                <?php
            } else {
        ?>
                <button type="submit" name="aksi" value="add" class="button3">Add</button>
                <?php
            }
        ?>

            </div>
        </div>
    </div> -->


    <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("button1");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
    <script>
    let subMenu = document.getElementById("subMenu");

    function toggleMenu() {
        subMenu.classList.toggle("open-menu");
    }
    </script>
</body>