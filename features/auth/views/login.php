<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="./style.css" rel="stylesheet" />
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        background-color: #061B44;

    }

    .Awalan {
        width: 1280px;
        height: 832px;
        background: white;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .Group289 {
        width: 1280px;
        height: 832px;
        position: relative;
    }

    .background {
        width: 1280px;
        height: 832px;
        position: absolute;
        left: 0;
        top: 0;
    }

    .Rectangle-Bg {
        width: 1280px;
        height: 832px;
        position: absolute;
        left: 0;
        top: 0;
        background: #E6E6E6;
    }

    .Rectangle-Container {
        width: 1080px;
        height: 678px;
        position: absolute;
        left: 100px;
        top: 77px;
        background: white;
        border-radius: 25px;
    }

    .Image-WorkTeam {
        width: 432px;
        height: 648px;
        position: absolute;
        left: 732px;
        top: 92px;
        border-radius: 30px;
    }

    .Image-LogoOverLogic {
        width: 66px;
        height: 66px;
        position: absolute;
        left: 381px;
        top: 126px;
    }

    .WelcomeBack {
        width: 298px;
        height: 17px;
        position: absolute;
        left: 265px;
        top: 222px;
        color: #242424;
        font-size: 34px;
        font-weight: 500;
        line-height: 15px;
        word-wrap: break-word;
    }

    .Admin {
        width: 298px;
        height: 17px;
        position: absolute;
        left: 265px;
        top: 258px;
        text-align: center;
        color: #242424;
        font-size: 34px;
        font-weight: 700;
        line-height: 15px;
        word-wrap: break-word;
    }

    .Email {
        width: 73px;
        height: 17px;
        position: absolute;
        left: 228px;
        top: 341px;
        text-align: center;
        color: #242424;
        font-size: 20px;
        font-weight: 600;
        line-height: 15px;
        word-wrap: break-word;
    }

    .PlaceHolder-Email {
        width: 272px;
        height: 17px;
        position: absolute;
        left: 235px;
        top: 383px;
        opacity: 0.25;
        text-align: center;
        color: #242424;
        font-size: 16px;
        font-weight: 500;
        line-height: 15px;
        word-wrap: break-word;
    }

    .Password {
        width: 101px;
        height: 17px;
        position: absolute;
        left: 228px;
        top: 435px;
        text-align: center;
        color: #242424;
        font-size: 20px;
        font-weight: 600;
        line-height: 15px;
        word-wrap: break-word;
    }

    .PlaceHolder-Password {
        width: 272px;
        height: 17px;
        position: absolute;
        left: 212px;
        top: 477px;
        opacity: 0.25;
        text-align: center;
        color: #242424;
        font-size: 16px;
        font-weight: 500;
        line-height: 15px;
        word-wrap: break-word;
    }

    .ForgotPassword {
        width: 121px;
        height: 17px;
        position: absolute;
        left: 490px;
        top: 518px;
        text-align: center;
        color: #4B76D3;
        font-size: 12px;
        font-weight: 500;
        line-height: 15px;
        word-wrap: break-word;
    }

    .Input-Container {
        width: 381px;
        height: 48px;
        position: absolute;
        left: 223px;
        top: 368px;
        border-radius: 30px;
        border: 1px #061B44 solid;
        padding: 0px 20px 0px 20px;
    }

    .Input-Password-Container {
        width: 381px;
        height: 48px;
        position: absolute;
        left: 223px;
        top: 462px;
        border-radius: 30px;
        border: 1px #061B44 solid;
        padding: 0px 20px 0px 20px;
    }

    .Login-Button-Container {
        width: 381px;
        height: 48px;
        position: absolute;
        left: 223px;
        top: 550px;
        background: #242424;
        border-radius: 30px;
    }

    .PasswordHideAndSee-Icon {
        width: 24px;
        height: 24px;
        position: absolute;
        left: 563px;
        top: 470px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .LogIn {
        width: 101px;
        height: 17px;
        position: absolute;
        left: 363px;
        top: 565px;
        text-align: center;
        color: #F0F0F0;
        font-size: 20px;
        font-weight: 700;
        line-height: 15px;
        word-wrap: break-word;
        cursor: pointer;
        text-decoration: none;
    }
</style>

<body>

    <div class="Awalan">
        <div class="Group289">
            <img class="background" src="../../../assets/Bg.png" alt="Background Image" />
            <div class="Rectangle-Bg"></div>
            <div class="Rectangle-Container"></div>
            <img class="Image-WorkTeam" src="../../../assets/WorkTeam.png" alt="Work Team Image" />
            <img class="Image-LogoOverLogic" src="../../../assets/LogoOverLogic.png" alt="Logo OverLogic Image" />
            <div class="WelcomeBack">WELCOME BACK!</div>
            <div class="Admin">ADMIN</div>
            <div class="Email">Email</div>
            <div class="PlaceHolder-Email">E.g. Overlogic@gmail.com</div>
            <div class="Password">Password</div>
            <div class="PlaceHolder-Password">Enter Your Password</div>
            <input class="Input-Container"></input>
            <input class="Input-Password-Container"></input>
            <div class="Login-Button-Container"></div>
            <a href="/dashboard" class="LogIn">Log in</a>
        </div>
    </div>
</body>

</html>