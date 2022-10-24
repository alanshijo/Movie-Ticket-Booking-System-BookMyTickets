<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Register</title>
    <style>
        * {
            box-sizing: border-box;
            }
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
        padding-top: 30px;
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
        .ticket{
            position: absolute;
            width: 561px;
            height: 497px;
            left: 180px;
            top: 163px;
        }
        .ticket a{
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            font-size: 20px;
            line-height: 30px;
            margin-left: 50px;
            text-decoration: none;
            color: black;
        }
        table{
            position: absolute;
            left: 950px;
            top: 44px;
        }
        table label{
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            font-size: 20px;
            line-height: 48px;
        }
        input:not([type=submit]){
            box-sizing: border-box;
            background: #D9D9D9;
            border: 2px solid #757070;
            border-radius: 9px;
            width: 400px;
            height: 45px;
            padding: 10px;
        }
        input[type="submit"] {
            position: absolute;
            background: #1E1E1E;
            height: 40px;
            width: 400px;
            border: none;
            border-radius: 10px;
            color: white;
            font-family: 'Poppins';
        }
        input[type="submit"]:hover{
            background-color: #000000;
            cursor: pointer;
        }
        ::placeholder{
            font-family: 'Poppins';
            font-weight: 700;
        }
        .message {
            color: #FF0000;
            font-size: small;
            font-weight: bold;
            }
        </style>
<!-- <script type="text/javascript">
function phone()
{
var m=document.getElementById("phn").value;
var str=/^[0-9]{10}$/;
 if(str.test(m)==false)
   alert("Invalid mobile number");
}
function email()
{
var a=document.getElementById("ema").value;
var st=/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/;
if(st.test(a)==false)
alert("Invalid email id");
}
function passValid(){
    if(document.getElementById('pass').value != document.getElementById('cpass').value){
        input.setCustomValidity("Password doesnot match");
    }
}
</script> -->
<script>
function validateForm() {
    var pw1 = document.getElementById("pass").value;
    var pw2 = document.getElementById("cpass").value;
    if(pw2!="" && pw1 != pw2) {
        //alert("Passwords doesnot match");
        // pw2 = setCustomValidity("Passwords are not same");
        // pw2.reportValidity();
        //return false;
        document.getElementById('msg1').style.display = "block";
        document.getElementById('msg1').innerHTML = "Password doesnot match";
        return false;
    }
    else{
        document.getElementById('msg1').style.display = "none";
    }
    var a=document.getElementById("ema").value;
    var st=/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/;
    if(a!="" && st.test(a)==false){
        //alert("Invalid email id");
        document.getElementById('message').style.display = "block";
        document.getElementById('message').innerHTML = "Invalid Email id";
        return false;
    }
    else{
        document.getElementById('message').style.display = "none";
    }

    var ph = document.getElementById("phn").value;
    var expr = /^[6-9]\d{9}$/;
    if(ph!="" && expr.test(ph)==false){
        document.getElementById('msg2').style.display = "block";
        document.getElementById('msg2').innerHTML = "Invalid Phone number";
        return false;
    }
    else{
        document.getElementById('msg2').style.display = "none";
    }
    var fn = document.getElementById("fname").value;
    var ln = document.getElementById("lname").value;
    var namestr = /^[A-Za-z]+$/;
    if(fn!="" && namestr.test(fn)==false){
        document.getElementById('fmsg').style.display = "block";
        document.getElementById('fmsg').innerHTML = "Name must be alphabets only";
        return false;
    }
    else{
        document.getElementById('fmsg').style.display = "none";
    }
    if(ln!="" && namestr.test(ln)==false){
        // alert("Invalid email id");
        document.getElementById('lmsg').style.display = "block";
        document.getElementById('lmsg').innerHTML = "Name must be alphabets only";
        return false;
    }
    else{
        document.getElementById('lmsg').style.display = "none";
    }
}
</script>
</head>
<body>
    <div class="navbar">
        <a class="left" href="index.php"><img src="imgs/main-logo.png" alt="BookMyTickets" width="200" height="80"></a>
    </div>
    <div class="ticket">
        <img src="imgs/register-poster.png" alt="register-poster"><br><br>
        <a href="login.php"> Already have an account? Login</a>
    </div>
    <form action="register_conn.php" method="POST" onsubmit ="return validateForm()">
    <table>
        <tr><td style="font-family: 'Poppins';font-size: 36px;padding-top: 35px;font-weight: 900;">Register</td></tr>
        <tr><td><label for="Name">Name</label></td></tr>
        <tr><td><input type="text" name="fname" id="fname" placeholder="Firstname" onblur="return validateForm()" onKeyUp="return validateForm()" required" style="width: 195px"></td>
            <td><input type="text" name="lname" id="lname" placeholder="Lastname" onblur="return validateForm()" onKeyUp="return validateForm()" required" style="width: 195px;margin-left: -200px;"></td>
        </tr>
        <td><span class="message" id="fmsg"></span></td>
        <td><span class="message" id="lmsg" style="margin-left: -200px;"></span></td>
        <tr><td><label for="email">Email</label></td></tr>
        <tr><td><input type="email" name="mail" placeholder="Enter your email address" id="ema" onblur="return validateForm()" onKeyUp="return validateForm()" required pattern="/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/" title="Please enter a valid email address"></td></tr>
        <td><label class="message" id="message"></td>
        <tr><td><label for="phone">Phone no.</label></td></tr>
        <tr><td><input type="tel" name="phone" placeholder="Enter your phone number" id="phn" onblur="return validateForm()" onKeyUp="return validateForm()" required pattern="^[6-9]\d{9}$" title="Please enter a valid phone number"></td></tr>
        <tr><td><label class="message" id="msg2"></td></tr>
        <tr><td><label for="password">Password</label></td></tr>
        <tr><td><input type="password" name="password" id="pass" onblur="return validateForm()" onKeyUp="return validateForm()" placeholder="Enter your new password here" required></td></tr>
        <tr><td><label for="confirm-password">Confirm Password</label></td></tr>
        <tr><td><input type="password" name="confirm-password" id="cpass" placeholder="Re-enter your password here" onblur="return validateForm()" onKeyUp="return validateForm()" required></td></tr>
        <td><label class="message" id="msg1"></td>
        <tr><tr></tr></tr>
        <tr><td><input type="submit" name="register" value="Signup"></td></tr>
    </table>
    </form>
</body>
</html>