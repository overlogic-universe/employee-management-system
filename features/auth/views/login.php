<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="/features/auth/styles/style.css" rel="stylesheet" />
</head>
<script>
        // menampilkan error dari session
        window.onload = function() {
            <?php
            session_start();
            if (isset($_SESSION['error'])) {
                echo 'alert("' . addslashes($_SESSION['error']) . '");';
                unset($_SESSION['error']); // hapus error message dari session
            }
            ?>
        };
    </script>
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
            <form action="/login-process" method="POST">
                <div class="Email">Email</div>
                <input type="email" name="email" class="Input-Container" placeholder="E.g. Overlogic@gmail.com" required>

                <div class="Password">Password</div>
                <input type="password" name="password" class="Input-Password-Container" placeholder="Enter Your Password" required>
                <button type="submit" class="Login-Button-Container">Login</button>
            </form>
            <?php if (isset($_GET['error'])) : ?>
                <p class="ErrorMessage"><?php echo $_GET['error']; ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>