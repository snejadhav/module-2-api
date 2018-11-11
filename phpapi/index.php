<?php 
//echo "hiiii";
  session_start(); 
//echo ($_SESSION['login_user']);
  if (!isset($_SESSION['login_user'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ./login/login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['login_user']);
  	header("location: ./login/login.php");
  }


?>


<!DOCTYPE html>
<html>
	<head>
		<title>To do list</title>
		<link rel="stylesheet" type="text/css" href='style.css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>		
	</head>
<body>
	<?php  if (isset($_SESSION['login_user'])) : ?>
    			<i><p style="color: white">Welcome <strong><u><span style="color: yellow"  id="userName"><?php echo $_SESSION['login_user']; ?></span></u></strong></p></i>
    	
    		<?php endif ?>
	

<nav class="navbar navbar-toggleable-sm bg-info navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">ToDos.com</a>
    </div>
        
    <ul class="nav navbar-nav navbar-right">
        <li><a href="./login/logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
    </ul>
  </div>
</nav>

		
	
	<div class="hero">
		<div class="container">

			<h1 class="display-2" style="color: white;text-align: center">TodoList</h1>
			<p class="lead" style="color: white;text-align: center">Welcome to my todoList applications</p>
			<div class="row">
				<form id="form" class="col-lg-9 col-5 mx-auto">
					<div class="input-group">
						<input style="width:330px;" type="text" id="name" onfocus="this.value=''" value="hi" placeholder="Enter todo list item">
						<span>
							<button id="add" type="button" class="btn btn-primary">ADD!!</button>
							<div class="row">
				<button id="btnClr" type="button" class="btn btn-primary mx-auto btnHide">Clear</button>
			</div>

						</span>
					</div>			     
				</form>
			</div>			
					<div class="row">
							<table id="orders"></table>
					</div>

			
			
				<script src="./jquery-3.3.1.js"></script>
				<script src="stylesheet.js"></script>
		<script src="main.js"></script>
							
		</div>
	</div>
 	


</body>
</html>	