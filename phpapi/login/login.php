<?php
   include("config.php");

   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      echo $username;
      echo $password;
      $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
    
    
      if($count == 1) {
        
         $_SESSION['login_user'] = $username;
         
         header("location:../index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>


<html>


  <title>Todo list login</title>
  <head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>



  <!--nav class="navbar navbar-toggleable-sm bg-info navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
        
    <ul class="nav navbar-nav navbar-right">
        <li><a href="./login/logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
    </ul>
  </div>
</nav-->

<nav class="navbar navbar-toggleable-sm bg-info navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">ToDOs.com</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="./register.php">Register</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="./login/logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
    </ul>
  </div>
</nav>
  
  
	
    <div class="card-body"> 
      <div class="header">

      <b><strong><h2>Login</h2></strong></b>
      </div>

       <form method="post" action="login.php">
  	     <div class="input-group">
  	     	<label>Username</label>
  		      <input type="text" name="username"  >
  	          <label>Password</label>
  		      <input type="password" name="password">
  	     </div>
  	   <div class="input-group">
  	     	<button style="color: black" type="submit" class="btn" name="login_user">Login</button>
      </div>
  	<p style="color: white" align="center">
  		Not yet a member? <a style="color: yellow" href="register.php">Sign up</a>
  	</p>
  </form>
</div>
</body>
</html>