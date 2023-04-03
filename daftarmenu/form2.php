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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
    <link rel="shortcut icon" href="../assets/logo itts coffe.png" type="image/x-icon">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <form method="POST" action="proses.php" enctype="multipart/form-data" class="container forms">
        <div class="form login">
            <div class="form-content">
                <?php
        if (isset($_GET['ubah'])) {
        ?>
                <header>Edit Menu</header>
                <?php
            } else {
        ?>
                <header>Tambah Menu</header>
                <?php
            }
        ?>

                <label for="foto">Upload Foto Produk:</label><br>
                <input <?php if (!isset($_GET['ubah'])) {
            echo "required";}?> type="file" id="foto_menu" class="inputfile" name="foto_menu" accept="image/*"
                    value=""><br>

                <div class="field input-field">
                    <input required type="text" id="nama_menu" name="nama_menu" value="<?php echo $nama_menu?>"
                        placeholder="Masukkan nama Menu" class="input">
                    <input type="hidden" id="id_menu" name="id_menu" value="<?php echo $id_menu; ?>">
                </div>

                <div class="field input-field">
                    <input required type="number" id="harga_menu" name="harga_menu" value="<?php echo $harga_menu?>"
                        placeholder="Masukkan Harga Menu" class="hargamenu">
                </div>

                <div class="field button-field">
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
                    <button><a href="daftarmenu.php" class="kembali">Kembali</a></button>
                </div>
            </div>
        </div>
    </form>
</body>