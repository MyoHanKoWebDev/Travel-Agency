<?php
include("connection/dbcon.php");
session_start();
ob_start(); // Start output buffering to prevent header issues

if (isset($_SESSION['cusArr1'])) {
    echo "<script>window.history.back();</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tourist - Travel Agency HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="logintest2.css">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        /***********login*********/
        .container-fluid {
            background: url('../../mainImg/mianbg.png') no-repeat center center fixed;
            background-size: cover;
            background-color: rgba(0, 0, 0, 0.22);
            font-family: 'Montserrat', sans-serif;
            min-height: 100vh;
        }

        h2 {
            text-align: center;
        }

        .text {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }

        span {
            font-size: 12px;
        }

        a {
            font-size: 14px;
            margin: 15px 0;
        }

        .btn {
            border-radius: 20px;
            border: 1px solid #86B817;
            background-color: #86B817;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
            margin: 10px 0px 3px 0px;
        }

        .btn:active {
            transform: scale(0.95);
        }

        .btn.sign:hover {
            background-color: #8bb72a;
            color: white;
        }

        /* .btn:focus {
	outline: none;
} */

        .ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }

        .ghost:hover {
            background-color: white;
            border: 1px solid white;
            color: #8bb72a;
        }

        .form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 30px;
            height: 100%;
            text-align: center;
        }

        .input {
            background-color: #eee;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            margin: 2px 0 0.5px 0;
            width: 100%;
            margin-top: 1rem;
        }

        .check {
            text-align: start;
            padding: 10px 0 0 0;
        }

        .password-container {
            position: relative;
            display: flex;
            width: 100%;
            /* align-items: center; */
            /* justify-content: center; */
        }

        .password-container input {
            width: 100%;
            padding-right: 40px;
            /* Space for eye icon */
        }

        .password-container i {
            position: absolute;
            right: 10px;
            top: 50%;
            cursor: pointer;
            color: gray;
        }

        .container {
            background-color: transparent;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 700px;
            max-width: 100%;
            min-height: 550px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            z-index: 2;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        .sign-up-container {
            left: 0;
            opacity: 0;
            z-index: 1;
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        @keyframes show {

            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .overlay {
            background: #86B817;
            background: -webkit-linear-gradient(to right, #91cc08, #749e18);
            background: linear-gradient(to right, #86B817, #93b44e);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }

        .social-container {
            margin: 20px 0;
        }

        .social-icon .img {
            border: 1px solid #DDDDDD;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 30px;
            width: 30px;
        }

        /* Reduce form width, font size, and padding for small screens */
        @media (max-width: 767px) {
            .container {
                width: 100%;
            }

            .form h1 {
                font-size: 20px;
            }

            .form {
                padding: 0px 5px;
            }

            .form .input {
                padding: 7px;
            }

            .form span {
                font-size: 12px;
            }

            .btn {
                padding: 10px 30px;
                font-size: 12px;
            }

            .overlay h1 {
                font-size: 18px;
            }

            .overlay p {
                font-size: 12px;
            }

            .overlay-panel {
                padding: 0 20px;
            }

            .social-icon .img {
                height: 25px;
                width: 25px;
                font-size: 10px;
            }
        }
    </style>
</head>

<body>
    <?php
    $nres = "";
    $pres = "";
    if (isset($_POST["signUp"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $pass = trim($_POST["pass"]);
        $hash1 = password_hash($pass, PASSWORD_DEFAULT);

        $file = $_FILES["image"];
        $filename = $_FILES["image"]["name"];
        $filetmpName = $_FILES["image"]["tmp_name"];
        $date = date("Y-m-d H:i:s");

        $valid = true;
        //name start
        $namepattern = "/^[A-Z][a-z]*( [A-Z][a-z]+)*$/";
        if (strlen($name) == 0) {
            $nres = "Please fill name field";
            $valid = false;
        } else if (strlen($name) < 5) {
            $nres = "Name must contain at least 5 character";
            $valid = false;
        } else if (!preg_match($namepattern, $name)) {
            $nres = "Field name not valid field name contains alphabets with small and capital letter.";
            $valid = false;
        }
        //name end  

        //password start
        $passpattern = "/^((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{6,})$/";
        if (strlen($pass) == 0) {
            $pres = "Please fill password field";
            $valid = false;
        } else if (strlen($pass) < 6) {
            $pres = "Password field atleast 6 characters";
            $valid = false;
        } else if (!preg_match($passpattern, $pass)) {
            $pres = "Passowrd must include number, capital and small letter";
            $valid = false;
        }
        //password end


        $fileExt = explode(".", $filename);
        $fileActExt = strtolower(end($fileExt));
        $arr = array("png", "jpeg", "jpg", "pdf", "webp");

        if ($valid == true) {
            if (in_array($fileActExt, $arr)) {
                $filenewName = uniqid('', true) . "." . $fileActExt;
                $destination = "../../mainImg/" . $filenewName;
                move_uploaded_file($filetmpName, $destination);
                $sqlcheck = "SELECT * FROM customer WHERE cusName='$name' AND cusEmail='$email' ";
                $res = mysqli_query($con, $sqlcheck);
                if (mysqli_num_rows($res) > 0) {
                    echo "<script>alert('Already exists name or email.');</script>";
                } else {
                    $sql = "INSERT INTO customer (cusName,cusEmail,cusPh,cusPw,cusImg,created) VALUES ('$name','$email','$phone','$hash1','$filenewName','$date')";
                    $check = mysqli_query($con, $sql);
                    if ($check) {
                        $lateCusId = mysqli_insert_id($con);
                        $sqlcheck = "SELECT * FROM customer WHERE cusID = $lateCusId";
                        $res = mysqli_query($con, $sqlcheck);
                        if (mysqli_num_rows($res) > 0) {
                            $cusArr1 = mysqli_fetch_assoc($res);
                            $_SESSION["cusArr1"] = $cusArr1;
                            if (isset($_SESSION['redirect_after_login'])) {
                                $redirectUrl = $_SESSION['redirect_after_login'];
                                unset($_SESSION['redirect_after_login']);
                            } else {
                                $redirectUrl = 'index.php';
                            }
            
                            header("Location: $redirectUrl");
                            exit;                        }
                       
                    } else {
                        echo "<script>alert('Something Wrong " . mysqli_error($con) . "');</script>";
                    }
                }
            } else {
                echo "<script>alert('Invalid Format. Only jpg/jpeg/png/webp/pdf format allowed');</script>";
            }
        } else {
            echo "<script>alert('All fields must correct');</script>";
        }
    }

    if (isset($_POST["signIn"])) {
        $email1 = trim($_POST['email1']);
        $pass1 = trim($_POST['pass1']);

        $sqlcheck = "SELECT * FROM customer WHERE cusEmail = ?";
        $stmt = $con->prepare($sqlcheck);
        $stmt->bind_param("s", $email1);
        $stmt->execute();
        $res = $stmt->get_result();
        if (mysqli_num_rows($res) > 0) {
            $row = $res->fetch_assoc();
            // Check if user has reached the maximum failed attempts
            if (isset($_SESSION['failed_attempts'][$email1]) && $_SESSION['failed_attempts'][$email1] >= 3) {
                $lockout_time = 480; // 8 minutes in seconds
                $last_attempt_time = $_SESSION['last_attempt_time'][$email1];

                $current_time = time();
                $time_diff = $current_time - $last_attempt_time;

                if ($time_diff < $lockout_time) {
                    $remaining_time = $lockout_time - $time_diff;
                    $remaining_minutes = floor($remaining_time / 60);
                    $remaining_seconds = $remaining_time % 60;

                    // Alert user about remaining time
                    echo "<script>
                    alert('You have tried too many times. Please wait " . $remaining_minutes . " minutes and " . $remaining_seconds . " seconds before trying again.');
                    window.location.replace('login.php');
                </script>";
                    exit;
                } else {
                    // Reset failed attempts after lockout time has passed
                    $_SESSION['failed_attempts'][$email1] = 0;
                    unset($_SESSION['last_attempt_time'][$email1]);
                }
            }

            if (password_verify($pass1, $row['cusPw'])) {
                $_SESSION['cusArr1'] = $row;

                unset($_SESSION['failed_attempts'][$email1]);
                unset($_SESSION['last_attempt_time'][$email1]);

                if (isset($_POST['remember_me'])) {
                    $token = bin2hex(random_bytes(16)); //chg token to byte to string with bin2hex
                    $expires = date("Y-m-d H:i:s", time() + (30 * 24 * 60 * 60)); // 30 days

                    $stmtToken = $con->prepare("UPDATE customer SET cusToken = ?, tokenExp = ? WHERE cusID = ?");
                    $stmtToken->bind_param("ssi", $token, $expires, $row['cusID']);
                    $stmtToken->execute();
                    $stmtToken->close();

                    // Check if headers are sent before setting the cookie
                    if (!headers_sent()) {
                        setcookie("remember_me", $token, time() + (30 * 24 * 60 * 60), "/", "", true, true);
                    }
                }

                if (isset($_SESSION['redirect_after_login'])) {
                    $redirectUrl = $_SESSION['redirect_after_login'];
                    unset($_SESSION['redirect_after_login']);
                } else {
                    $redirectUrl = 'index.php';
                }

                header("Location: $redirectUrl");
                exit;
            } else {
                if (!isset($_SESSION['failed_attempts'][$email1])) {
                    $_SESSION['failed_attempts'][$email1] = 0;
                }

                $_SESSION['failed_attempts'][$email1]++;
                $_SESSION['last_attempt_time'][$email1] = time();
                echo "<script>
                alert('Incorrect password. You have " . (3 - $_SESSION['failed_attempts'][$email1]) . " attempts left.');
                window.history.back();</script>";
            }
        } else {
            echo "<script>
            alert('No user found with this email.');
            window.history.back();</script>";
        }
    }
    ob_end_flush(); // Flush output at the end

    ?>
    <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="row g-0 container" id="container">
            <div class="col-6 form-container sign-up-container">
                <form class="form" method="post" enctype="multipart/form-data">
                    <h1 class="fw-bold m-0 fs-2">Travel Agency</h1>
                    <div class="social-container">
                        <a href="#" class="social-icon"><img src="../../mainImg/facebook .png" alt="" class="img"></a>
                        <a href="#" class="social-icon"><img src="../../mainImg/image.png" alt="" class="img"></a>
                        <a href="#" class="social-icon"><img src="../../mainImg/twitter (1).png" alt="" class="img"></a>
                    </div>
                    <span class="text-gray">or use your email for registration</span>
                    <input type="text" placeholder="Name" class="form-control input" name="name" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" />
                    <?php if ($nres != "") { ?>
                        <div class>
                            <span class="text-danger"><?php echo $nres; ?></span>
                        </div>
                    <?php } ?>
                    <input type="email" placeholder="Email" class="form-control input" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"/>
                    <input type="text" placeholder="Phone Number" class="form-control input" name="phone" required value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>"/>
                    <div class="password-container">
                        <input type="password" id="password" placeholder="Password" class="form-control input" name="pass" required />
                        <i class="fa fa-eye-slash" id="togglePassword"></i>
                    </div>
                    <?php if ($pres != "") { ?>
                        <div>
                            <span class="text-danger"><?php echo $pres; ?></span>
                        </div>
                    <?php } ?>
                    <input type="file" placeholder="" class="form-control input" name="image" required />
                    <button class="btn sign" name="signUp">Sign Up</button>
                </form>
            </div>
            <div class="col-6 form-container sign-in-container">
                <form class="form" method="POST">
                    <h1 class="fw-bold m-0 fs-2">Travel Agency</h1>
                    <div class="social-container">
                        <a href="#" class="social-icon"><img src="../../mainImg/facebook .png" alt="" class="img"></a>
                        <a href="#" class="social-icon"><img src="../../mainImg/image.png" alt="" class="img"></a>
                        <a href="#" class="social-icon"><img src="../../mainImg/twitter (1).png" alt="" class="img"></a>
                    </div>
                    <span class="text-gray ">or use your account</span>
                    <input type="email" placeholder="Email" class="form-control input" name="email1" required />
                    <input type="password" placeholder="Password" class="form-control input" name="pass1" required />
                    <div class="form-check check">
                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember_me">
                        <label class="form-check-label" for="remember_me">
                            Remember Me
                        </label>
                    </div>
                    <button class="btn sign" name="signIn">Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1 class="text-white">Welcome Back!</h1>
                        <p class="text">To keep connected with us please login with your personal info</p>
                        <button class="btn ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1 class="text-white">Hello, Friend!</h1>
                        <p class="text">Enter your personal details and start journey with us</p>
                        <button class="btn ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });

        const togglePassword = document.getElementById("togglePassword");
        const passwordInput = document.getElementById("password");

        togglePassword.addEventListener("click", function() {
            const type = passwordInput.type === "password" ? "text" : "password";
            passwordInput.type = type;

            // Toggle eye icon
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>