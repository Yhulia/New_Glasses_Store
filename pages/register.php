<?php
require "../config/db.php";

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('User berhasil ditambahkan');       
            </script>";
    } else {
        echo mysqli_error($connect);
    }
}

function registrasi($data)
{
    global $connect;


    $email = mysqli_real_escape_string($connect, $data["email"]);
    $password = mysqli_real_escape_string($connect, $data["password"]);
    $confirmPassword = mysqli_real_escape_string($connect, $data["confirm-password"]);

    // cek apakah username sudah ada atau belum
    $result = mysqli_query($connect, "SELECT email FROM users WHERE email = '$email'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar');       
            </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $confirmPassword) {
        echo "<script>
                alert('Password tidak sama!');       
              </script>";
        return false;
    }

    // encrypt password
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($connect, "INSERT INTO users VALUES ('', '$email', '$password')");

    return mysqli_affected_rows($connect);
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Register Form</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/login.css" />
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
    <img class="wave" src="../assets/images/wave.png" />
    <div class="container">
        <div class="img">
            <img src="../assets/images/bg.svg" />
        </div>
        <div class="login-content">
            <form action="" method="POST">
                <img src="../assets/images/avatar.svg" />
                <h2 class="title">Welcome</h2>

                <!-- Input untuk Username -->
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <label for="email">Username</label>
                        <input type="text" class="input" name="email" id="email" />
                    </div>
                </div>

                <!-- Input untuk Password -->
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <label for="password">Password</label>
                        <input type="password" class="input password" name="password" id="password" />
                        <i class="fa-solid fa-eye toggle-password"></i>
                    </div>
                </div>

                <!-- Input untuk Konfirmasi Password -->
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" class="input password" name="confirm-password" id="confirm-password" />
                        <i class="fa-solid fa-eye toggle-password"></i>
                    </div>
                </div>


                <a href="#">Forgot Password?</a>
                <input type="submit" class="btn" name="register" value="Register">
                <p class="register">Sudah punya akun? <a href="./login.php">Login</a></p>
            </form>

        </div>
    </div>
    <script>
        const inputs = document.querySelectorAll(".input");

        function addcl() {
            let parent = this.parentNode.parentNode;
            parent.classList.add("focus");
        }

        function remcl() {
            let parent = this.parentNode.parentNode;
            if (this.value == "") {
                parent.classList.remove("focus");
            }
        }

        inputs.forEach((input) => {
            input.addEventListener("focus", addcl);
            input.addEventListener("blur", remcl);
        });

        // Toggle password visibility
        const togglePasswordIcons = document.querySelectorAll(".toggle-password");

        // Menambahkan event listener untuk setiap ikon toggle
        togglePasswordIcons.forEach((toggleIcon) => {
            toggleIcon.addEventListener("click", () => {
                // Pilih input yang sesuai dengan ikon toggle yang diklik
                const passwordField = toggleIcon.closest('.div').querySelector('input');

                // Toggle password field type
                const type = passwordField.type === "password" ? "text" : "password";
                passwordField.type = type;

                // Toggle eye icon
                toggleIcon.classList.toggle("fa-eye");
                toggleIcon.classList.toggle("fa-eye-slash");
            });
        });
    </script>
</body>

</html>