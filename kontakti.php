<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Kontakti</title>
    <link rel="stylesheet" href="kontakti.css">
</head>

<?php include 'header.php';?>

<body>
    <?php
    include 'db.php'; 

  
    $db = new Database();

   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        $name = $_POST['name'];
        $email = $_POST['email'];
        $numri = $_POST['numri'];
        $message = $_POST['message'];

       
        if (empty($name) || empty($email) || empty($message)) {
            echo 'Please fill in all required fields.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Please enter a valid email address.';
        } else {
          
            $sql = "INSERT INTO form_submissions (name, email, numri, message) VALUES (?, ?, ?, ?)";
            $stmt = $db->conn->prepare($sql);

           
            $stmt->bind_param("ssss", $name, $email, $numri, $message);

       
            if ($stmt->execute()) {
                echo 'Form submitted successfully.';
            } else {
                echo 'Error submitting the form.';
            }
        }
    }
    ?>

    <form id="contactForm" method="post">
        <input type="text" id="name" name="name" placeholder="Emri">
        <input type="text" id="numri" name="numri" placeholder="Numri">
        <input type="email" id="email" name="email" placeholder="Email">
        <textarea id="message" name="message" placeholder="Message" cols="30" rows="10"></textarea>
        <button id="butoni" type="submit">Submit</button>
    </form>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function (event) {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();
            const numri = document.getElementById('numri').value.trim();

            if (name === '' || email === '' || message === '') {
                alert('Please fill in all fields.');
                event.preventDefault();
            } else if (!isValidEmail(email)) {
                alert('Please enter a valid email. ');
                event.preventDefault();
            }

            function isValidEmail(email) {
                const emailRegex = /[^\s@]+@[^\s@]+\.[^\s@]+/;
                return emailRegex.test(email);
            }
        });
    </script>
    
</body>

<?php include 'footer.php'; ?>
</html>
