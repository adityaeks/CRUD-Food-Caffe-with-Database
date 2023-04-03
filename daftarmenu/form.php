<!DOCTYPE html>
<?php
    include 'koneksi.php';
    $id_menu = '';
    $nama_menu = '';
    $harga_menu = '';

    if (isset($_GET['ubah'])) {
    $id_menu = $_GET['ubah'];

    $query = "SELECT * FROM menu WHERE id_menu = '$id_menu';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nama_menu = $result['nama_menu'];
    $harga_menu = $result['harga_menu'];

    //($result);
    //die();
    }
?>
<html>

<head>
    <style>
    .kembali {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    .simpan {
        background-color: #ff0000;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    </style>
</head>

<body>

    <form method="POST" action="proses.php" enctype="multipart/form-data">
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
        <label for="foto">Upload Foto Produk:</label><br>
        <input <?php if (!isset($_GET['ubah'])) {
            echo "required";}?> type="file" id="foto_menu" name="foto_menu" accept="image/*" value=""><br>
        <label for="fname">Nama Menu:</label><br>
        <input required type="text" id="nama_menu" name="nama_menu" value="<?php echo $nama_menu?>"><br>
        <input type="hidden" id="id_menu" name="id_menu" value="<?php echo $id_menu; ?>">
        <label for="lname">Harga Menu:</label><br>
        <input required type="number" id="harga_menu" name="harga_menu" value="<?php echo $harga_menu?>"><br><br>
        <?php
        if (isset($_GET['ubah'])) {
        ?>
        <button type="submit" name="aksi" value="edit" class="simpan">Simpan</button>
        <?php
            } else {
        ?>
        <button type="submit" name="aksi" value="add" class="simpan">Tambahkan</button>
        <?php
            }
        ?>
        <a href="daftarmenu.php" class="kembali">Kembali</a>
    </form>


</body>

</html>