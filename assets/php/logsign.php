<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup</title>
    <link rel="stylesheet" href="../css/logsign.css" />
    <link rel="stylesheet" href="../css/logsigeffects.css" />
    <link rel="shortcut icon" href="ffavicon.svg" type="image/svg+xml" />
</head>
<body>

    <div class="falling-images-container">
        <img src="../images/star1.svg" alt="Random Image" class="falling-image">
        <img src="../images/star2.svg" alt="Random Image" class="falling-image">
        <img src="../images/star3.svg" alt="Random Image" class="falling-image">
        <img src="../images/star4.svg" alt="Random Image" class="falling-image">
        <img src="../images/star5.svg" alt="Random Image" class="falling-image">
        <img src="../images/star6.svg" alt="Random Image" class="falling-image">
        <img src="../images/star7.svg" alt="Random Image" class="falling-image">
        <img src="../images/star8.svg" alt="Random Image" class="falling-image">
        <img src="../images/star9.svg" alt="Random Image" class="falling-image">
        <img src="../images/star10.svg" alt="Random Image" class="falling-image">
        <img src="../images/star11.svg" alt="Random Image" class="falling-image">
        <img src="../images/star12.svg" alt="Random Image" class="falling-image">
        <img src="../images/star13.svg" alt="Random Image" class="falling-image">
        <img src="../images/star14.svg" alt="Random Image" class="falling-image">
        <img src="../images/star15.svg" alt="Random Image" class="falling-image">
        <img src="../images/star16.svg" alt="Random Image" class="falling-image">
        <img src="../images/star17.svg" alt="Random Image" class="falling-image">
        <img src="../images/star18.svg" alt="Random Image" class="falling-image">
        <img src="../images/star19.svg" alt="Random Image" class="falling-image">
        <img src="../images/star20.svg" alt="Random Image" class="falling-image">
        <img src="../images/star21.svg" alt="Random Image" class="falling-image">
      </div>

      <div class="back-button">
        <a href="../../landingpage.html">Back</a>
    </div>
    <div class="container">
        <div class="form-container">
            <div class="form-toggle">
                <button class="login-form-buttons" id="loginBtn">Log In</button>
                <button class="login-form-buttons" id="signupBtn">Sign Up</button>
            </div>
            <!-- Login Form -->
            <form id="loginForm" class="form" onsubmit="return validateLoginForm(event)">
                <h2>Log In</h2>
                <div class="input-wrapper">    
                    <input class="input-field" type="text" id="loginUsername" placeholder=" " required>
                    <label class="input-label">Username</label>
                </div>
                <div class="input-wrapper">    
                    <input class="input-field" type="password" id="loginPassword" placeholder=" " required>
                    <label class="input-label">Password</label>
                </div>
                <div class="captcha-container">
                    <canvas id="captchaCanvas"></canvas>
                    <button type="button" onclick="generateCaptcha()">
                        <img src="../images/captcha.svg" alt="Refresh Captcha" class="captcha-icon" width="20px" height="20px" />
                    </button>                                        
                </div>
                <div class="input-wrapper">    
                    <input class="input-field" type="text" id="captchaInput" placeholder=" " required>
                    <label class="input-label">Enter Captcha</label>
                </div>
                <button type="submit">Log In</button>
            </form>

            <!-- Signup Form -->
            <form id="signupForm" class="form hidden" onsubmit="return validateSignupForm(event)">
                <h2>Sign Up</h2>
                <div class="input-wrapper">
                    <input class="input-field" type="text" id="signupUsername"required>
                    <label class="input-label">Username</label>
                </div>
                <div class="input-wrapper">
                    <input class="input-field" type="email" id="signupEmail" required>
                    <label class="input-label">Email</label>
                </div>
                <div class="input-wrapper">
                    <input class="input-field" type="password" id="signupPassword"required>
                    <label class="input-label">Password</label>
                </div>
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>

    
    <script src="../js/script.js"></script>
    <script src="../js/captcha.js"></script>
    <script src="../js/logsigeffects.js"></script>
</body>
</html>
