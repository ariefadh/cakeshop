<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					<span class="login100-form-title">
						WELCOME
					</span>
					<?php
					session_start();
					include "unit.php";
					?>
					<form action="#" method="post">
						<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
							<input class="input100" type="text" id="username" name="username" placeholder="Username">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Please enter password">
							<input class="input100" type="password" id="password" name="pass" placeholder="Password">
							<span class="focus-input100"></span>
						</div>
						<div class="flex-col-c p-t-20 p-b-20">
						</div>
						<input type="submit" value="Log In" name="login" class="login100-form-btn">
						<?php
						if (isset($_POST['login'])) {
							$username = $_POST['username'];
							$password = $_POST['pass'];
							$qry = mysqli_query($koneksi, "SELECT * FROM akun WHERE username = '$username' AND pass = '$password'");

							$cek = mysqli_num_rows($qry);
							if ($cek > 0) {
								//jika data ditemukan
								$ambildatalev = mysqli_fetch_array($qry);
								$role = $ambildatalev['level'];

								if ($role == 1) {
									//jika dia level 1
									$_SESSION['userweb'] = $username;
									$_SESSION['level'] = 1;
									header("location:..\home");
									exit;
								} else {
									//jika bukan level 1
									$_SESSION['userweb'] = $username;
									$_SESSION['level'] = 2;
									header("location:..\home");
									exit;
								}
							} else {
								//jika data tidak ditemukan
								echo "<script>alert('Login gagal salah username/password, silahkan coba kembali!');</script>";
							}
						}
						?>
				</div>
				</form>
				<div class="flex-col-c p-t-20 p-b-40">
				</div>
				<style>
					.centered-text {
						display: flex;
						justify-content: center;
						align-items: center;
						height: 100%;
					}
				</style>
				<p class="mb-1">
					<a href data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"="#" class="centered-text">Lupa password?</a>
				</p>
			</div>
		</div>
	</div>
	</div>


	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Lupa Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="send_email.php" method="POST">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Inputkan Email Anda</label>
						<input type="email" name="email" class="form-control">
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" name="submit_email" value="submit_email">Submit </button>
					</div>
				</form>
			</div>
		</div>
		<div class="flex-col-c p-t-30 p-b-40">
		</div>
	</div>
</div>

</html>