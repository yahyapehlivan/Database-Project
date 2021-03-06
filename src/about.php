<html lang="en">
<head>
	<title>About</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
	<style>
		body{
			margin: 0;
			padding: 0;
			background-image: linear-gradient(rgba(94,109,140,0.8), rgba(125,125,152,0.9)), url("css/images/background_login_register.jpg");
/*			background-image: linear-gradient(rgba(0, 0, 50, 0.5), rgba(0, 0, 50, 0.5)), url("css/images/background.png");*/
			background-size: cover;
			background-position: center;

		}
		.container{
			width: 90vw;
			height: 90vh;
		}
		h1{
			color: white;
			text-shadow: 1.5px 1.5px gray;
			font-size: 5vw;
			margin-top: 15vh;
			font-family: Berkshire Swash;
		}
		p{
			color: white;
			padding-left: 2vw;
			top: 0; right: 0; bottom: 0; left: 0;
			font-family: Berkshire Swash;
			font-size: 2vw;
			font-style: italic;
			letter-spacing: 2px;
		}
	</style>

</head>
<body>
	<?php
	session_start();	
	// If developer didn't sign out, direct her/him to developer homepage
	if(isset($_SESSION['developer_logged_in']))
		header("Location: developer.php");
	// If representative didn't sign out, direct her/him to representative homepage
	if(isset($_SESSION['representative_logged_in']))
		header("Location: representative.php");	
	?>
	<nav class="navbar navbar-inverse">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand">CSCareer</a>
    		</div>
    		<ul class="nav navbar-nav">
      			<li><a href="index.php">Home</a></li>
      			<li class="dropdown">
        			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Developer
        			<span class="caret"></span>
					</a>
        			<ul class="dropdown-menu">
          				<li><a href="developer-login.php">Sign In</a></li>
          				<li><a href="developer-register.php">Sign Up</a></li>
        			</ul>
      			</li>
      			<li class="dropdown">
        			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Representative
        			<span class="caret"></span>
					</a>
        			<ul class="dropdown-menu">
          				<li><a href="representative-login.php">Sign In</a></li>
          				<li><a href="representative-register.php">Sign Up</a></li>
        			</ul>
      			</li>
				<li><a href="companies.php">Companies</a></li>
      			<li class="active"><a href="">About</a></li>
    		</ul>
  		</div>
	</nav>
  
	<div class="container">
 		<h1>What is CSCareer?</h1>
		<div class="row">
			<p>CSCareer is a quiz-based hiring system for computer-science related departments. It will be implemented as the term project of CS353 Database Systems course. For further information, you can look at the <a href="https://hamzapehlivan.github.io/Database-Project/">report page</a>.</p>
		</div>
	</div>

</body>
</html>
