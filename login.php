<?php

session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        // Kyçur si admin, veprimet për admin
        echo "You are logged in as an admin.";
    } else {
        // Kyçur si përdorues i thjeshtë, veprimet për përdoruesin e thjeshtë
        echo "You are logged in as a regular user.";
    }
} else {
    // Përdoruesi nuk është kyçur, veprimet për një vizitor të panjohur
    echo "You are not logged in.";
}


include 'db.php';

class User {
    private $db;

 
    public function __construct($db) {
        $this->db = $db;
    }

   
    public function registerUser($username, $password, $confirmPassword) {
        if ($password != $confirmPassword) {
            echo "Passwords do not match.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

            if ($this->db->conn->query($sql)) {
                echo "<p>Registration successful! Now you can log in.</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $this->db->conn->error;
            }
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $role = "user"; 

     $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashedPassword', '$role')";
    }

 
    public function loginUser($username, $password) {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->db->conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
               
                $_SESSION['role'] = $user['role'];
                header("Location: main.php");
                exit();
            } else {
                echo "Incorrect password.";
            }
    }
}


}



$database = new Database();

$database = new Database();  

$user = new User($database);



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registerUsername"]) && isset($_POST["registerPassword"]) && isset($_POST["confirmPassword"])) {
    $user->registerUser($_POST["registerUsername"], $_POST["registerPassword"], $_POST["confirmPassword"]);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["loginUsername"]) && isset($_POST["loginPassword"])) {
    $user->loginUser($_POST["loginUsername"], $_POST["loginPassword"]);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
    <?php include 'header.php'; ?>
</head>
<body>


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

    
<?php 
include 'footer.php';
?>

</body>
</html>