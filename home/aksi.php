<?php
include 'unit.php';

$g=$_GET['sender'];
    if($g=='editstaff')
    {
        mysqli_query($config,"UPDATE staff SET 
                id_staff='$_POST[id_staff]',
                nama_staff='$_POST[nama_staff]',
                id_pegawai='$_POST[id_pegawai]',
                posisi='$_POST[posisi]' WHERE id_staff='$_POST[id_staff]'");
            echo '<script LANGUAGE="JavaScript">
            alert("Staff dengan nama :('.$_POST[nama_staff].') Di Update")
            window.location.href="index.php?page=home";
            </script>';
    } 
