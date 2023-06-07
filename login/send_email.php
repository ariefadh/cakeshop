<?php
if (isset($_POST['submit_email'])) {

    include('..\unit.php');
    $email = $_POST['email'];

    $select = mysqli_query($koneksi,"SELECT pass,email FROM akun WHERE email='$email'");
    if (mysqli_num_rows($select) == 1) {
        while ($row = mysqli_fetch_array($select)) {
            $email = $row['email'];
            $pass = md5($row['pass']);
        }
        //$link="<a href='localhost:8080/phpmailer/reset_pass.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
        require_once('mail/class.phpmailer.php');
        require_once('mail/class.smtp.php');
        $mail = new PHPMailer();

        $body      = "Dengan Hormat, <br><br>Klik link berikut untuk reset Password, <a href='http://localhost/cakeshop/login/reset_pass.php?reset=$pass&key=$email'>$pass<a><br><br>Salam manis,<br>Dara Bakery"; //isi dari email

        // $mail->CharSet =  "utf-8";
        $mail->IsSMTP();
        // enable SMTP authentication
        $mail->SMTPDebug  = 1;
        $mail->SMTPAuth = true;
        // GMAIL username
        $mail->Username = "411212072@mahasiswa.undira.ac.id";
        // GMAIL password
        $mail->Password = "411212072";
        $mail->SMTPSecure = "ssl";
        // sets GMAIL as the SMTP server
        $mail->Host = "smtp.gmail.com";
        // set the SMTP port for the GMAIL server
        $mail->Port = "465";
        $mail->From = '411212072@mahasiswa.undira.ac.id';
        $mail->FromName = 'Admin Store Dara Bakery';

        $email = $_POST['email'];

        $mail->AddAddress($email, 'User Sistem');
        $mail->Subject  =  'Reset Password';
        $mail->IsHTML(true);
        $mail->MsgHTML($body);
        if ($mail->Send()) {
            echo "<script> alert('Link reset password telah dikirim ke email anda, Cek email untuk melakukan reset'); window.location = 'index.php'; </script>"; //jika pesan terkirim

        } else {
            echo "Mail Error - >" . $mail->ErrorInfo;
        }
    } else {
        echo "<script> alert('Email anda tidak terdaftar di sistem'); window.location = 'index.php'; </script>"; //jika pesan terkirim

    }
}
