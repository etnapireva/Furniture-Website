<?php
include 'db.php';


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registerUsername"]) && isset($_POST["registerPassword"]) && isset($_POST["confirmPassword"])) {
    $username = mysqli_real_escape_string($conn, $_POST["registerUsername"]);
    $password = mysqli_real_escape_string($conn, $_POST["registerPassword"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirmPassword"]);

    
    if ($password != $confirmPassword) {
        echo "Passwords do not match.";
    } else {
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

        if (mysqli_query($conn, $sql)) {
            echo "<p>Registration successful! Now you can log in.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["loginUsername"]) && isset($_POST["loginPassword"])) {
    $username = mysqli_real_escape_string($conn, $_POST["loginUsername"]);
    $password = mysqli_real_escape_string($conn, $_POST["loginPassword"]);

    
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

       
        if (password_verify($password, $user['password'])) {
          
            header("Location: main.php");
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="login.css">
    <title>Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
       

        form {
            margin: 20px auto; 
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            max-width: 300px;
            display: flex;
            flex-wrap: wrap;
            position: relative;
            z-index: 2;
            margin-top: 20px;
        }

        input[type="text"],
        input[type="password"],
        button {
            display: flex;
            flex-wrap: wrap;
            display: block;
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            display: flex;
            flex-wrap: wrap;
            background-color: #b4a44a;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #9b9948;
        }

        input:invalid {
            border-color: #ff0000;
        }

        input:valid {
            border-color: #a5a349;
        }

    </style>
</head>
<body>
<?php include 'header.php'; ?>

    <div class="login-container">
        <form id="loginForm" method="post">
            <input type="text" name="loginUsername" id="loginUsername" placeholder="Username">
            <input type="password" name="loginPassword" id="loginPassword" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>

    <div class="registration-container">
        <form id="registrationForm" method="post">
            <input type="text" name="registerUsername" id="registerUsername" placeholder="Username">
            <input type="password" name="registerPassword" id="registerPassword" placeholder="Password">
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password">
            <button type="submit">Register</button>
        </form>
    </div>

    

    <footer class="footeri">
  
           <div class="copy">&copy; 2023</div>
      
           <div class="linksfooteri">
             <div class="links">
               <span>Me shume informacion</span>
               <a href="main.html">Faqja Kryesore</a>
               <a href="about.html">Rreth Nesh</a>
               <a href="kontakti.html">Kontakti</a>
               <a href="https://www.google.com/maps/place/Shopping+Center/@42.5804138,21.5791574,19.29z/data=!4m6!3m5!1s0x1354e97970c00001:0xe61bd806fd271c52!8m2!3d42.5801333!4d21.579156!16s%2Fg%2F11kj8__xrb?entry=ttu">Lokacioni </a>
             </div>
      
             <div class="links">
               <span>Rrjetet sociale</span>
               <a class="foto11"   href="https://www.facebook.com/halitismofficial"><img src="Facebook Logo.png" alt="" width="10%" height="5%"> Na ndiqni në Facebook</a>
               <a class="foto11" href="https://www.tiktok.com/@mobileriahaliti"><img src="TikTok logo.png" alt="" width="8%" height="5%"> Na ndiqni në TikTok</a>
               <a class="foto11" href="https://www.instagram.com/haliti_s.m/?ref=www.localsbarguide.com&hl=da"><img src="Instagram Logo.png" alt="" width="5%" height="5%"> Na ndiqni në Instagram</a>
            
           </div>
           </div>
         </footer>

</body>
</html>