<?php
require "../config/db.php";

if (isset($_POST["login"])) {

  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = mysqli_query($connect, "SELECT * FROM users WHERE email = '$email'");

  // cek email
  if (mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      echo "<script>
              alert('Login berhasil!');
              window.location.href = '../index.html';
        </script>";
      exit;
    };
  }

  $error = true;
}

if (isset($error)) {
  echo "<script>
          alert('Password salah!');       
        </script>";
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


        <a href="#">Forgot Password?</a>
        <input type="submit" class="btn" name="login" value="Login">
        <p class="register">Belum punya akun? <a href="./register.php">Register</a></p>
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