<?php
/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/
$koneksi = mysqli_connect("localhost", "root", "", "cakeshop");

// Tambah Data 
function tambahDataUser($koneksi, $data)
{
    $id_akun = $data['id_akun'];
    $id_staff = $data['nama_staff']; // menggunakan 'nama_staff' karena input berupa select dengan opsi nama_staff

    // Periksa apakah id_staff valid
    $sql = "SELECT id_staff FROM staff WHERE id_staff = '$id_staff'";
    $result = mysqli_query($koneksi, $sql);
    if (!$result || mysqli_num_rows($result) === 0) {
        return false; // id_staff tidak valid
    }

    $username = $data['username'];
    $email = $data['email'];
    $pass = $data['pass'];
    $level = $data['level'];

    $sql = "INSERT INTO akun (id_akun, id_staff, username, email, pass, level)
            VALUES ('$id_akun', '$id_staff', '$username', '$email', '$pass', '$level')";

    if (mysqli_query($koneksi, $sql)) {
        return true; // data berhasil ditambahkan
    } else {
        return false; // gagal menambahkan data
    }
}

if (isset($_POST['userAdd'])) {
    $id_akun = $_POST['id_akun'];
    $id_staff = $_POST['nama_staff']; // menggunakan 'nama_staff' karena input berupa select dengan opsi nama_staff
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];

    $data = array(
        'id_akun' => $id_akun,
        'nama_staff' => $id_staff, // menggunakan 'nama_staff' sebagai kunci array
        'username' => $username,
        'email' => $email,
        'pass' => $pass,
        'level' => $level,
    );

    if (tambahDataUser($koneksi, $data)) {
        header("Location: ../akun");
        exit();
    } else {
        $error = "Gagal menambahkan data!";
    }
}

// Hapus Data
function deleteDataUser($koneksi, $id_akun)
{
    $sql = "DELETE FROM akun WHERE id_akun = '$id_akun'";

    if (mysqli_query($koneksi, $sql)) {
        return true; // Berhasil menghapus data
    } else {
        return false; // Gagal menghapus data
    }
}

if (isset($_POST['userDelete'])) {
    $id_akun = $_POST['id_akun'];

    if (deleteDataUser($koneksi, $id_akun)) {
        header("Location: ../akun");
        exit();
    } else {
        $error = "Gagal menghapus data!";
    }
}

// Edit Data
function editDataUser($data)
{
    global $koneksi;
    $id_akun = $data['id_akun'];
    $username = $data['username'];
    $email = $data['email'];
    $pass = $data['pass'];
    $level = $data['level'];

    $sql = "UPDATE akun SET 
            username = '$username',
            email = '$email',
            pass = '$pass',
            level = '$level'
            WHERE id_akun = '$id_akun'";

    if (mysqli_query($koneksi, $sql)) {
        return true; // Berhasil mengupdate data
    } else {
        return false; // Gagal mengupdate data
    }
}

// Jika tombol "Simpan" pada modal edit ditekan
if (isset($_POST['userEdit'])) {
    $id_akun = $_POST['id_akun'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];

    $data = array(
        'id_akun' => $id_akun,
        'username' => $username,
        'email' => $email,
        'pass' => $pass,
        'level' => $level,
    );

    if (editDataUser($data)) {
        header("Location: ../akun");
        exit();
    } else {
        $error = "Gagal mengedit data!";
    }
}
