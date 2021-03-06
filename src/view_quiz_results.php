<html >
	<head> 
		<title> CSCareer</title>
		<link rel="stylesheet" href="css/styles.css">
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link rel="stylesheet" href="css/developer-result-style.css">
		<link rel="stylesheet" href="css/navbar-style.css">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		
		<style>
			body, html {
			height: 100%;
			margin: 0;
			}

			.bg {
			/* The image used */
			background-image: url("background.png");

			/* Full height */
			height: 100%; 

			/* Center and scale the image nicely */
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			}
			.a {
  			margin: 0px 0px 30px 0px;
  			
			}
		</style>
		
	</head>
	
	<body>
	<!-- If representative sign out, direct her/him to homepage -->
	<?php
		session_start();
      	if(!isset($_SESSION['representative_logged_in']))
			header("Location: index.php");
	?>
	
		<nav class="navbar navbar-expand-lg bg-light navbar-dark bg-dark">
		<a class="navbar-brand" href="#">CSCareer</a>

			<ul class="navbar-nav mr-auto d-print leftm">
			
				<li class="nav-item">
					<a class="nav-link" href="representative.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="representative-profile.php">Profile</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="">View Quizzes<span class="sr-only">(current)</span></a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" href="sent_interview_request.php">Interview Requests</a>
				</li>
			</ul>
			
			<ul class = "navbar-nav navbar-right d-print rightm">
				<li>
				<a class="nav-link" href = "logout.php"><svg class="bi bi-box-arrow-in-left" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M7.854 11.354a.5.5 0 000-.708L5.207 8l2.647-2.646a.5.5 0 10-.708-.708l-3 3a.5.5 0 000 .708l3 3a.5.5 0 00.708 0z" clip-rule="evenodd"/>
				<path fill-rule="evenodd" d="M15 8a.5.5 0 00-.5-.5h-9a.5.5 0 000 1h9A.5.5 0 0015 8z" clip-rule="evenodd"/>
				<path fill-rule="evenodd" d="M2.5 14.5A1.5 1.5 0 011 13V3a1.5 1.5 0 011.5-1.5h8A1.5 1.5 0 0112 3v1.5a.5.5 0 01-1 0V3a.5.5 0 00-.5-.5h-8A.5.5 0 002 3v10a.5.5 0 00.5.5h8a.5.5 0 00.5-.5v-1.5a.5.5 0 011 0V13a1.5 1.5 0 01-1.5 1.5h-8z" clip-rule="evenodd"/>
				</svg>Log Out</a>
				 </li>
			</ul>
	</nav>
	<tr><td> <input type="hidden" name="type" value="<?php echo $alert; ?>" ></td></tr>

	<div class="bg">
		<div class = "container">
		<div class ="text-center">
		<h1 class="a"  >Result Table</h1>
		</div>
		<?php
			require_once ('connect.php');
  
            $quiz_id = $_REQUEST['quiz_id'];
            $initialClick = 1;
            $number = 1;
            
            $sql = "SELECT developer_id, total_score, fullname, user_id FROM quiz NATURAL JOIN quiztrial NATURAL JOIN developer join User  WHERE quiz_id = {$quiz_id} AND developer_id = user_id ORDER BY total_score DESC";
            $result = mysqli_query ($conn, $sql) or die(mysqli_error($conn));
            
            
            echo "<div class = container>";
            echo "<div class='row'>";
            echo "<div class = 'col-3'><h2>Ranking </h2> </div>";
            echo "<div class = 'col-3'><h2>Developer</h2> </div>";
            echo "<div class = 'col-3'><h2>Score </h2> </div>";
            echo "<div class = 'col-3'><h2>Interview </h2> </div>";
            echo "</div>";
			while ($row = mysqli_fetch_array ($result)) {
                echo "<div class='row'>";
                echo "<div class = 'col-3'><h3>{$number}</h3></div>";
                echo "<div class = 'col-3'><h3>{$row['fullname']}</h3></div>";
                echo "<div class = 'col-3'><h3> {$row['total_score']}</h3></div>";
                echo "<div class = 'col-3'><a href = 'send_request.php?&developer_id={$row['developer_id']}&quiz_id={$quiz_id}'> <button class='btn btn-secondary' >Send Request </button></a></div>";
                echo "</div> ";
				$number++; 
			}
			
			
			

			

        ?>

		</div>
		</div>
		
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>	
		
	</body>
	

</html>