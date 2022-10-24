<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="/imgs/icon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Kiwi Maru' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bree Serif' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Itim' rel='stylesheet'>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>HomePage</title>
    <style>
        body{
            background-color: #DEDEDE;
        }
     .navbar {
        overflow: hidden;
        background-color: #333;
        position: absolute;
        width: 100%;
        left: 0px;
        top: 0px;
        }


        .navbar a {
        float: right;
        color: white;
        padding-top: -5%;
        margin-right: 50px;
        text-decoration: none;
        font-family: 'Itim';
        }
        .navbar a.left {
            float: left;
            padding: 0%;
            padding-left: 25px;
        }
        .navbar a:hover {
        color: rgb(185, 185, 185);
        }
        .quote{
            position: absolute;
            width: 802px;
            height: 87px;
            left: 104px;
            top: 339px;
            font-family: 'Bree Serif';
            font-weight: 400;
            font-size: 64px;
            line-height: 87px;
        }
        .quote2{
            position: absolute;
            width: 563px;
            height: 46px;
            left: 104px;
            top: 415px;
            font-family: 'Kiwi Maru';
            font-style: normal;
            font-weight: 400;
            font-size: 32px;
            line-height: 46px;
        }
        .ticket{
            position: absolute;
            height: 512px;
            left: 837px;
            top: 95px;
        }
        footer{
            position: absolute;
            left: 0px;
            top: 700px;
            width: 100%;
        }
        </style>
</head>
<body>
      
    <div class="navbar">
        <a class="left" href="index.php"><img src="imgs/main-logo.png" alt="BookMyTickets" width="200" height="80"></a>
        <a href="login.php" style="margin-left: 68%;">LOGIN</a>
        <a href="register.php">REGISTER</a> 
      </div> 
  
        <div class="quote">
          Plan a perfect movie outing!
        </div>
        <div class="quote2">
          BOOK YOUR MOVIE TICKETS NOW
        </div>
        <div class="ticket"><img src="imgs/home-logo.png" alt="home-logo"></div>
                
          </div>
    </div>
      
      <!--footer>
        <img src="imgs/home-footer.png" alt="home-footer">
      </footer-->
      <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>