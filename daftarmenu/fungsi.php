<?php 
    include 'koneksi.php';

    function tambah_data($data, $files){

        $foto_menu = $files['foto_menu']['name'];
        $nama_menu = $data['nama_menu'];
        $harga_menu = $data['harga_menu'];

        $dir = "img/";
        $tmpFile = $files['foto_menu']['tmp_name'];

        move_uploaded_file($tmpFile, $dir.$foto_menu);

        $query = "INSERT INTO  menu VALUES(null, '$nama_menu', '$harga_menu', '$foto_menu')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
    }

    function ubah_data($data, $files){
        $nama_menu = $data['nama_menu'];
        $id_menu = $data['id_menu'];
        $harga_menu = $data['harga_menu'];

        $queryShow = "SELECT * FROM menu WHERE id_menu = $id_menu";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        if($files['foto_menu']['name'] == ""){
            $foto_menu = $result['foto_menu'];
        } else {
            $foto_menu = $files['foto_menu']['name'];
            unlink("img/" . $result['foto_menu']);
            move_uploaded_file($files['foto_menu']['tmp_name'], 'img/'.$files['foto_menu']['name']);
        }

        $query = "UPDATE menu SET nama_menu='$nama_menu', harga_menu='$harga_menu', foto_menu = '$foto_menu' WHERE id_menu= '$id_menu';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function hapus_data($data){
        $id_menu = $data['hapus'];
        $queryShow = "SELECT * FROM menu WHERE id_menu = $id_menu";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        unlink("img/" . $result['foto_menu']);

        $query = "DELETE FROM menu WHERE id_menu = '$id_menu';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
    }

?>