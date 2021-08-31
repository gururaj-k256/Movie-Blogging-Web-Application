<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Vibin'</title>
        <link href="logo.png" rel="icon" type="image/icon type">
        
        <!--style----->
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <style>
            body
            {
                font-family: 'Josefin Sans', sans-serif;
            }
            nav .user h4
            {
                position: absolute;
                left: 125px;
                top: 12px;
                color: #cfcfcf;
                text-transform: uppercase;
                padding-left: 10px;
            }
            
            nav{
                display: flex;
                justify-content: space-around;
                align-items: center;
                width:100%;
                height: 70px;
                color: #fff;
                border:1px solid rgba(0,0,0,0.04);
                background-color: #111;
                position: fixed;
                z-index: 100;
                padding-right: 375px;

            }
            .logo img{
                position: absolute;
                top: 10px;
                left: 55px;
                height: 35px;
            }
            nav .menu{
                display: flex;
                background-color: #111;
            }
            nav .menu li a{
                height: 40px;
                line-height: 43px;
                margin: 0px;
                padding: 0px 22px;
                display: flex;
                font-size: 16px;
                text-transform: uppercase;
                font-weight: 500;
                color:rgb(214, 214, 214);
                letter-spacing: 1px;
            }
            nav .menu li a:hover{
                background-color: #242424;
                color:#ffffff;
                box-shadow: 5px 10px 30px rgba(53,53,53,0.1);
                border-radius: 3px;
                font-size: 20px;
                transition: all ease 0.2s;
            }
            body{
                margin:0px;
                padding: 0px;
                font-family: 'Josefin Sans', sans-serif;
                color: #fff;
                background-color: #111;
            }
            *{
                box-sizing: border-box;
            }
            ul{
                list-style: none;
            }
            a{
                text-decoration: none;
            }
            
            #main{
                padding-top: 80px;
                background-color: #111;
            }

            .container{
                height: 400px;
                width: 1300px;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                background-color: #111;
                color: #fff;
                box-shadow: 5px 15px 30px rgba(0,0,0,0.3);
                border-radius: 10px;
                margin:0px 20px 10px 20px;
                overflow: hidden;
            }

            .item{
                width:100%;
                height: 100%;
                object-fit: cover;
                object-position: top;
            }

            .cs-hidden{
                overflow: visible !important;
            }

            .movies-box{
                width:300px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-direction: column;
                box-shadow: 2px 2px 30px rgba(0,0,0,0.2);
                margin: 20px;
                border-radius: 5px;
                overflow: hidden;
                border-top: 3px solid #111;
            }
            .movies-img{
                width:100%;
                height: 400px;
                position: relative;
            }
            .movies-img img{
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .movies-box a{
                text-align:center;
                display: block;
                display: -webkit-box;
                max-width: 80%;
                -webkit-line-clamp: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
                text-transform: uppercase;
                color: #cfcfcf;
                font-size: 15px;
                margin: 10px;
            }
            .movies-box:hover{
                transform: translateY(-20px);
                transition: all ease 0.4s;
            }
            #movies-list{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
            }

            .btns{
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .btns a{
                font-family: 'Josefin Sans', sans-serif;
                width: 130px;
                height: 40px;
                border:none;
                outline: none;
                color: #111;
                background-color: #f8d406;
                margin: 10px;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 14px;
                text-transform: uppercase;
            }
            .btns a:hover{
                background-color: #fc7a00dc;
                transform: translateY(-5px);
                transition: all ease 0.4s;
            }

            nav .menu-btn{
                display: none;
            }

            nav .user h4
            {
                color: #cfcfcf;
                text-transform: uppercase;    
            }

            footer{
                font-size: 16px;
                border-radius: 5px;
                height: 200px;
                padding: 60px;
                vertical-align: middle;
                justify-content: space-between;
                text-align: center;
                background-color: #222;
            }

            @media(max-width:1100px){
                nav{
                    justify-content: space-between;
                    height: 70px;
                    padding: 0px 10px;
                }
                nav .menu{
                display: none;
                    position: absolute;
                    top: 65px;
                    left: 0px;
                    background: #111;
                    border-bottom:4px solid #242424;
                    width:100%;
                    padding:0px;
                    margin:0px;
                }
                .menu li{
                    width:100%;
                }
                nav .menu li a{
                    width: 100%;
                    height: 40px;
                    align-items: center;
                    margin: 0px;
                    padding:25px;
                    border:1px solid rgba(38,38,38,0.03);
                }
            
                nav .menu-icon{
                    cursor: pointer;
                    float: right;
                    padding:28px 20px;
                    position: relative;
                    user-select: none;
                    display: block;
                }
                nav .menu-icon .nav-icon{
                    background-color: #333333;
                    display: block;
                    height: 2px;
                    position: relative;
                    transition: background 0.2s ease-out;
                    width: 18px;
                }
                nav .menu-icon .nav-icon:before,
                nav .menu-icon .nav-icon:after{
                    background: #333333;
                    content: '';
                    display: block;
                    height: 100%;
                    position: absolute;
                    transition: all ease-out 0.2s;
                    width: 100%;
                }
                nav .menu-icon .nav-icon:before{
                    top:5px;
                }
                nav .menu-icon .nav-icon:after{
                    top:-5px;
                }
                nav .menu-btn:checked ~ .menu-icon .nav-icon{
                    background: transparent;
            
                }
                nav .menu-btn:checked ~ .menu-icon .nav-icon:before{
                    transform: rotate(-45deg);
                    top: 0;
                }
                nav .menu-btn:checked ~ .menu-icon .nav-icon:after{
                    transform: rotate(45deg);
                    top: 0;
                }
                nav .menu-btn{
                    display: none;
                }
                nav .menu-btn:checked ~ .menu{
                    display: block;
                }
            }
            @media(max-width:680px){
                .showcase-box{
                    max-width: 300px;
                    height: 180px;
                    margin: 10px;
                }
                .latest-box{
                    width:190px;
                    margin: 20px 5px;
                }
                .movies-box{
                    flex-direction: row;
                    width:90%;
                    border: 1px solid rgba(0,0,0,0.2);
                }
                .movies-box a{
                    width:65%;
                }
                footer{
                    justify-content: space-between;
                    padding:0px 20px;
                    text-align: center;
                    background-color: #111;
                }
            }
            @media(max-width:440px){
                .movies-box a,.movies-box{
                    width: 100%;
                }
                .movies-box{
                    flex-direction: column;
                }
                .logo img{
                    height: 30px;
                }
            }
        </style>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
        <link href="homepage.css" rel="stylesheet" type="text/css">

        <script type ="text/javascript" src="homepage.js"></script>

    </head>
    <body>
        <!--navigation-------------->
        <nav>
            <!--logo--------------->
            <a href="homepage.php" class="logo">
                <img src="logo.png" style = "height: 50px; width: 50px;"/>
            </a>
            <!--menu--btn----------------->
            <input type="checkbox" class="menu-btn" id="menu-btn"/>
            <label class="menu-icon" for="menu-btn">
                <span class="nav-icon"></span>
            </label>
            <div class="user"><h4>hello, <?php echo $user_data['user_name']; ?>!</h4></div>
            <!--menu-------------->
            <ul class="menu">
                <li><a href="homepage.php">Home</a></li>
                <li><a href="homepage.php">Movies</a></li>
                <li><a href="logout.php">Log Out</a></li>
                <li><a href="aboutUs.html">About Us</a></li>
            </ul>
            
        </nav>
        
        <br><br><br>
        <!--slideshow-->
        <div class="container">
             
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
              </ol>
          
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img src="slideshow/ALVP-Poster-1 for slideshow2.jpeg" alt="S-1" style="width:100%;">
                </div>
          
                <div class="item">
                  <img src="slideshow/kirik party slideshow2.jpg" alt="S-2" style="width:100%;">
                </div>
              
                <div class="item">
                  <img src="slideshow/scam 1992 slideshow2.jpg" alt="S-3" style="width:100%;">
                </div>

                <div class="item">
                    <img src="slideshow/kgf slideshow 2.jpg" alt="S-4" style="width:100%;">
                </div>

                <div class="item">
                    <img src="slideshow/the sky is pink slideshow2.jpg" alt="S-5" style="width:1300px;">
                </div>

              </div>
          
              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>

        <!--movies-->
            <br><br>
        <section id="movies-list">
            <div class="movies-box">
                <!--img------------>
                <div class="movies-img">
                    <img src="tiles/chhichhore tile2.jpg">
                </div>
                <!--text--------->
                <a href="chhi.html">
                    Chhichhore
                </a>
            </div>
            <div class="movies-box">
                <!--img------------>
                <div class="movies-img">
                    <img src="tiles/sorarai pottru tile.jpg">
                </div>
                <!--text--------->
                <a href="sp.html">
                    Soorarai Pottru
                </a>
            </div>

            <div class="movies-box">
                <!--img------------>
                <div class="movies-img">
                    <img src="tiles/brooklyn 99 tile.jpg">
                </div>
                <!--text--------->
                <a href="B99.html">
                    Brooklyn Nine Nine
                </a>
            </div>

            <div class="movies-box">
                <!--img------------>
                <div class="movies-img">
                    <img src="tiles/mirzapur tile 2.jpg">
                </div>
                <!--text--------->
                <a href="mirzapur.html">
                    Mirzapur
                </a>
            </div>

            <div class="movies-box">
                <!--img------------>
                <div class="movies-img">
                    <img src="tiles/kirik tile.jpg">
                </div>
                <!--text--------->
                <a href="kirikparty.html">
                    Kirik Party
                </a>
            </div>

            <div class="movies-box">
                <!--img------------>
                <div class="movies-img">
                    <img src="tiles/family man tile.jpg">
                </div>
                <!--text--------->
                <a href="family.html">
                    The Family Man
                </a>
            </div>
            
            <div class="movies-box">
                <!--img------------>
                <div class="movies-img">  
                    <img src="tiles/scam '92.jpg">
                </div>
                <!--text--------->
                <a href="scam.html">
                    Scam 1992
                </a>
            </div>
            
            <div class="movies-box">
                <!--img------------>
                <div class="movies-img">
                    <img src="tiles/soul tile.jpg">
                </div>
                <!--text--------->
                <a href="soul.html">
                    Soul
                </a>
            </div>

            <div class="movies-box">
                <!--img------------>
                <div class="movies-img">
                    <img src="tiles/vaikunthapurramalo.jpg">
                </div>
                <!--text--------->
                <a href="alvp.html">
                    Ala Vaikunthapurramaloo
                </a>
            </div>

            <div class="movies-box">
                <!--img------------>
                <div class="movies-img">
                    <img src="tiles/theskyispink tile.jpeg">
                </div>
                <!--text--------->
                <a href="sky.html">
                    The Sky is Pink
                </a>
            </div>
            <div class="movies-box">
                <!--img------------>
                <div class="movies-img">
                    <img src="tiles/Ludo tile.jpg">
                </div>
                <!--text--------->
                <a href="ludo.html">
                    Ludo
                </a>
            </div>
            <div class="movies-box">
                <!--img------------>
                <div class="movies-img">
                    <img src="tiles/kgf tile.png">
                </div>
                <!--text--------->
                <a href="kgf.html">
                    K.G.F
                </a>
            </div>
            <div class="movies-box">
                <!--img------------>
                <div class="movies-img">
                    <img src="tiles/znmd tile.jpg">
                </div>
                <!--text--------->
                <a href="znmd.html" style = "font-size: 15px;">
                    Zindagi Na Milegi Doobara
                </a>
            </div>
            <div class="movies-box">
                <!--img------------>
                <div class="movies-img">
                    <img src="tiles/joker tile.jpg">
                </div>
                <!--text--------->
                <a href="joker.html">
                    Joker
                </a>
            </div>
            <div class="movies-box">
                <!--img------------>
                <div class="movies-img">
                    <img src="tiles/jab we met tile.jpg">
                </div>
                <!--text--------->
                <a href="jab.html">
                    Jab We Met
                </a>
            </div>
        </section>
        
        <!--btns--------------->
        <div class="btns">
            <a href="homepage.php">Back to top</a>
        </div>

        <footer>
            <p>Stay Home, Stay Safe</p>
            <p>Sit And Watch From Home</p>
            <p>&#169;Vibin'</p>
            <p>&#174;All Rights Reserved</p>
        </footer>

    </body>
</html>