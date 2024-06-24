<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Overlogic</title>
  <link href="/features/auth/styles/style.css" rel="stylesheet" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="shortcut icon" href="../../../assets/logog.png" type="image/x-icon">
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
    }
    .SplashPage {
      width: 100%;
      min-height: 100vh;
      background-image: url('../../../assets/bg_lp.png');
      display: flex;
      flex-direction: column;
    }
    .content-wrapper {
      display: flex;
      flex-grow: 1;
      justify-content: center;
      align-items: center;
      padding: 2rem;
      flex-direction: column;
    }
    .content-box {
      background: white;
      border-radius: 25px;
      padding: 2rem;
      display: flex;
      max-width: 1200px;
      width: 100%;
    }
    .left-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .right-content {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .title {
      color: #242424;
      font-size: 50px;
      font-weight: 600;
      line-height: 49px;
      margin-bottom: 1rem;
    }
    .subtitle {
      color: #242424;
      font-size: 20px;
      font-weight: 700;
      line-height: 25px;
      margin-bottom: 2rem;
    }
    .login-button {
      background: #0F1322;
      border-radius: 15px;
      color: #D9D9D9;
      font-size: 21px;
      font-weight: 600;
      text-decoration: none;
      padding: 1rem 2rem;
      display: inline-block;
    }
    .image-wrapper img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
    }
  </style>
</head>

<body>
  <div class="SplashPage">
    <div class="Group290" data-aos="fade-right" style="margin: 1rem;">
      <div class="OverloIc">
        <img src="../../../assets/Logo Tulisan.png" alt="Company Logo">
      </div>
    </div>
    <div class="content-wrapper">
      <div class="content-box" data-aos="fade-up">
        <div class="left-content">
          <h1 class="title" data-aos="fade-up" data-aos-delay="300">EMPLOYEE <br />MANAGEMENT SYSTEM</h1>
          <h3 data-aos="fade-up" data-aos-delay="300">For Overlogic Administrator</h3>
          <p class="subtitle" data-aos="fade-up" data-aos-delay="400">Welcome !</p>
          <a href="/login" class="login-button" data-aos="zoom-in" data-aos-delay="500">Log in</a>
        </div>
        <div class="right-content">
          <div class="image-wrapper" data-aos="fade-left" data-aos-delay="600">
            <img src="../../../assets/Discussion.png" alt="Discussion Image">
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    });
  </script>
</body>

</html>
