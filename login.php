<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: homepage.php");
						die;
					}
				}
			}
			
			echo '<script>alert("Username or password does not match")</script>';
		}else
		{
			echo '<script>alert("Please fill valid info!!")</script>';
		}
	}

?>


<!DOCTYPE html>
<html>
  <head>
    <title>
      Sign Up / Log In
    </title>
    <link href="Logo.png" rel="icon" type="image/icon type">
    <link href="login.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="import" />  -->

    <!--using FontAwesome--------------->
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>


    <style type="text/css">
      
{
    background: #111;
    height:80px;
    background-size: cover;
    background-position: center;
    margin: 5px;
    margin-top: 0px;
    font-family:'Nunito Sans';
}
.main-nav
{
    float:right;
    list-style: none;
    margin-top: 30px;
}
.main-nav li{
    display: inline;
}
.main-nav a{
    color: white;
    text-decoration:none;
    padding: 10px 20px;
    font-family: 'Nunito Sans';
    font-size: medium;
}
.main-nav li a:hover
{
    font-family: 'Nunito Sans';
    background-color: #242424;
    color:#ffffff;
    box-shadow: 5px 10px 30px rgba(53,53,53,0.1);
    border-radius: 3px;
    font-size: 18px;
    transition: all ease 0.2s;
}
.logo img
{
    float: left;
    width: 100px;
    height: 100px ;
    
}

body{
    margin:0;
    padding:0;
    background: #111;
    font-family: 'Nunito Sans';
    
    }
    
    #box{
        height: 350px;
        width: 1200px;
        background: #092147;
        border-radius: 5px;
        position: absolute;
        top: 50%;
        left:50%;
        transform: translate(-50%,-50%);
        border-radius: 10px;
    }
    
    #main
    {
        height:450px;
        width: 650px;
        background: #0fbcf9;
        border-radius: 0px;
        position: absolute;
        top: 50%;
        left:70%;
        transform:translate(-50%,-50%);
        z-index:999;
        background: linear-gradient(-45deg,#ee7752,#5f08eb,#07f8c4,#003a13);
        background-size: 400%,400%;
        animation:gradient 10s ease infinite;
        border-radius: 20px;
    
    }
    #loginform, #signupform{
    position:absolute;
    top:-15%;
    left:70%;
    transform: translate(-50%,50%);
    z-index:999;
    
    }
    
    #signupform{
        top:-15%;
        left:75%;
        visibility:hidden ;
    }
    
    #loginform h1 , #signupform h1{
        font-family: 'Nunito Sans';
        font-size:25px;
        color: #051937;
    }
    #loginform input, #signupform input{
        height: 40px;
        width:300px;
        border:0;
        outline:none;
        border-bottom:1px solid #051937;
        margin:5px;
        background :none;
    }
    input::placeholder{
        color: #fff;
    }
    
    #loginform button , #signupform button{
        height : 35px;
        width:130px;
        background-color:#051937;
        font-family: 'Nunito Sans';
        font-size:16px;
        border:none;
        outline:none;
        border-radius:5px;
        margin-top:30px;
        margin-left:175px;
        color:#fff;
    }
    
    #loginBtn, #signupBtn{
        height:50px;
        width:120px;
        background:transparent;
        color:#0fbcf9;
        border:1px solid #0fbcf9;
        border-radius:5px;
        outline:none;
        position:absolute;
        top:65%;
        left:75%;
        transform:translate(-50%,-50%);
        transition:all 0.5s;
    }
    h2{
        position: absolute;
        left: 13%;
        top: 38%;
        text-transform: uppercase;
        font-family: 'Nunito Sans';
        color: #fff;

    }
    #signupBtn
    {
        left:25%;
    
    }
    #loginBtn hover, #signupBtn hover{
        background-color: #023F92;
        color: #fff;
        cursor: pointer;
    
    }
    #signupBtn a{
        color:white;
        font-size:15px;
        
    }
    
    
    @keyframes gradient{
        0%{background-position: 0% 50%;}
        50%{background-position: 100% 50%;}
        100%{background-position: 0% 50%;}
    
    }
    </style>

    
  </head>
  <body>
    <header>
            
        <div class="logo">
            <a href = "homepage.php"><img src="Logo.png" style = "height: 50px; width: 50px; margin-left: 56px; margin-top: 10px;"></a>
        </div>
        <div class = "row">
            <ul class = "main-nav">
            
            <li><a href = "aboutUs.html">ABOUT US</a></li>
            </ul>
        </div>
     
    </header>
    <div id="box">
        <form method ="post">
      <div id="main"></div>
      <div id="loginform">
          <br>
        <h1>LOG-IN</h1>
        <input type="text" name="user_name" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <br>
        <button>LOG-IN</button>
      </div>
      
      
     
      <h2>Don't have an account ?</h2>
    <button id ="signupBtn"><br><a href="signin.php">SIGN-UP</a><br><br></button> 
</form>
  </div>
  </body>
</html> 