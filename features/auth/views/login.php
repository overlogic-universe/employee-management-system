<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overlogic</title>
    <link href="/features/auth/styles/style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../../../assets/logog.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
</head>

<body>
    <script>
        // menampilkan error dari session
        window.onload = function () {
            <?php
session_start();
if (isset($_SESSION['error'])) {
    echo 'alert("' . addslashes($_SESSION['error']) . '");';
    unset($_SESSION['error']); // hapus error message dari session
}
?>
        };
    </script>

    <div class="Awalan">
        <div class="Group289" data-aos="fade-up">
            <div class="Rectangle-Container"></div>
            <img class="Image-WorkTeam" src="../../../assets/WorkTeam.png" alt="Work Team Image" data-aos="fade-left" />
            <img class="Image-LogoOverLogic" src="../../../assets/logog.png" alt="Logo OverLogic Image" data-aos="fade-right" />
            <div class="WelcomeBack" data-aos="fade-up">WELCOME BACK!</div>
            <div class="Admin" data-aos="fade-up" data-aos-delay="100">ADMIN</div>
            <form action="/login-process" method="POST" data-aos="fade-up" data-aos-delay="200">
                <div class="Email">Email</div>
                <input type="email" name="email" class="Input-Container" placeholder="E.g. Overlogic@gmail.com" required>
                <div class="Password">Password</div>
                <input type="password" name="password" class="Input-Password-Container" placeholder="Enter Your Password" required>
                <button type="submit" class="Login-Button-Container">Login</button>
            </form>
            <?php if (isset($_GET['error'])): ?>
                <p class="ErrorMessage" data-aos="fade-up" data-aos-delay="300"><?php echo $_GET['error']; ?></p>
            <?php endif;?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
