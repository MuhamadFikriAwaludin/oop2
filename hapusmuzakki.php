<?php 
    include "koneksi.php";
    $db = new koneksi;
    $id = $_GET['id_muzakki'];
    $db->hapusmuzakki($id);
    header("location: muzakki.php", true, 301);