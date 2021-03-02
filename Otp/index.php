<?php
    if(isset($_POST['sendopt'])) {
        require('textlocal.class.php');
        require('credential.php');

        $textlocal = new Textlocal(false, false, API_KEY);
        $numbers = array($_POST['mobile']);

        $sender = 'TXTLCL';
        $otp = mt_rand(10000, 99999);
        $message = "Hello This is your OTP: " . $otp;

        try {
            $result = $textlocal->sendSms($numbers, $message, $sender);
            setcookie('otp', $otp);
            echo "OTP successfully send..";
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    if(isset($_POST['verifyotp'])) { 
        $otp = $_POST['otp'];
        if($_COOKIE['otp'] == $otp) {
            header("location:http://localhost/open%20page/expert/Epassuser/Apply%20Form/index.php");
        } else {
            echo "Please enter correct otp.";
        }
    }                 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.js"></script>
    <style>
        @import url('https://rsms.me/inter/inter-ui.css');
        ::selection {
            background: #2D2F36;
        }
        ::-webkit-selection {
            background: #2D2F36;
        }
        ::-moz-selection {
            background: #2D2F36;
        }
        body {
            background: white;
            font-family: 'Inter UI', sans-serif;
            margin: 0;
            padding: 20px;
        }
        .page {
            background: #dbeffd;
            display: flex;
            flex-direction: column;
            height: calc(100% - 40px);
            position: absolute;
            place-content: center;
            width: calc(100% - 40px);
        }
        @media (max-width: 767px) {
            .page {
                height: auto;
                margin-bottom: 20px;
                padding-bottom: 20px;
            }
        }
        .container {
            display: flex;
            height: 380px;
            margin: 0 auto;
            width: 700px;
        }
        @media (max-width: 767px) {
            .container {
                flex-direction: column;
                height: 630px;
                width: 320px;
            }
        }
        .left {
            background: white;
            height: calc(100% - 40px);
            top: 20px;
            position: relative;
            width: 50%;
        }
        @media (max-width: 767px) {
            .left {
                height: 100%;
                left: 20px;
                width: calc(100% - 40px);
                max-height: 270px;
            }
        }
        .login {
            font-size: 50px;
            font-weight: 900;
            margin: 50px 40px 40px;
        }
        .eula {
            color: #999;
            font-size: 14px;
            line-height: 1.5;
            margin: 40px;
        }
        .right {
            background: #ffffff;
            box-shadow: 0px 0px 40px 16px rgba(0,0,0,0.22);
            color: #F1F1F2;
            position: relative;
            width: 55%;
        }
        @media (max-width: 767px) {
            .right {
                flex-shrink: 0;
                height: 100%;
                width: 100%;
                max-height: 350px;
            }
        }
        svg {
            position: absolute;
            top:3px;
            width: 320px;
        }
        .otpline{
            top:132px;
        }
        path {
            fill: none;
            stroke: url(#linearGradient);;
            stroke-width: 4;
            stroke-dasharray: 240 1386;
        }
        .form {
            margin: 45px;
            position: absolute;
        }
        label {
            color:  #000000;
            display: block;
            font-size: 16px;
            margin-top: 20px;
            margin-bottom: 5px;
            font-weight:800;
        }
        input {
            background: transparent;
            border: 0;
            color: #79787c;
            font-size: 18px;
            height: 30px;
            line-height: 30px;
            outline: none !important;
            width: 100%;
        }
        input::-moz-focus-inner {
            border: 0;
        }
        .sbt {
            color: #000000;
            margin-top: 20px;
            margin-left:-10px;
            transition: color 300ms;
            font-size: 17px;
            font-weight: 550;
        }
        .sbt:focus {
            color: #7a7a7a;
        }
        .sbt:active {
            color: #7a7a7a;
        }
        #submit {
            color: #000000;
            margin-top: 20px;
            margin-left:-10px;
            transition: color 300ms;
            font-size: 17px;
            font-weight: 550;
        }
        #submit:focus {
            color: #7a7a7a;
        }
        #submit:active {
            color: #7a7a7a;
        }
        #mobile,#otp{
            font-size:15px;
        }
    </style>
</head>
<body>
<div class="page">
    <div class="container">
        <div class="left">
            <div class="login">Login</div>
            <!-- <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read</div> -->
        </div>
        <div class="right">
            <svg viewBox="0 0 320 300">
                <defs>
                    <linearGradient
                            inkscape:collect="always"
                            id="linearGradient"
                            x1="13"
                            y1="193.49992"
                            x2="307"
                            y2="193.49992"
                            gradientUnits="userSpaceOnUse">
                        <stop
                                style="stop-color:#d9ff00;"
                                offset="0"
                                id="stop876" />
                        <stop
                                style="stop-color:#02e620;"
                                offset="1"
                                id="stop878" />
                    </linearGradient>
                </defs>
                <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
            </svg>
            <svg class="otpline" viewBox="0 0 320 300">
                <defs>
                    <linearGradient
                            inkscape:collect="always"
                            id="linearGradient"
                            x1="13"
                            y1="193.49992"
                            x2="307"
                            y2="193.49992"
                            gradientUnits="userSpaceOnUse">
                        <stop
                                style="stop-color:#d9ff00;"
                                offset="0"
                                id="stop876" />
                        <stop
                                style="stop-color:#02e620;"
                                offset="1"
                                id="stop878" />
                    </linearGradient>
                </defs>
                <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
            </svg>
            <div class="form">
                <form role="form" method="post" enctype="multipart/form-data">

                    <label for="mobile">PHONE NO</label>
                    <input type="text" id="mobile" name="mobile" maxlength="10" placeholder="Enter your Mobile Number" required>

                    <input type="submit" name="sendopt" class="sbt" value="SEND OTP">
                </form>
                <form method="POST" action="">
                    <label for="otp">OTP</label>
                    <input type="text" id="otp" name="otp" placeholder="Enter OTP" maxlength="5" required="">
                    <input type="submit" name="verifyotp" id="submit" value="SUBMIT">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>