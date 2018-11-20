
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
		<link rel="stylesheet" href="../../public/bootstrap4/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../public/css/animate.css">
        <link href="../../public/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<style media="screen">

</style>
</head>
<body>


<div class="" style="position:fixed;height:100vh;width:100%;background-image:url(../././public/img/4_elements-wallpaper-2560x1440.jpg);z-index:-1;filter:blur(5px)">

</div>

<?php
	require_once('./../conn.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){

			function validateStudent($name){
			  $name = trim($name);
			  $name = stripslashes($name);
			  $name = htmlspecialchars($name);
			  return $name;
			}

			$username = validateStudent($_POST['username']);
		  $password = validateStudent($_POST['password']);

	//Checking is user existing in the database or not
        $query = "select * from design_users where username = '$username' and user_password ='".md5($password)."' ";
		$result = $conn->query($query);
		echo $conn->error;
		while ($a = $result->fetch_assoc()) {
			?>
			<script type="text/javascript">
			const username = '<?php echo $a['username']; ?>'
			const user_email = '<?php echo $a['email']; ?>'
			const user_image = '<?php echo $a['imageTitle']; ?>'
			const user_id =  '<?php echo $a['user_id']; ?>'
				// console.log("printing data ...");
				// console.log(username);
				// console.log(user_email);
				// console.log(user_image);
				localStorage.username = username;
				localStorage.user_email = user_email;
				localStorage.user_image = user_image;
				localStorage.user_id = user_id;

			</script>
			<?php
				}
				$rows = $result->num_rows;
		        if($rows==1){
					$_SESSION['username'] = $username;
			?>
			<script type="text/javascript">
			window.location="./../lumino";
			</script>
			<?php
			//
			// header("Location:./../the_dashboard/pages/index.html"); // Redirect user to index.php
            }else{
				echo "<div class='container' >
							<div class='row'  style='margin-top: 15% !important;'' >
							<div class='col-md-4 col-md-offset-4' style='margin: auto'>
									<div class='login-panel panel panel-default' id='changeDiv'  style=' box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'>
											<div class='panel-heading'>
													<h3 class='panel-title'>Username Or Password is Incorrect.</h3>
												</div>
												<div class='panel-body'>
												<h1 class='text-center'>Click Here To <br> <br>
												<a class='btn btn-lg btn-success btn-block' href='login.php'>Login</a><h1>

												</div>
									</div>
									</div>
							</div>
							</div>";
				}
    }else{
?>


<div class="container">
		<div class="row"  style="margin-top: 15% !important;" >
				<div class="" style='margin: auto'>
						<div class="login-panel panel panel-default" id="changeDiv"
						 style=' box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width: 400px; padding: 20px;'>
								<div class="panel-heading">
										<h3 class="panel-title text-center" style="font-weight:bold">Please Log In</h3>
								</div>
								<div class="panel-body">
										<form role="form" name="login" method="post" id="login">
												<!-- <fieldset> -->
														<div class="form-group">
																<input class="form-control " placeholder="Username" name="username" type="text" autofocus>
														</div>
														<div class="form-group">
																<input class="form-control" placeholder="Password" name="password" type="password" value="">
														</div>
														<div class="checkbox">
																<label>
																		<!-- <input name="remember" type="checkbox" value="Remember Me"> Remember Me -->
																</label>
														</div>
														<!-- Change this to a button or input when using this as a form -->
														<button type="submit"  class="btn btn-lg btn-success btn-block">Login</button><br>
												<!-- </fieldset> -->
										</form> <br>
										<div class="well">
											<h3 style="color:blue;" class="text-center">Not Registered? </h3>
											<a href="registration.php" class="btn btn-lg btn-danger btn-block">Register</a>

										</div>
								</div>
						</div>
				</div>
		</div>
</div>

<!-- jQuery -->
<script type="text/javascript" src="../../public/js/jquery.1.11.1.js"></script>
<script type="text/javascript" src="../../public/bootstrap4/js/bootstrap.min.js"></script>



<br /><br />
<script type="text/javascript">
</script>
</div>
<?php } ?>


</body>
</html>
