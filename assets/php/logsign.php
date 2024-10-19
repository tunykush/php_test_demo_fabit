<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location:../../home.php");
    exit;
}

$loginError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['signupUsername'];
    $email = $_POST['signupEmail'];
    $password = password_hash($_POST['signupPassword'], PASSWORD_BCRYPT);

    $newUser = array(
        "username" => $username,
        "email" => $email,
        "password" => $password,
        "avatar" => "default.png"
    );

    if (!isset($_SESSION['users']) || !is_array($_SESSION['users'])) {
        $_SESSION['users'] = [];
    }

    $userList = $_SESSION['users'];

    foreach ($userList as $existingUser) {
        if ($existingUser['username'] === $username) {
            $loginError = "Username already exists!";
            break;
        } else if ($existingUser['email'] === $email) {
            $loginError = "Email already exists!";
            break;
        }
    }

    if ($loginError === "") {
        $userList[] = $newUser;
        $_SESSION['users'] = $userList;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];
    $captchaInput = trim($_POST['captchaInput']);

    if ($captchaInput !== $_SESSION['captchaText']) {
        $loginError = "Incorrect Captcha. Please try again.";
    } else {
        if (isset($_SESSION['users']) && is_array($_SESSION['users'])) {
            foreach ($_SESSION['users'] as $existingUser) {
                if ($existingUser['username'] === $username && password_verify($password, $existingUser['password'])) {
                    $_SESSION['username'] = $username;
                    header("Location:../../home.php");
                    exit;
                } else {
                    $loginError = "Invalid Username or Password!";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup</title>
    <link rel="stylesheet" href="../css/logsign.css" />
    <link rel="stylesheet" href="../css/logsigeffects.css" />
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
        <img src="../images/star22.svg" alt="Random Image" class="falling-image">
        <img src="../images/star23.svg" alt="Random Image" class="falling-image">
        <img src="../images/star24.svg" alt="Random Image" class="falling-image">
        <img src="../images/star25.svg" alt="Random Image" class="falling-image">
    </div>

    <div class="back-button">
        <a href="../../landingpage.php">Back</a>
    </div>

    <div class="container">
        <div class="form-container">
            <div class="form-toggle">
                <button class="login-form-buttons" id="loginBtn">Log In</button>
                <button class="login-form-buttons" id="signupBtn">Sign Up</button>
            </div>

            <div class="error-message">
                <?php echo $loginError; ?>
            </div>

            <!-- Login Form -->
            <form id="loginForm" class="form" method="POST">
                <h2>Log In</h2>
                <div class="input-wrapper">
                    <input class="input-field" type="text" id="loginUsername" name="loginUsername" placeholder=" " required>
                    <label class="input-label">Username</label>
                </div>
                <div class="input-wrapper">
                    <input class="input-field" type="password" id="loginPassword" name="loginPassword" placeholder=" " required>
                    <label class="input-label">Password</label>
                </div>
                <div class="captcha-container">
                    <canvas id="captchaCanvas"></canvas>
                    <button type="button" onclick="generateCaptcha()">
                        <img src="../images/captcha.svg" alt="Refresh Captcha" class="captcha-icon" width="20px" height="20px" />
                    </button>
                </div>
                <div class="input-wrapper">
                    <input class="input-field" type="text" id="captchaInput" name="captchaInput" placeholder=" " required>
                    <label class="input-label">Enter Captcha</label>
                </div>
                <button type="submit" name="login">Log In</button>
            </form>

            <!-- Signup Form -->
            <form id="signupForm" action="" class="form hidden" method="POST">
                <h2>Sign Up</h2>
                <div class="input-wrapper">
                    <input class="input-field" type="text" id="signupUsername" name="signupUsername" required>
                    <label class="input-label">Username</label>
                </div>
                <div class="input-wrapper">
                    <input class="input-field" type="email" id="signupEmail" name="signupEmail" required>
                    <label class="input-label">Email</label>
                </div>
                <div class="input-wrapper">
                    <input class="input-field" type="password" id="signupPassword" name="signupPassword" required>
                    <label class="input-label">Password</label>
                </div>
                <button type="submit" name="signup">Sign Up</button>
            </form>
        </div>
    </div>

    <script src="../js/captcha.js"></script>
    <script src="../js/logsigeffects.js"></script>
</body>

</html>