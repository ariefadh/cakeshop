<?php
/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/
    $koneksi = mysqli_connect("localhost", "root", "","cakeshop"); 
    
    /* Staff */
    // Tambah Data 
    function tambahDataStaff($koneksi, $data) {
        $sql = "INSERT INTO staff (id_staff, nama_staff, posisi) VALUES (
            '" . $data['id_staff'] . "',
            '" . $data['nama_staff'] . "',
            '" . $data['posisi'] . "'
        )";
    
        if (mysqli_query($koneksi, $sql)) {
            return true; 
        } else {
            return false; 
        }
    }
    
    if (isset($_POST['staffAdd'])) {
        $id_staff = $_POST['id_staff'];
        $nama_staff = $_POST['nama_staff'];
        $posisi = $_POST['posisi'];
    
        $data = array(
            'id_staff' => $id_staff,
            'nama_staff' => $nama_staff,
            'posisi' => $posisi
        );
    
        if (tambahDataStaff($koneksi, $data)) {
            header("Location: ../home");
            exit();
        } else {
            $error = "Gagal menambahkan data!";
        }
    }

    // Hapus Data
    function deleteDataStaff($koneksi, $id_staff) {
        $sql = "DELETE FROM staff WHERE id_staff = '$id_staff'";
        
        if (mysqli_query($koneksi, $sql)) {
            return true; // Berhasil menghapus data
        } else {
            return false; // Gagal menghapus data
        }
    }
    
    if (isset($_POST['staffDelete'])) {
        $id_staff = $_POST['id_staff'];
    
        if (deleteDataStaff($koneksi, $id_staff)) {
            header("Location: ../home");
            exit();
        } else {
            $error = "Gagal menghapus data!";
        }
    }
    
    // Edit Data
    function editDataStaff($data)
    {
        global $koneksi;
        $id_staff = $data['id_staff'];
        $nama_staff = $data['nama_staff'];
        $posisi = $data['posisi'];

        $sql = "UPDATE staff SET 
                nama_staff = '$nama_staff',
                posisi = '$posisi'
                WHERE id_staff = '$id_staff'";

        if (mysqli_query($koneksi, $sql)) {
            return true; // Berhasil mengupdate data
        } else {
            return false; // Gagal mengupdate data
        }
    }

    // Jika tombol "Simpan" pada modal edit ditekan
    if (isset($_POST['staffEdit'])) {
        $id_staff = $_POST['id_staff'];
        $nama_staff = $_POST['nama_staff'];
        $posisi = $_POST['posisi'];

        $data = array(
            'id_staff' => $id_staff,
            'nama_staff' => $nama_staff,
            'posisi' => $posisi,
        );

        if (editDataStaff($data)) {
            // Redirect ke halaman sukses edit data
            header("Location: ../home");
            exit();
        } else {
            // Tampilkan pesan error jika gagal edit data
            $error = "Gagal mengedit data!";
        }
    }

    /* Data Customer */
    // Tambah Data
    function tambahDataCustomer($koneksi, $data) {
        $sql = "INSERT INTO customer (nama_customer) VALUES ('" . $data['nama_customer'] . "')";

        if (mysqli_query($koneksi, $sql)) {
            return true; 
        } else {
            return false; 
        }
    }

    if (isset($_POST['customerAdd'])) {
        $nama_customer = $_POST['nama_customer'];

        $data = array(
            'nama_customer' => $nama_customer
        );

        if (tambahDataCustomer($koneksi, $data)) {
            header("Location: ../home");
            exit();
        } else {
            $error = "Gagal menambahkan data!";
        }
    }

    // Hapus Data
    function deleteDataCustomer($koneksi, $id_customer) {
        $sql = "DELETE FROM customer WHERE id_customer = '$id_customer'";
        
        if (mysqli_query($koneksi, $sql)) {
            return true; // Berhasil menghapus data
        } else {
            return false; // Gagal menghapus data
        }
    }
    
    if (isset($_POST['customerDelete'])) {
        $id_customer = $_POST['id_customer'];
    
        if (deleteDataCustomer($koneksi, $id_customer)) {
            header("Location: ../home");
            exit();
        } else {
            $error = "Gagal menghapus data!";
        }
    }
    
    // Edit Data
    function editDataCustomer($data)
    {
        global $koneksi;
        $id_customer = $data['id_customer'];
        $nama_customer = $data['nama_customer'];

        $sql = "UPDATE customer SET
                nama_customer = '$nama_customer'
                WHERE id_customer = '$id_customer'";

        if (mysqli_query($koneksi, $sql)) {
            return true; // Berhasil mengupdate data
        } else {
            return false; // Gagal mengupdate data
        }
    }

    // Jika tombol "Simpan" pada modal edit ditekan
    if (isset($_POST['customerEdit'])) {
        $id_customer = $_POST['id_customer'];
        $nama_customer = $_POST['nama_customer'];

        $data = array(
            'id_customer' => $id_customer,
            'nama_customer' => $nama_customer
        );

        if (editDataCustomer($data)) {
            // Redirect ke halaman sukses edit data
            header("Location: ../home");
            exit();
        } else {
            // Tampilkan pesan error jika gagal edit data
            $error = "Gagal mengedit data!";
        }
    }
